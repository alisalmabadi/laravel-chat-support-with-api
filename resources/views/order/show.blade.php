@extends('layouts.app')
@section('head')
    <link href="{{ asset('css/cart.css') }}" rel="stylesheet">
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">


@stop
@section('title','بازبینی خرید')
@section('content')
    @include('partials.header')

    <div class="container">

        <div class="c-breadcrumb" role="breadcrumb">
            <ol vocab="http://schema.org/" typeof="BreadcrumbList">

                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="{{route('home')}}">
                        <span property="name">فروشگاه</span>
                    </a>
                    <meta property="position" content="1">
                </li>



                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="#">
                        <span property="name">نمایش و پرداخت سفارش</span>
                    </a>
                    <meta property="position" content="2">
                </li>



            </ol>

        </div>

        <section class="cart-main">

            <h2 class="cart-title">
                <i class="icon icon-caret-left-blue"></i>
                اقلام سفارش</h2>
            <p class="cart-title-description">در صورتی در لیست مغارتی مشاده می نمایید لطفا با پشتیبانی تماس حاصل فمایید.</p>
            @if(count($order->product_orders)>0)

                <span class="clearfix"></span>
                <div class="cart-main-inner">
                    <table class="table table-responsive table-bordered table-hover text-center">
                        <thead>
                        <tr>
                            <th>شرح محصول</th>
                            <th>فروشنده</th>
                            <th>تعداد</th>
                            <th>قیمت واحد</th>
                            <th>قیمت کل</th>

                        </tr>
                        </thead>
                        <tbody>

                        @foreach($order->product_orders as $product_order)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-4 col-xs-5">
                                            <a href="{{route('product.show',$product_order->product)}}">
                                                <img style="max-height: 150px;" src="{{route('media',$product_order->product->images()->first()->id)}}" alt=""></a>
                                        </div>
                                        <div class="col-sm-8 col-xs-7">
                                            <a href="{{route('product.show',$product_order->product)}}">{{$product_order->product->name}}</a>
                                            <br>
                                            @foreach($product_order->product->product_variety_values()->where('id',$product_order->product_variety_value_id)->first()->variety_options as $option)

                                                <div class="p-color-box">

                                                    <label class="  active  " ><span style="color: #ff1908">{{$option->variety->name}}:</span>{{$option->title}} </label>

                                                </div>

                                            @endforeach
                                        </div>

                                    </div>


                                </td>
                                <td>{{$product_order->product->seller->company_name}}</td>
                                <td style="min-width: 80px">

                                    <span class="badge"> {{$product_order->count}}</span>

                                </td>
                                <td>{{$product_order->price}}</td>
                                <td>{{$product_order->total_price}}</td>


                            </tr>
                        @endforeach
                        </tbody>

                    </table>


                    <div class="row">
                        <div class="col-sm-6">
                            <div class="well"><p>!!</p>
                                <h2>&nbsp;</h2>
                            </div>

                        </div>

                        <div class="col-sm-6">
                            <div class="well text-success text-center" style=" background-color: #eaffe7">
                                <h4 for=""> جمع کل فاکتور:<span>{{$order->total_price}}</span></h4>
                                <h4 for=""> هزینه ارسال:<span>{{$order->delivery->price}}</span></h4>
                                <h4 for=""> مبلغ قابل پرداخت(با هزینه ارسال):<span>{{$order->total_price+$order->delivery->price}}</span></h4>



                            </div>

                        </div>
                    </div>

                </div>


            @else
                <h1 class="text-center">خطا در سیستم لطفا مجدا تلاش فرمایید.</h1>
                <a href="{{route('home')}}" class="btn btn-default text-center">بازگشت به صفحه اصلی</a>

            @endif

            <h2 class="cart-title">
                <i class="icon icon-caret-left-blue"></i>
               اطلاعات ارسال</h2>
            <p class="cart-title-description">کاربر گرامی اگر در اطلاعات ارسال خود مغایرتی مشاهده میفرمایید هر چه سریع تر با پشتیبانی تماس حاصل فرمایید</p>

            <div class="cart-main-inner">

                <div class="row">

                    <div class="col-sm-6">
                        <section class="profile-section">

                            <header>
                                اطلاعات ارسال
                            </header>
                            <div class="profile-section-inner">


                                <div class="info-table">

                                    <table class="table table-bordered table-responsive">
                                        <tbody>
                                        <tr>
                                            <td><span >نام و نام خانوادگی:</span>    @if($user->name !='')<span class="text-success"> {{$user->name}} &nbsp; {{$user->last_name}} </span>@else<span class="text-warning"> ثبت نشده. </span>@endif </td>
                                            <td><span >تلفن همراه:</span><span class="text-success"> {{$user->mobile_number}} </span> </td>
                                        </tr>
                                        <tr>
                                            <td><span >کد ملی:</span>    @if($user->nation_code !='')<span class="text-success"> {{$user->nation_code}} </span> @else <span class="text-warning"> ثبت نشده. </span> @endif </td>
                                            <td><span >ایمیل:</span>    @if($user->email !='')<span class="text-success">{{$user->email}}</span> @else <span class="text-warning"> ثبت نشده. </span> @endif </td>
                                        </tr>
                                        <tr>
                                            <td><span >تلفن ثابت:</span>    @if($user->tel_number !='')<span class="text-success"> {{$user->tel_number}} </span>@else<span class="text-warning"> ثبت نشده. </span>@endif </td>


                                            <td><span >کد پستی:</span>  @if($user->postal_code)<span class="text-success"> {{$user->postal_code }}</span> @else <span class="text-warning"> ثبت نشده. </span> @endif </td>

                                        </tr>
                                        <tr>
                                            <td colspan="4"><span >آدرس:</span>    @if($user->city  &&  $user->province)<span class="text-success"> {{$user->province->name }}،{{$user->city->name }}،{{$user->address }}  </span> @else <span class="text-warning"> ثبت نشده. </span> @endif </td>

                                        </tr>


                                        </tbody>


                                    </table>
                                    <hr>
                                        <h3>ارسال با: </h3>
                                        <h5>{{$order->delivery->name}}</h5>
                                        <p>{{$order->delivery->desc}}</p>
                                </div>

                            </div>


                        </section>

                    </div>
                    <div class="col-sm-6">
                        <section class="profile-section">
                            @if(is_null($order->payment))
                            <form id="frm_payment_req" action="{{route('payment.request')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                    <input name="order_id" type="hidden" value="{{$order->id}}"  />
                                <header>
                               اطلاعات پرداخت
                                </header>
                                <div class="profile-section-inner">
                                    <h3 class="info-title text-danger"> سفارش شما پرداخت نشده لطفا برای پرداخت آن اقدام فرمایید!</h3>

                                    <div class="info-table">
                                      
                                        
                                        @foreach($payment_methods as $payment_method)
                                                <div class="row delivery radio" >

                                                    <label for="payment_method_{{$payment_method->id}}">

                                                        <div class="col-sm-2 delivery-radio">

                                                            <input id="payment_method_{{$payment_method->id}}" name="payment_method_id" value="{{$payment_method->id}}" type="radio">

                                                        </div>

                                                        <div class="col-sm-10">

                                                            <div class="row">

                                                                <div class="col-sm-6 title">
                                                                    <span  class="ng-binding">{{$payment_method->name}}</span>
                                                                </div>
                                                                <div class="col-sm-6 price">
                                                                    <span class="price-field"><img src="{{route('media',$payment_method->image_id)}}" alt=""></span>

                                                                </div>

                                                            </div>

                                                        </div>
                                                    </label>
                                                </div>
                                        @endforeach

                                        
                                    



                                    </div>

                                </div>
                            </form>
                            @else
                                @if($order->payment->state==1)
                                    <form id="frm_payment_req" action="{{route('payment.request')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input name="order_id" type="hidden" value="{{$order->id}}"  />
                                        <header>
                                            اطلاعات پرداخت
                                        </header>
                                        <div class="profile-section-inner">
                                            <h3 class="info-title text-success">سفارش شما با موفقیت پرداخت شده</h3>

                                            <div class="info-table">


                                          {{$order->payment->payment_method->name}}






                                            </div>

                                        </div>
                                    </form>
                                @else
                                    <form id="frm_payment_req" action="{{route('payment.request')}}" method="post" enctype="multipart/form-data">
                                        {{csrf_field()}}
                                        <input name="order_id" type="hidden" value="{{$order->id}}"  />
                                        <header>
                                            اطلاعات پرداخت
                                        </header>
                                        <div class="profile-section-inner">
                                            <h3 class="info-title text-danger"> سفارش شما پرداخت نشده لطفا برای پرداخت آن اقدام فرمایید!</h3>

                                            <div class="info-table">


                                                @foreach($payment_methods as $payment_method)
                                                    <div class="row delivery radio" >

                                                        <label for="payment_method_{{$payment_method->id}}">

                                                            <div class="col-sm-2 delivery-radio">

                                                                <input id="payment_method_{{$payment_method->id}}" name="payment_method_id" value="{{$payment_method->id}}" type="radio">

                                                            </div>

                                                            <div class="col-sm-10">

                                                                <div class="row">

                                                                    <div class="col-sm-6 title">
                                                                        <span  class="ng-binding">{{$payment_method->name}}</span>
                                                                    </div>
                                                                    <div class="col-sm-6 price">
                                                                        <span class="price-field"><img src="{{route('media',$payment_method->image_id)}}" alt=""></span>

                                                                    </div>

                                                                </div>

                                                            </div>
                                                        </label>
                                                    </div>
                                                @endforeach






                                            </div>

                                        </div>
                                    </form>
                                @endif
                            @endif

                        </section>


                    </div>


                        <h4 class="text-center text-warning"> مبلغ قابل پرداخت:<span>{{$order->total_price+$order->delivery->price}}</span></h4>
                    @if(session()->has('flash_payment'))
                        <h6 style="color:red">{{session()->get('flash_payment')}}</h6>
                    @endif
                    @if(!is_null($order->payment))
                        @if($order->payment->state==1)
                            <div class="pull-left info-btn-areas" style="padding-left: 30px">

                                <a href="javascript:;" onclick="" class="btn btn-default"> پرداخت شده!</a>

                                </div>
                            @else
                            <div class="pull-left info-btn-areas" style="padding-left: 30px">

                                <a href="javascript:;" onclick="$('#frm_payment_req').submit();" class="btn btn-success">پرداخت</a>

                            </div>
                            @endif
                    @else
                        <div class="pull-left info-btn-areas" style="padding-left: 30px">

                            <a href="javascript:;" onclick="$('#frm_payment_req').submit();" class="btn btn-success">پرداخت</a>

                        </div>

                    @endif



                </div>




            </div>

        </section>

    </div>
    @include('partials.footer')
@endsection
@section('script_whole')



@stop