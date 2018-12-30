<?php

namespace App\Http\Controllers;

use App\Admin;

use Illuminate\Http\Request;

class AdminController extends Controller
{
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		$this->middleware('admin');

	}


	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function admin_panel()
	{
		/*$loader=array();
		$loader['user_count']=count(Admin::all());
        $loader['post_count']=count(Post::all());
        $loader['category_count']=count(Category::all());
        $loader['posttype_count']=count(PostType::all());*/
        return view('admin.home',compact('loader'));
	}

	public function show(  ) {

	}

	public function index(  )
	{
		$admins=Admin::all();
		return	view('admin.admin.admin_show',compact('admins'));
	}

	public function edit(Admin $admin)
	{

			return view('admin.admin.admin_edite',compact('admin'));
	}

	public function update(Admin $admin,Request $request)
	{
		$this->validate($request,[
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users',
			'password' => 'required|string|min:6|confirmed',
		]);

		$admin->update([ 'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
		]);
		flash('کابر بروز رسانی شد!');
		return back();
	}


}
