@extends('layouts.app')
@section('head')
    <link href="{{ asset('css/product.css') }}" rel="stylesheet">
    <link href="{{ route('home') }}/css/xzoom.css" rel="stylesheet">
    <link href="{{ route('home') }}/css/magnific-popup.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/jquery.fancybox.css" />
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.carousel.min.css" />
    <link type="text/css" rel="stylesheet" media="all" href="{{ route('home') }}/css/owl.theme.default.css" />

@stop
@section('title',$product->title)
@section('content')
    @include('partials.header')

    <div class="container">
          @include('partials.breadcrumb')
          @include('product.product_main')
          <span class="clearfix"></span>
            @include('product.related_product')

        <article>

            <div class="article-container">
                <div class="article-header">
                    <h2>معرفی اجمالی محصول</h2>
                    <span> {{$product->name}}</span>

                    <div class="text">
                        <div class="inner">
                          {!! $product->desc !!}

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
                    <div class="tap-content-inner ">
                        <div class="p-spec-tab-header">
                            <h1>مشخصات فنی
                                <span> {{$product->name}}</span>

                            </h1>



                        </div>
                            @foreach($product->category->attribute_groups as $attribute_group)
                            <b class="p-spec-tab-title"><i ></i><span>{{$attribute_group->name}}</span> </b>
                        <ul class="spec-list">
                            @foreach($attribute_group->attributes as $attribute)

                            <li>
                                <span class="technicalspecs-title">{{$attribute->name}}</span>
                                <span class="technicalspecs-value ">
                                    <span>
                                        @if($product->product_attribute_values()->where('attribute_id',$attribute->id)->first())
                                            @if($attribute->type==1)

                                                    @if(($attribute->product_attribute_values()->where('product_id',$product->id)->first()))
                                                        {{$attribute->product_attribute_values()->where('product_id',$product->id)->first()->value}}

                                                    @endif
                                            @elseif($attribute->type==2)

                                                    @foreach($attribute->attribute_options as $attribute_option)
                                                        @if(($attribute->product_attribute_values()->where('product_id',$product->id)->first()))
                                                             @if($attribute->product_attribute_values()->where('product_id',$product->id)->first()->value==$attribute_option->id) {{$attribute_option->title}} @endif

                                                        @endif
                                                    @endforeach


                                            @endif

                                        @endif
                                    </span>
                                </span>
                            </li>
                            @endforeach

                        </ul>
                            @endforeach





                    </div>
                </div>


                <!-- Modal -->
                <div class="modal fade" id="myModal2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title">افزودن کامنت جدید</h4>
                            </div>
                            <div class="modal-body">
                                <div class="panel-body">
                                    <form action="{{route('comment.store')}}" class="form-horizontal" method="post">
                                        <div class="form">
                                   {{csrf_field()}}
                                            <label class="col-sm-2 control-label">عنوان :</label>
                                            <div class="col-sm-10">
                                                <input name="title" type="text" class="form-control">
                                                <span class="help-block">عنوانی برای نوشته خود در نظر بگیرید! </span>
                                            </div>
                                          {{--  <label class="col-sm-2 control-label">نام خانوادگی :</label>
                                            <div class="col-sm-10">
                                                <input name="lname" type="text" class="form-control">
                                                <span class="help-block">نام خانوادگی فرد مورد نظر را وارد نمایید </span>
                                            </div>--}}

                                            <label class="col-sm-2 control-label">شماره تلفن:</label>
                                            <div class="col-sm-10">
                                                <textarea id="editor2" class="form-control ckeditor" class="ckeditor" name="body" rows="6">
                                                </textarea>
                                                <span class="help-block">کامنت مورد نظر را وارد نمایید </span>
                                            </div>
                                            <input name="product_id" type="hidden" value="{{$product->id}}">
                                            <button name="send" type="submit" class="btn btn-success btn-lg btn-block">ثبت دیدگاه</button>
                                    </form>

                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button data-dismiss="modal" class="btn btn-default" type="button">بستن پنجره</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- modal -->

            <div id="menu2" class="tab-pane fade">
                    <div class="tap-content-inner">
                        <div class="p-comment-tab">
                            <h4>شما هم می توانید در مورد این کالا نظر بدهید.</h4>
                            <p>برای ثبت نظر لازم است ابتدا وارد حساب کاربری خود شوید.و نظر خود برای بهرمندی دیگر خریداران این کالا ثبت کنید.</p>
                            <button class="btn btn-primary"  data-toggle="modal" href="#myModal2">نظر خود را بنویسید</button>

                        </div>
                        <b class="p-spec-tab-title"><i ></i><span>نظرات کاربران <span>{{$count_comment}} نظر</span></span> </b>
                        <hr>
                        @foreach($comments as $comment)
                            <div class="comment-container">
                                <div class="comment-heading">
                                    <h4>{{$comment->user->name}} {{$comment->user->last_name}}</h4>
{{--
                                    <span>۱۲ اردیبهشت ۱۳۹۷</span>
--}}
                                </div>
                                <div class="comment-body">

                                    <div class="col-md-12 header">

                                        <p>{{$comment->title}}</p>

                                    </div>
                                    <p>{{$comment->body}} </p>

                                </div>
                                
                                <span class="pull-left">
                                 <button class="dislike">
	<i class="fa fa-thumbs-o-down" aria-hidden="true"></i></button>

<button class="like">
	<i class="fa fa-thumbs-o-up" aria-hidden="true"></i></button>
                                    </span>
                                <div id="result"> </div>
                            </div>
                            @endforeach
                       {{-- <div class="comment-container">
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

                        </div>--}}
                        </div>
                </div>
            </div>

        </section>



    </div>
    @include('partials.footer')
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
                        html+='<div class="p-price-state">';
                        html+='<div class="p-payable-price">';
                        html+='<span class="label">قیمت</span>';
                        html+='<span class="price">';

                        html+=price;

                        html+='</span>';
                        html+='<span class="payable-currency">تومان</span>';
                        html+='</div>';
                        html+= '</div>';
                        html+= '<div class="p-add-to-cart-area">';
                        html+= '<div class="p-add-to-cart">';
                        html+= '<a href="javascript:;" onclick="$(\'#frm_variety\').submit();"  class="p-add-to-cart-button">';
                        html+= '<i></i>';

                        html+= '<span>افزودن به سبد خرید</span>';

                        html+= '</a>';
                        html+= '</div>';
                        html+= '</div>';

                    }else
                    {
                        html+='<div class="well p-notavalible"> متاسفانه این کالا در حال حاضر موجود نیست. می‌توانید از طریق شماره تماس زیر برای موجود شدن این کالا تلاش فرمایید.  ';
                        html+='<br/><span>'+seller_name+':&nbsp'+seller_tel+'<span>';
                        html+='</div>';
                    }
                    $('#productConfig_P').html(html);


                }
            });


        }




    </script>
    <script type="text/javascript">

        $(document).ready(function() {
            $('.xzoom, .xzoom-gallery').xzoom({zoomWidth: 400, title: true, tint: '#333', Xoffset: 15});
            $('.xzoom2, .xzoom-gallery2').xzoom({position: '#xzoom2-id', tint: '#ffa200'});
            $('.xzoom3, .xzoom-gallery3').xzoom({position: 'lens', lensShape: 'circle', sourceClass: 'xzoom-hidden'});
            $('.xzoom4, .xzoom-gallery4').xzoom({tint: '#006699', Xoffset: 15});
            $('.xzoom5, .xzoom-gallery5').xzoom({tint: '#006699', Xoffset: 15});

            //Integration with hammer.js
            var isTouchSupported = 'ontouchstart' in window;

            if (isTouchSupported) {
                //If touch device
                $('.xzoom, .xzoom2, .xzoom3, .xzoom4, .xzoom5').each(function(){
                    var xzoom = $(this).data('xzoom');
                    xzoom.eventunbind();
                });

                $('.xzoom, .xzoom2, .xzoom3').each(function() {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function(element) {
                            element.hammer().on('drag', function(event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        xzoom.eventleave = function(element) {
                            element.hammer().on('tap', function(event) {
                                xzoom.closezoom();
                            });
                        }
                        xzoom.openzoom(event);
                    });
                });

                $('.xzoom4').each(function() {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function(element) {
                            element.hammer().on('drag', function(event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function(element) {
                            element.hammer().on('tap', function() {
                                counter++;
                                if (counter == 1) setTimeout(openfancy,300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openfancy() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                $.fancybox.open(xzoom.gallery().cgallery);
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

                $('.xzoom5').each(function() {
                    var xzoom = $(this).data('xzoom');
                    $(this).hammer().on("tap", function(event) {
                        event.pageX = event.gesture.center.pageX;
                        event.pageY = event.gesture.center.pageY;
                        var s = 1, ls;

                        xzoom.eventmove = function(element) {
                            element.hammer().on('drag', function(event) {
                                event.pageX = event.gesture.center.pageX;
                                event.pageY = event.gesture.center.pageY;
                                xzoom.movezoom(event);
                                event.gesture.preventDefault();
                            });
                        }

                        var counter = 0;
                        xzoom.eventclick = function(element) {
                            element.hammer().on('tap', function() {
                                counter++;
                                if (counter == 1) setTimeout(openmagnific,300);
                                event.gesture.preventDefault();
                            });
                        }

                        function openmagnific() {
                            if (counter == 2) {
                                xzoom.closezoom();
                                var gallery = xzoom.gallery().cgallery;
                                var i, images = new Array();
                                for (i in gallery) {
                                    images[i] = {src: gallery[i]};
                                }
                                $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                            } else {
                                xzoom.closezoom();
                            }
                            counter = 0;
                        }
                        xzoom.openzoom(event);
                    });
                });

            } else {
                //If not touch device

                //Integration with fancybox plugin
                $('#xzoom-fancy').bind('click', function(event) {
                    var xzoom = $(this).data('xzoom');
                    xzoom.closezoom();
                    $.fancybox.open(xzoom.gallery().cgallery, {padding: 0, helpers: {overlay: {locked: false}}});
                    event.preventDefault();
                });

                //Integration with magnific popup plugin
                $('#xzoom-magnific').bind('click', function(event) {
                    var xzoom = $(this).data('xzoom');
                    xzoom.closezoom();
                    var gallery = xzoom.gallery().cgallery;
                    var i, images = new Array();
                    for (i in gallery) {
                        images[i] = {src: gallery[i]};
                    }
                    $.magnificPopup.open({items: images, type:'image', gallery: {enabled: true}});
                    event.preventDefault();
                });
            }

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

    <script type="text/javascript">
        $(document).ready(function() {
            $('.fa.fa-like').click(function(){

            });
        });
    </script>
@stop
