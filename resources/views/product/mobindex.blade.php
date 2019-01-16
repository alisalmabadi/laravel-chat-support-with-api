@extends('layouts.mobapp')
@section('head')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.carousel.min.css" />
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.theme.default.css" />




@stop
@section('content')
    @include('partials.mobheader')

    <div class="container-fluid" style="padding: 0;margin-top: 48px;">
        @include('partials.breadcrumb')

        @include('product.mobproduct_main')

        <span class="clearfix"></span>
        @include('product.related_product')

        <article>

            <div class="article-container">
                <div class="article-header">
                    <h2>معرفی اجمالی محصول</h2>
                    <span>انتی بیوتیک مایع(liquid antibiotic)</span>

                    <div class="text">
                        <div class="inner">
                            <p>
                                اگر از آن دسته افرادی هستید که سخت‌افزار و قدرت سخت‌افزاری گوشی برایتان اهمیت ویژه‌ای
                                دارد؛ حتما به‌ دنبال گوشی‌هایی هستید که قدرت سخت‌افزاری‌شان در مقایسه با سایر گوشی‌ها،
                                برتری بزرگی دارند. گوشی «هوآوی میت10 پرو» (Huawei Mate 10 Pro) را می‌توان مظهر قدرت
                                گوشی‌های اندرویدی و حتی قدرتمندترین گوشی هوآوی و اندروید تا لحظه‌ی تولیدش دانست. این
                                تنها برتری میت10 پرو نیست؛ بلکه باید موارد دیگری را به آن اضافه کرد: نمایشگر بزرگ با
                                تراکم بالا، پشتیبانی از دو سیم‌کارت و شبکه‌ی 4G، سیستم‌عامل به‌روز و هماهنگ با سخت‌افزار
                                و یک باتری که استفاده از گوشی را تا دو روز فقط با یک بار شارژ تضمین می‌کند. البته این
                                سخت‌افزار و قابلیت‌ها در قابی فلزی و چشم‌نواز جمع‌ شده‌اند و همچنین با حسگر اثرانگشت از
                                امنیت کاربران در این گوشی محافظت می‌شود. استفاده از تراشه‌ی اختصاصی هوآوی با نام‌های
                                ‌سیلیکون کایرین 970 به همراه 6 گیگابایت رم باعث شده تا میت10 پرو به گوشی بدون رقیب این
                                روز‌های دنیای اندروید تبدیل شود. این تراشه‌ی 64بیتی دو پردازنده‌ی مرکزی 4هسته‌ای دارد که
                                از پس هرکاری برمی‌آیند. در کنار این تراشه‌ 128 گیگابایت حافظه‌ی داخلی در نظر گرفته شده
                                است. همچنین امکان استفاده از Wi-Fi، بلوتوث و NFC هم در این گوشی وجود دارد. باید این
                                نکته‌ی مهم را هم ذکر کنیم که این گوشی دارای گواهی‌نامه‌ی IP67 است؛ یعنی دربرابر آب مقاوم
                                است و اگر گوشی‌تان به مدت ۳۰ دقیقه و تا عمق یک‌متری هم در آب باشد، صدمه نمی‌بیند.
                                استفاده از نمایشگری 6 اینچی در میت 10 پرو باعث شده این گوشی برای انجام هر نوع عملیات از
                                وب‌گردی، بازی و مطالعه گرفته تا فیلم‌ دیدن مطلوب باشد. برای این نمایشگر رزولوشن
                                2160×1080 در نظر گرفته شده تا بتواند تراکم 402 پیکسل بر اینچ را به تصویر بکشد. همچنین
                                برای این نمایشگر از فناوری AMOLED استفاده شده است تا رنگ‌ها از هر زاویه‌ای غلظت و رنگ
                                مناسب داشته باشند. نمایشگر میت10 پرو با محافظ‌های گوریلا گلس محافظت می‌شود و می‌تواند تا
                                10 لمس را به‌صورت هم‌زمان پاسخگو باشد. میت10 پرو هم مانند گوشی‌های اخیر هوآوی، به فریمی
                                فلزی از جنس آلومینیوم و قاب پشتی و صفحه‌نمایشی از جنس شیشه مجهز شده است تا علاوه‌بر
                                سخت‌افزار و قابلیت‌های جالبش از ظاهری چشم‌نواز و زیبا هم برخوردار باشد. این گوشی با
                                ابعاد نسبتا بزرگش یعنی 154.2 در 74.5 میلی‌متر 178 گرم وزن دارد. همچنین از دو سیم‌کارت و
                                شبکه‌ی 4G پشتیبانی می‌کند. دو دوربین 20 و 12مگاپیکسلی برای میت10 پرو انتخاب شده‌اند که
                                مثل گوشی‌های جدید این روزها به دو دوربین اصلی مجهز هستند. این دوربین‌ها تصاویر را با دقت
                                و بزرگنمایی بیشتر ثبت می‌کنند و می‌توانند در تمام شرایط ممکن، تصاویر مناسبی را در
                                اختیارتان بگذارند. این دوربین به فلشی از نوع LED دورنگ مجهز شده که حتی در مواقعی که نور
                                محیط کم است، به ثبت تصاویر شفاف کمک می‌کند. برای دوربین سلفی هم یک سنسور 8مگاپیکسلی
                                استفاده شده است که تصاویر شفاف و باکیفیتی ثبت می‌کند. ازطرفی استفاده از اندروید اوریو
                                نسخه‌ی 8.0 برای این گوشی باعث شده تا میت10 پرو کاربری‌ها و امکانات لازم مطابق با آخرین
                                نسخه‌ی اندروید را داشته باشد و با توجه به هماهنگی سخت‌افزار و سیستم‌عاملش، کار با آن
                                بسیار روان است. از دیگر قابلیت‌های کم‌نظیر میت10 پرو می‌توان به باتری 4000 میلی‌آمپر
                                ساعتی‌اش اشاره کرد که بازده‌ی مطلوبی دارد. همچنین هوآوی از نسخه‌ی هشتم رابط‌کاربری
                                ایموشن برای این گوشی استفاده کرده است.
                            </p>

                        </div>


                    </div>


                </div>



            </div>
        </article>
        @include('product.related_product')
        <section class="p-tabs">
            <ul class="nav nav-tabs">
                <li class="active"><a data-toggle="tab" class="tab-review" href="#home"><span >نقد و برسی</span></a></li>
                <li><a data-toggle="tab" class="tab-specific" href="#menu1"><span >مشخصات فنی</span></a></li>
                <li><a data-toggle="tab"  class="tab-comment" href="#menu2"><span >نظرات</span></a></li>
            </ul>

            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="tap-content-inner">
                        editor area

                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    <article class="p-mob-spec-tab">

                        <h1>مشخصات کلی</h1>
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 bg-white">

                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                            </div>
                        </div>
                        <span class="clearfix"></span>
                        <h1>مشخصات کلی</h1>
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 bg-white">

                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                            </div>
                        </div>
                        <span class="clearfix"></span>
                        <h1>مشخصات کلی</h1>
                        <div class="col-lg-12 col-xs-12 col-sm-12 col-md-12 bg-white">

                            <div class="row">
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                                <div class="col-xs-3">
                                    <span class="mob-technicalspecs-title">نوع</span>
                                </div>
                                <div class="col-xs-8 col-xs-offset-1">
                                    <span class="mob-technicalspecs-value">انتی بیوتیک</span>
                                </div>
                            </div>
                        </div>




                    </article>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <div class="tap-content-inner">
                        <div class="p-comment-tab">
                            <h4>شما هم می توانید در مورد این کالا نظر بدهید.</h4>
                            <p>برای ثبت نظر لازم است ابتدا وارد حساب کاربری خود شوید.و نظر خود برای بهرمندی دیگر خریداران این کالا ثبت کنید.</p>
                            <button class="btn btn-primary">نظر خود را بنویسید</button>

                        </div>
                        <b class="p-spec-tab-title"><i ></i><span>نظرات کاربران <span>(10 نطر)</span></span> </b>
                        <hr>
                        <div class="comment-container">
                            <div class="comment-heading">
                                <h4>نیما محمودزاده</h4>
                                <span>۱۲ اردیبهشت ۱۳۹۷</span>
                            </div>
                            <div class="comment-body">

                                <div class="buyer-message agree"><p>خرید این محصول را حتما پیشنهاد می کنم.</p></div>
                                <p>خیلی مفید و تاثیر گذار ممنون از فروشگاه خوبتون برای دوستان پیشنهاد میکنم اگه قصد خرید دارن شک نکن خیلی عالیه. </p>


                            </div>

                        </div>
                        <div class="comment-container">
                            <div class="comment-heading">
                                <h4>نیما محمودزاده</h4>
                                <span>۱۲ اردیبهشت ۱۳۹۷</span>
                            </div>
                            <div class="comment-body">

                                <div class="buyer-message disagree"><p>خرید این محصول را پیشنهاد نمی کنم.</p></div>
                                <p>اصلا اون چیزی که من فکرشو میکردم نبود</p>


                            </div>

                        </div>
                        <div class="comment-container">
                            <div class="comment-heading">
                                <h4>نیما محمودزاده</h4>
                                <span>۱۲ اردیبهشت ۱۳۹۷</span>
                            </div>
                            <div class="comment-body">

                                <div class="buyer-message agree"><p>خرید این محصول را حتما پیشنهاد می کنم.</p></div>
                                <p>خیلی مفید و تاثیر گذار ممنون از فروشگاه خوبتون برای دوستان پیشنهاد میکنم اگه قصد خرید دارن شک نکن خیلی عالیه. </p>


                            </div>

                        </div>
                        <div class="comment-container">
                            <div class="comment-heading">
                                <h4>نیما محمودزاده</h4>
                                <span>۱۲ اردیبهشت ۱۳۹۷</span>
                            </div>
                            <div class="comment-body">

                                <div class="buyer-message agree"><p>خرید این محصول را حتما پیشنهاد می کنم.</p></div>
                                <p>خیلی مفید و تاثیر گذار ممنون از فروشگاه خوبتون برای دوستان پیشنهاد میکنم اگه قصد خرید دارن شک نکن خیلی عالیه. </p>


                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </section>



    </div>
@endsection
@section('script_whole')

    <script src="{{route('home')}}/js/modernizr.js"></script>
    <script type="text/javascript" src="{{route('home')}}/js/xzoom.js"></script>
    <script type="text/javascript" src="{{route('home')}}/js/hammer.min.js"></script>
    <script type="text/javascript" src="{{route('home')}}/js/jquery.fancybox.js"></script>
    <script type="text/javascript" src="{{route('home')}}/js/magnific-popup.js"></script>
    <script type="text/javascript" src="{{route('home')}}/js/owl.carousel.min.js"></script>
    <script>
        var seller_name='{!! $product->seller->company_name !!}';
        var seller_tel='{!! $product->seller->tel_number !!}';

        function v_load(obj)
        {

            if($(obj).hasClass('active') || $(obj).attr('disabled')==='disabled')
                return;
            $(obj).closest('li').find('input').prop('checked',true);

            $('input[name=selected_option]').val( $(obj).closest('li').find('input').val());
            $.ajax({
                url:'{{route('product.variety_load',$product)}}',
                method:'post',
                data: $('#frm_variety').serialize(),
                success:function (response)
                {

                    $('.p-config-container-ajax').html(response);
                    $('#productConfig_P').empty();
                    var html='';
                    var count=$('input[name=count]').val();
                    var price=$('input[name=price]').val();

                    if(count>0)
                    {

                        html+='<a href="javascript:;" onclick="$(\'#frm_variety\').submit();" class="p-add-to-cart-button">';
                        html+='<h3 class="cro-add-2-cart"> افزودن به سبد خرید </h3>';
                        html+='<div class="cro-seprator"></div>';
                        html+='<div class="cro-price">';
                        html+='<div style=" display: grid; justify-content: center; text-align: right; ">';
                        html+=' <div class="cro-old-p"></div>';
                        html+='<div class="cro-curr-p" style="line-height: 2.5;">';

                        html+='<div class="cro-num-p">'+price+'</div>';
                        html+='<div class="cro-toman">تومان</div>';

                        html+=' </div>';
                        html+=' </div>';
                        html+='</div>';
                        html+=' </a>';

                    }else
                    {


                     html+=' <a style="background-color: #ef6c51;">';
                     html+=' <h3 class="cro-add-2-cart"> ناموجود </h3>';
                     html+='<div class="cro-seprator"></div>';
                     html+='<div class="cro-price">';
                     html+='<div style=" display: grid; justify-content: center; text-align: right; ">';
                     html+='<div class="cro-old-p"></div>';
                     html+='<div style="line-height: 2.5; font-size: 12px;text-align: center">';
                     html+='<div class="cro-num-p" style="font-size: 15px"> '+seller_name+'</div>';
                     html+='<div class="cro-toman" style="font-size: 12px">'+seller_tel+'</div>';
                     html+='</div>';
                     html+='</div>';
                     html+=' </div>';
                     html+=' </a>';

                    }
                    $('#productConfig_P').html(html);


                }
            });


        }




    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.owl-carousel').owlCarousel({
                loop: true,
                margin: 10,
                responsiveClass: true,
                rtl:true,
                responsive: {
                    0: {
                        items: 1,
                        nav: true
                    },
                    600: {
                        items: 3,
                        nav: false
                    },
                    1000: {
                        items: 5,
                        nav: true,
                        navRewind:true,
                        loop: false,
                        margin: 20
                    }
                }
            })
        });
        $('.p-color-box').click(function ()
        {
            $(this).closest('div').find('input').attr('checked',false);
            $(this).closest('div').find('input').attr('checked',true);
            $('input[name="main_variety"]').val($(this).closest('div').find('input').val());
            $.ajax({url:'{{route('product.variety_load',$product)}}',type:'post',data:$('#frm_variety').serialize()});
        });


    </script>


@stop
