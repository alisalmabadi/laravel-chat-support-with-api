@extends(str_contains(Request::root(), 'mob.')? 'layouts.mobapp':'layouts.app')
@section('title','ثبت نام در لب یار')
@section('content')
    @include(str_contains(Request::root(), 'mob.')? 'partials.mobheader':'partials.header')
    <div class="container-fluid login-fluid">

    <div class="container">

        <section class="register-form-main">
                <div class="row">
                    <div class="col-sm-6 register-form">
                        <h1 class="title"> به ما بپیوندید</h1>
                        <hr>
                        <div class="col-sm-10 col-sm-offset-1">
                        <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                            {{csrf_field()}}

                            <div class="form-group">
                                <label for="phone_number">شماره همراه</label>
                                <input type="text" name="mobile_number" value="{{old('phone_number')}}" class="form-control" placeholder="شماره تلفن همراه خود را وارد کنید">
                                @if ($errors->has('mobile_number'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('mobile_number') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="name">نام</label>
                                <input id="name" type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="اسم شریفتان را وارد کنید(مانند : علی)">
                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="password">کلمه عبور</label>
                                <input id="password" type="password" name="password" value="{{old('password')}}" class="form-control" placeholder="کلمه عبور باید 6 کاراکتر یا بیشتر باشد">
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

                            </div>

                            <div class="form-group">
                                <label for="phone_number">تکرار کلمه عبور</label>
                                <input id="password_confirmation" type="Password" name="password_confirmation" class="form-control" placeholder="تکرار کلمه عبور را وارد کنید.">
                                @if ($errors->has('confirmPassword'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('confirmPassword') }}</strong>
                                    </span>
                                @endif

                            </div>
                            <div class="form-group">
                                <label for="phone_number">کد امنیتی</label>

                                <img src="{{ captcha_src() }}" alt="captcha" class="captcha-img" data-refresh-config="default">
                                <button type="button" class="btn btn-link" id="reset">reset</button>

                            </div>
                            <div class="form-group">
                                <input  placeholder="پاسخ امنیتی"name="captcha" class="form-control"    type="text">

                                @if ($errors->has('captcha'))
                                    <span class="help-block">
                                <strong>{{ $errors->first('captcha')}}</strong>
                            </span>
                                @endif
                            </div>



                            <div class="form-check">
                                <input type="checkbox" value="{{old('legal')}}" class="form-check-input" name="legal" id="legal">
                                <label class="form-check-label"  for="legal"><span><span></span></span>پذیرش<a  target="_blank" href="{{route('home')}}/page/legal" > شرایط و قوانین</a></label>
                            </div>



                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="ثبت نام">
                            </div>



                        </form>
                        </div>

                    </div>
                    <div class="col-sm-6 register-guidance">

                        <div class="guidance__thumb">
                            <svg width="173px" height="161px" viewBox="0 0 173 161" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <g id="Signup-Copy" transform="translate(-393.000000, -279.000000)" fill="#E6ECEC">
                                        <path d="M537.376029,307.3195 L537.376029,279.59095 L526.892629,279.59095 L526.892629,307.31735 L499.168379,307.31735 L499.168379,317.7986 L526.894779,317.7986 L526.894779,345.525 L537.380329,345.525 L537.380329,317.80075 L565.102429,317.80075 L565.102429,307.3195 L537.376029,307.3195 Z M451.320129,358.8722 C467.823529,358.8722 481.200829,342.40965 481.200829,322.10075 C481.200829,301.7897 467.821379,289.9217 451.320129,289.9217 C434.818879,289.9217 421.443729,301.7897 421.443729,322.10075 C421.445879,342.40965 434.818879,358.8722 451.320129,358.8722 L451.320129,358.8722 Z M452.165079,374.6618 C451.881279,374.6618 451.599629,374.67685 451.320129,374.6833 C451.032029,374.67685 450.761129,374.6618 450.473029,374.6618 C420.693379,374.6618 396.211329,384.1562 393.302379,410.83985 C393.229279,411.53 393.160479,417.37155 393.102429,420.51915 C409.134979,432.8279 428.611829,439.4112 451.317979,439.40905 C473.776879,439.40905 493.574079,432.58925 509.535679,420.51915 C509.479779,417.37155 509.402379,411.53 509.331429,410.83985 C506.424629,384.1562 481.944729,374.6618 452.165079,374.6618 L452.165079,374.6618 Z" id="add-user-icon"></path>
                                    </g>
                                </g>
                            </svg>
                        </div>

                        <div class="guidance__rules">
                            <ul>
                                <li><i class="icon icon-userbox-cart"></i><span>سریع تر و ساده تر خرید کنید</span></li>
                                <li><i class="icon icon-userbox-list"></i><span>به سادگی سوابق خرید و فعالیت های خود را مدیریت کنید</span></li>
                                <li><i class="icon icon-userbox-love"></i><span>لیست علاقمندی های خود را بسازید و تغییرات آنها را دنبال کنید</span></li>
                                <li><i class="icon icon-userbox-comment"></i><span>نقد، بررسی و نظرات خود را با دیگران به اشتراک گذارید</span></li>
                                <li><i class="icon icon-userbox-discount"></i><span>در جریان فروش های ویژه و قیمت روز محصولات قرار بگیرید</span></li>
                            </ul>
                        </div>

                    </div>

                </div>


        </section>

    </div>
    </div>
    @include('partials.footer')

@endsection

@section('script_whole')
    <script>

        $('#reset').on('click', function () {
            var captcha = $('img.captcha-img');
            var config = captcha.data('refresh-config');
            $.ajax({
                method: 'GET',
                url: '/get_captcha/' + config,
            }).done(function (response) {
                captcha.prop('src', response);
            });
        });
    </script>
@endsection

