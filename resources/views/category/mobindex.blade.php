@extends('layouts.mobapp')


@section('content')
    <style>
        .loading
        {
            width: 100%;
            height: 500px;
            position: absolute;
            z-index: 9999999;
            background: #FFF;
            text-align: center;
            display: none;
        }
        .loading>img
        {
            margin-top: 35px;
        }
        .p-category-main-box
        {
            padding: 15px 3px;
            margin: 15px 0px;
            background-color: #fff;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -moz-box-shadow: 1px 2px 5px #ccc;
            -webkit-box-shadow: 1px 2px 5px #ccc;

        }
        .p-category-main-box-f
        {
            padding: 15px 3px;
            margin: 15px 0px;
            background-color: #fff;
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -moz-box-shadow: 1px 2px 5px #ccc;
            -webkit-box-shadow: 1px 2px 5px #ccc;
            overflow-y: auto;

        }
        .c-breadcrumb
        {
            margin:10px 0;


            overflow:hidden;
            height:37px;

            padding:0 15px;



        }
        .c-breadcrumb li
        {
            float: right;
        }
        .c-breadcrumb li a:hover
        {
            color: #ef3f3e;
        }

        .c-breadcrumb li a
        {
            display: block;
            font-family: iransanse!important;
            padding: 0 16px;
            color: #4d4d4d;
            font: normal 14px/37px yekan;
            background: url("../images/slices.png") no-repeat -276px -70px;
            transition: 150ms ease;
            -ms-transition: 150ms ease;
            -moz-transition: 150ms ease;
            -webkit-transition: 150ms ease;
        }
        .c-breadcrumb span {
            direction: rtl;
            display: inline-block;
        }
        .p-category-p-box
        {
            padding: 15px;
            margin: 15px 0px;
            background-color: #fff;

        }
        .p-category-p-box:hover
        {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
            -moz-box-shadow: 1px 2px 5px #ccc;
            -webkit-box-shadow: 1px 2px 5px #ccc;
        }
        .p-category-p-box a
        {color:#000;

        }
        .p-category-p-box a:hover
        {
            text-decoration: none;
            color:#000;
        }
        .p-category-main-top-title
        {
            padding-right: 28px;
        }

        .p-category-main-top-title h4
        {
            display: inline-block;
            float: right;
        }

        .products__item-price--final {
            font-size: 18px;

            color: #6a6f6c;
        }
        .behclick-panel  .list-group {
            margin-bottom: 0px;
        }
        .behclick-panel .list-group-item:first-child {
            border-top-left-radius:0px;
            border-top-right-radius:0px;
        }
        .behclick-panel .list-group-item {
            border-right:0px;
            border-left:0px;
        }
        .behclick-panel .list-group-item:last-child{
            border-bottom-right-radius:0px;
            border-bottom-left-radius:0px;
        }
        .behclick-panel .list-group-item {
            padding: 5px;
        }
        .behclick-panel .panel-heading {
            /* 				padding: 10px 15px;
                            border-bottom: 1px solid transparent; */
            border-top-right-radius: 0px;
            border-top-left-radius: 0px;
            border-bottom: 1px solid #F9C3B1;
        }
        .behclick-panel .panel-heading:last-child{
            /* border-bottom: 0px; */
        }
        .behclick-panel {
            border-radius: 0px;
            border-right: 0px;
            border-left: 0px;
            border-bottom: 0px;
            box-shadow: 0 0px 0px rgba(0, 0, 0, 0);
        }
        .behclick-panel .radio, .checkbox {
            margin: 0px;
            padding-left: 10px;
        }
        .behclick-panel .panel-title > a, .panel-title > small, .panel-title > .small, .panel-title > small > a, .panel-title > .small > a {
            outline: none;
        }
        .behclick-panel .panel-body > .panel-heading{
            padding:10px 10px;
        }
        .behclick-panel .panel-body {
            padding: 0px;
        }
        /* unvisited link */
        .behclick-panel a:link {
            text-decoration:none;
        }

        /* visited link */
        .behclick-panel a:visited {
            text-decoration:none;
        }

        /* mouse over link */
        .behclick-panel a:hover {
            text-decoration:none;
        }
        .indicator
        {
            float: left;
        }
        .filter-title
        {
            background-color: #ff5722!important;

        }

    </style>
    @include('partials.mobheader')




    <div class="container-fluid">
        <div class="c-breadcrumb" role="breadcrumb">
            <ol vocab="http://schema.org/" typeof="BreadcrumbList">

                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="#">
                        <span property="name">فروشگاه</span>
                    </a>
                    <meta property="position" content="1">
                </li>



                <li property="itemListElement" typeof="ListItem">
                    <a property="item" typeof="WebPage" href="#">
                        <span property="name">{{$category->name}}</span>
                    </a>
                    <meta property="position" content="2">
                </li>



            </ol>

        </div>
    <div class="row">
        <div class="col-sm-2">
            <section class="p-category-main-box-f" style="height: auto">



            <div id="accordion" class="panel panel-primary behclick-panel">
                <div class="panel-heading filter-title">
                    <a data-toggle="collapse" href="#collapseM">
                    <h3 class="panel-title" > فیلتر <span class="fa fa-filter"></span>
                        <i class="indicator fa fa-caret-left" aria-hidden="true"></i>
                    </h3>
                    </a>
                </div>
                <div id="collapseM" class="panel-collapse collapse"  >
                    <form id="frm_filter"  action="{{route('category.show_fm',$category)}}" method="post" class="js-news-form">
                        {{csrf_field()}}
                    <div class="panel-heading " >
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapseP">
                               رنج قیمت
                                <i class="indicator fa fa-caret-left" aria-hidden="true"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapseP" class="panel-collapse collapse" >

                        <input type="hidden" name="price_min">
                        <input type="hidden" name="price_max">
                            <p>
                                <input id="amount" readonly="" style="border:0; color:#f6931f; font-weight:bold;" type="text">
                            </p>
                            <div  style="width: 100%;padding: 5px">
                                <div id="slider-range"></div>
                                <button class="btn btn-bitbucket" type="button" onclick="filter()" style="margin: 10px 25% ">اعمال</button>
                            </div>

                    </div>

                    <div class="panel-heading " >
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapseS">
                                فروشنده
                                <i class="indicator fa fa-caret-left" aria-hidden="true"></i>
                            </a>
                        </h4>
                    </div>

                    <div id="collapseS" class="panel-collapse collapse" >
                        <ul class="list-group">
                            @foreach($sellers as $seller)
                                <li class="list-group-item">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"  name="seller_ids[]" class="filter" value="{{$seller->id}}">
                                            {{$seller->company_name}}
                                        </label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>

                    @foreach($varieties as $variety)
                    <div class="panel-heading " >
                        <h4 class="panel-title">
                            <a data-toggle="collapse" href="#collapse{{$variety->id}}">
                                 {{$variety->name}}
                                <i class="indicator fa fa-caret-left" aria-hidden="true"></i>
                            </a>
                        </h4>
                    </div>
                    <div id="collapse{{$variety->id}}" class="panel-collapse collapse" >
                        <ul class="list-group">
                            @foreach($variety->variety_options as $variety_option)
                            <li class="list-group-item">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox"  name="variety_options[]" class="filter"  value="{{$variety_option->id}}">
                                        {{$variety_option->title}}
                                    </label>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @endforeach

                    </form>
                </div>
            </div>
            </section>


        </div>


        <div class="col-sm-10 ">
            <section class=" p-category-main-box">

                <div class="row p-category-main-top-title" ><h4 >{{$category->name}} <span>({{count($category->products)}})</span> </h4>
                    <div  style="width: 85%; display: inline-block; padding: 0px 10px;border-right:1px solid #cbcbcb;margin: 10px 7px;float: right; ">
                    <div class="input-group" >

                        <input class="form-control" placeholder="جستوجو" type="text" style="height: 36px;">
                        <span class="input-group-btn">
                                    <button class="btn btn-default" type="button" onclick="filter()"><span class="fa fa-search"></span></button>
                                 </span>

                    </div>
                    </div>


                </div>
                <div class="clear-fix"></div>
                <div class="loading">
                    <img src="{{route('home')}}/images/loading.gif" alt="">
                </div>
                <div class="p-category-main-box-fi">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-sm-3">
                                <section  class="p-category-p-box">


                                    <a href="{{route('product.show',$product)}}"  class="text-center">
                                        <div>
                                            @if($product->images()->first())
                                                <img height="100%" width="100%" src="{{route('media',$product->images()->first()->id)}}" alt="">
                                            @else
                                                <img height="100%" width="100%" src="{{route('media',1)}}" alt="">
                                            @endif
                                        </div>
                                        <h4>{{$product->name}}</h4>
                                        <h6 class="products__item-price--final"><span>
                                     @if($product->product_variety_values->first())
                                                    {{$product->product_variety_values->first()->price}}
                                                @else
                                                    0
                                                @endif
                                                <span class="currency">تومان</span></span></h6>



                                    </a>
                                </section>


                            </div>


                        @endforeach
                    </div>
                    <div class="row text-center" >
                        {{$products->links('partials.pagination')}}
                    </div>
                </div>

            </section>

        </div>

    </div>

    </div>

    @include('partials.footer')



@stop
@section('script_whole')
    <script>

        function toggleChevron(e) {
            $(e.target)
                .prev('.panel-heading')
                .find("i.indicator")
                .toggleClass('fa-caret-down fa-caret-left');
        }
        $('#accordion').on('hidden.bs.collapse', toggleChevron);
        $('#accordion').on('shown.bs.collapse', toggleChevron);

        $( function() {
            $( "#slider-range" ).slider({
                range: true,
                min: {{$min_price}},
                max:  {{$max_price}},
                values: [{{$min_price}}, {{$max_price}}],
                slide: function( event, ui ) {
                    $( "#amount" ).val(  ui.values[ 0 ] + "  ریال - " + ui.values[ 1 ]+"ریال "  );
                    $('input[name=price_min]').val(ui.values[ 0 ]);
                    $('input[name=price_max]').val(ui.values[ 1 ]);
                }
            });
            $( "#amount" ).val(  $( "#slider-range" ).slider( "values", 0 ) +"ریال - " +
                $( "#slider-range" ).slider( "values", 1 )+ "ریال "  );

            $('input[name=price_min]').val($( "#slider-range" ).slider( "values", 0 ));
            $('input[name=price_max]').val($( "#slider-range" ).slider( "values", 1 ));
        } );



        $(document).ajaxStart(function () {
            $('.loading').show();
        });
        $(document).ajaxStop(function () {
            $('.loading').hide();
        });

        function paginator(obj)
        {
            var url=$(obj).attr('ahref');

            // $('.s-news-lst-content').html('<div class="sc-news-lst s-news-nodata">\n' +
            //     '                        <div class="s-loading"><span class="blind">در حال بارگذاری</span></div>\n' +
            //     '                    </div>');

            $('.p-category-main-box-fi').load(url);





        }


        $('input.filter').change(function () {
            filter();
        });

        function  filter()
        {
            $.ajax({
                url:'{{route('category.show_fm',$category)}}',
                method:'post',
                data:$('#frm_filter').serialize(),
                success:function (response) {
                    $('.p-category-main-box-fi').html(response);
                }
            });

        }

        function reset_filters()
        {
            $('.s-news-lst-content').html('<div class="sc-news-lst s-news-nodata">\n' +
                '                        <div class="s-loading"><span class="blind">در حال بارگذاری</span></div>\n' +
                '                    </div>');
            $('.s-chk-wrap').find('input').each(function (index,obj)
            {
                $(obj).prop('checked', false);
                $(obj).closest('li').find('.s-inp-chk').removeClass('s-on');
            });
            $('input[name=search]').val("");

            $.ajax({
                type: "POST",
                url: '{{route('category.show_f',$category)}}',
                data: $("#frm_filter").serialize(), // serializes the form's elements.
                success: function(data)
                {

                    $('.s-news-lst-content').html(data);
                }
            });
            $('.s-btn-reset').hide();


        }

        function  reset_switch()
        {
            var flag=false;
            $('.s-chk-wrap').find('input').each(function (index,obj)
            {
                if($(obj).is(':checked'))
                {
                    flag=true;
                }
            });
            if($('#inp_srch_news').val() !="")
            {

                flag=true;
            }


            if(flag)
            {

                $('.s-btn-reset').show();
            }else
            {
                $('.s-btn-reset').hide();
            }
        }

        $('input[name=searchh]').keyup(function ()
        {
            $('input[name=search]').val($(this).val());
        });






    </script>
@stop