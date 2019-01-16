{{--


<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-4 col-lg-2 text-center">

                    <img src="{{route('home')}}/images/logo.png" style="margin-top: 41px;" alt="site_logo">

                </div>
                <div class="col-sm-6 col-md-4 col-lg-2">
                    <p class="text-justify middle">
                      {!! \Setting::get('site_address') !!}
                    </p>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2 text-center">
                    <div class="middle">
                        <h6>ارتباط الکترونیکی با ما</h6>
                        info@siarco.com
                    </div>
                </div>
                <div class="col-sm-6 col-md-4 col-lg-2 text-center">
                        محل نماد الکترونیکی
                </div>

                <div class="col-sm-12 col-md-8 col-lg-4 b-r4" style="height: 120px">
                    <img src="{{route('home')}}/images/footer-tel.png" style="    width: 100%;height: 100%;" alt="tel">
                </div>


            </div>

        </div>

    </div>
    <span class="clearfix"></span>
    <div class="footer-center">
        <div class="container">

            <div class="row">
                <div id="map" class="col-sm-6 col-md-4 g-map-aria"></div>
                <div class="col-sm-6 col-md-4 footer-link">
                    <div class="col-sm-6 col-lg-6"> <h3>دسته لینک  یک </h3>
                        <a href="#">لینک 1</a>
                        <a href="#">لینک تست</a>
                        <a href="#">لینک تست شماره دو</a>
                        <a href="#">لینک تست</a>
                        <a href="#">لینک 1</a>

                        <h3>دسته لینک یک </h3>
                        <a href="#">لینک 1</a>
                        <a href="#">لینک تست</a>
                        <a href="#">لینک تست شماره دو</a>
                        <a href="#">لینک تست</a>
                        <a href="#">لینک 1</a>

                    </div>
                    <div class="col-sm-6 col-lg-6">
                        <h3>دسته لینک یک </h3>
                        <a href="#">لینک 1</a>
                        <a href="#">لینک تست</a>
                        <a href="#">لینک تست شماره دو</a>
                        <a href="#">لینک تست</a>
                        <a href="#">لینک 1</a>
                        <h3>دسته لینک دو </h3>
                        <a href="#">لینک 1</a>
                        <a href="#">لینک تست</a>
                        <a href="#">لینک تست شماره دو</a>
                        <a href="#">لینک تست</a>
                        <a href="#">لینک 1</a>

                    </div>

                </div>

                <div class="col-sm-12 col-md-4 footer-blog">
                    <h2><a href="{{route('blog')}}">بلاگ فروشگاه</a></h2>
                    <ul>
                        @foreach($article_categories as $article_category)
                        <li><a href="{{route('article_category_show',$article_category)}}">{{$article_category->name}}</a></li>
                       @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-btm">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="link">
                        <a href="#">لینک یک</a>
                        <a href="#">لینک دو</a>
                        <a href="#">لینک سه</a>
                        <a href="#">لینک چهار</a>

                    </div>
                    <div class="copyright">
                       تمامی حقوق این سایت متعلق به دارنده سایت می باشد
                    </div>
                </div>
                <div class="col-md-4">

                    <div class="social-media">
                        <a href="#">
                            <i class="fa fa-google-plus"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-send"></i>
                        </a>
                        <a href="#">
                            <i class="fa fa-youtube"></i>
                        </a>

                    </div>
                </div>
            </div>
            <div class="row text-center">
                <p>طراحی و توسعه توسط شرکت <a href="http://siar.ir" target="_blank"> ایده آفرین </a></p>
            </div>
        </div>

    </div>



</footer>
--}}
