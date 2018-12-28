<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\Product;
use App\Cart;
use App\Province;
use Illuminate\Http\Request;
use App\Operator;
use App\Menu;
use Carbon\Carbon;
use App\City;
use App\Cookie;



class UserController extends Controller
{

	public function __construct()
	{
        $this->middleware('auth')->except(['cart','index','filter']);
        $this->middleware('admin')->only(['index','filter']);
        $this->middleware('user_completed')->except(['filter','confirm','confirmation','resend_code','index','destroy','cart']);
    }

	public function index()
	{
		$users=Operator::all();
		$cities=City::all();
		return view('admin.users.user_show',compact('users','cities'));
    }
	public function edit_form()
	{
		$user=\Auth::guard('web')->user();
		$provinces=Province::all();
		$provinces->load('cities');
		$cities=City::all();
		return view('user.profile_edit',compact('user','cities','provinces'));
	}
	public function profile()
	{
		$menus=Menu::all();
		$user=\Auth::guard('web')->user();
        $v=new \Verta($user->birth_day);
        $user->birth_day_p=$v->format('%B %d، %Y');
        $user->load('orders.order_state');
        foreach ($user->orders as $order)
        {
            $v=new \Verta($order->birth_day);
            $order->created_atp=$v->format('%B %d، %Y');
        }





		$user->load('province');
		$user->load('city');

		//return $user;
		return view('user.profile',compact('menus','user'));
	}

	public function resend_code(Request $request)
	{
		$user=\Auth::guard('web')->user();

		if(session()->has($user->mobile_number))
		{

			$sended=Carbon::createFromTimestamp(session($user->mobile_number));
			$time=Carbon::now();
			 if($time->diffInMinutes($sended)>3)
			 {
				 $user->update(['confirmation_code'=>verifire_sms($user)]);
				 session([$user->mobile_number => time()]);

				 return back()->withErrors(['code_success'=>'کد تایید ارسال شد.']);
			 }else
			 {
				 return back()->withErrors(['code_error'=>'شما بعد از سه دقیقه می توانید مجدا کد ارسال کنید.']);
			 }



		}else
		{
			$user->update(['confirmation_code'=>verifire_sms($user)]);
			session([$user->mobile_number => time()]);

			return back()->withErrors(['code_success'=>'کد تایید ارسال شد.']);
		}



		return back();
	}
	public function confirm(Request $request)
	{
		$user=\Auth::guard('web')->user();
		if($user->confirmation_code==$request->confirmation_code)
		{
			$user->update(['confirmed'=>1]);
			return redirect(route('user.cart'));
		}else
		{
			return back()->withErrors(['code_error'=>'کد اشتباه است.']);
		}

	}
	public function confirmation()
	{

		$user=\Auth::guard('web')->user();

		if(!$user->confirmed)
		return view('auth.confirmation',compact('user'));
		else
			return redirect(route('home'));

	}


	public function update($type,Request $request)
	{

		$user=\Auth::guard('web')->user();
		if(!$user->profile_completed)
			$user->update(['profile_completed'=>'1']);
		switch($type)
		{

			case '1':
				$date = Carbon::createFromTimestamp($request->birth_day/1000);

				$inputs=$request->all();

				$inputs['birth_day']=$date;

				$user->update($inputs);




				break;
			case '2':
				$this->validate($request, [
					'old_password'=>'required',
					'new_password'=>'required|min:6',
					'confirm_password' => 'required|same:new_password',
				],['old_password.required'=>'کلمه عبور فعلی وارد نشده است.',
				   'new_password.required'=>'پسورد جدید وارد نشده است.',
				   'new_password.min'=>'کلمه عبور باید از 6 کلمه بیشتر باشد.',
				   'confirm_password.required'=>'تکرار کلمه عبور وارد نشده است.',
				   'confirm_password.same'=>'تکرار کلمه عبور با کلمه عبور یکسان نیست.',
					]);


				if(\Hash::check($request->old_password, $user->password)){
					$user->update(['password'=>bcrypt($request->new_password)]);

					return 1;

				}else{

					return 0;
				}

				break;

			case '3':

				$user->update($request->all());
				$user->province_id=$request->province_id;
				$user->city_id=$request->city_id;
				$user->save();

				break;



		}
		return redirect(route('user.profile'));
	}

	public function cart(Request $request)
	{
		$product_in=new ProductController();
		$menus=Menu::all();
		$totalprice=0;
        if(\Auth::guard('web')->check())
        {
            $user=\Auth::guard('web')->user();
		if(\Cookie::get("carts"))
		{

			$json_str = \Cookie::get("carts");
			$rearr = json_decode($json_str);


			foreach($rearr as $obj)
			{
				if(Cart::Where([['product_id','=',$obj->p_id],['user_id','=',$user->id],['product_variety_value_id',$obj->variety_id]])->exists())
				{
					$cart=Cart::Where([['product_id','=',$obj->p_id],['user_id','=',$user->id],['product_variety_value_id',$obj->variety_id]])->first();

					$cart->update(['count'=>$cart->count+$obj->count]);

				}
				else
				{
					Cart::create(['user_id'=>$user->id,
					              'product_variety_value_id'=>$obj->variety_id,
					              'product_id'=>$obj->p_id,
					              'count'=>$obj->count
					]);
				}



			}

		}
            $cookie = \Cookie::forget('carts');

            return response()->view('user.logined_cart',compact('menus','user','totalprice','product_in'))->withCookie($cookie);
        }else
        {
            $carts=[];
            if(\Cookie::get("carts"))
            {
                $json_str = \Cookie::get("carts");

                $rearr = json_decode($json_str);
                foreach($rearr as $obj)
                {
                    $product=Product::where('id',$obj->p_id)->first();
                    $carts[]=['product'=>$product,'variety_id'=>$obj->variety_id,'count'=>$obj->count];

                }

            }

            return response()->view('user.cart',compact('menus','totalprice','carts'));
        }




	}

	public function checkout()
	{
		$product_in=new ProductController();
		$menus=Menu::all();
		$user=\Auth::guard('web')->user();
		$user->load('province');
		$user->load('city');
		$user->load('carts.product.product_values');
		$user2=$user->toArray();
		$totalprice=0;
		$provinces=Province::all();
		$provinces->load('cities');
		$cities=City::all();
		$deliveries=Delivery::all();


		if(count($user->carts)<=0)
		{
			return redirect(route('user.cart'));
		}



		$deliveries->load('cities');

		return view('user.checkout',compact('menus','user','user2','product_in','provinces','cities','deliveries'));
	}

	public function orders()
	{

		$menus=Menu::all();
		$user=\Auth::guard('web')->user();
		$user->load('orders.order_state');
		foreach ($user->orders as $order)
		{
			$v=new \Verta($order->birth_day);
			$order->created_atp=$v->format('%B %d، %Y');
		}


		return view('user.orders',compact('menus','user'));
	}

	public function destroy(Operator $user)
	{
		$user->delete();

		flash('مشتری حذف گردید!','danger');

		return back();

	}
	public function filter(Request $request)
	{
		$search=$request->search;
		$city_id=$request->city;

		if($city_id==0)
			$filter=[['name','LIKE','%'.$search.'%']];
		else
			$filter=[['name','LIKE','%'.$search.'%'],['city_id','=',$city_id]];


		$users=Operator::where($filter)->get();
		$users->load('province');
		$users->load('city');

		return $users;


	}

}
