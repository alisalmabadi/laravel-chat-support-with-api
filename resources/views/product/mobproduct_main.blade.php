
<section class="product-main-spec">
    <div class="col-sm-4" style="height: 514px">
        <div class="p-slider-top">
            <ul>
                <li>
                    <a href="" ><span class="fa  fa-share-alt"></span></a>
                </li>
                <li>
                    <a href="" ><span class="fa  fa-heart-o"></span></a>
                </li>
                <li>
                    <a href="" ><span class="fa fa-bell"></span></a>
                </li>
                <li>
                    <a href="" ><span class="fa fa-industry"></span></a>
                </li>




            </ul>


        </div>
       @include('product.owl-carousel')

    </div>
    <div class="col-sm-8">
        <div style="width: 100%;height: 500px;top: 0;right:0;background-color: #fff" id="gallery-zoom">
            <header class="product-spec-header">
                <div class="p-header-info">
                    <h1>آنتی بیوتیک مایع نوع 1
                        <span>antibutic type1</span>

                    </h1>
                </div>
                <div class="p-header-extra hidden-xs">
                    <div class="offer-bg"></div>
                    <p>
                                    <span>
                                        <span class="count">
                                                +۲۰
                                                 </span>
                                             نفر از خریداران
                                        </span>
                        پیشنهاد خرید داده اند
                    </p>


                </div>



            </header>
            <div class="p-config-container">
                <div class="col-sm-8">

                    @if($product->product_variety_values()->first())
                        <div class="p-config-container-ajax">
                            <form id="frm_variety" method="Post" action="{{route('product.addtocart')}}">
                                {{csrf_field()}}
                                <input type="hidden" name="main_variety" value="{{$variety_sel->id}}">
                                <input type="hidden" name="selected_option" value="0">
                                <input type="hidden" name="price" value="{{$variety_sel->price}}">
                                <input type="hidden" name="count" value="{{$variety_sel->count}}">
                                <input type="hidden" name="p_id" value="{{$product->id}}">
                                @foreach($varieties as $key=>$variety)

                                    <div class="p-color-chose">
                                        <b>{{$variety['v_name']}}</b>
                                        <ul>
                                            @foreach($variety['v_options'] as $v_option)
                                                <li>
                                                    <div class="p-color-box">
                                                        <input type="radio" value="{{$v_option['op_id']}}" name="spec[{{$key}}][]"  @if($v_option['active']) checked="checked"  @endif   @if($v_option['disable']) disabled="true" @endif>
                                                        <label class=" @if($v_option['active']) active @endif "  onclick="v_load(this);" @if($v_option['disable']) disabled="true" @endif>{{$v_option['op_name']}} </label>

                                                    </div>
                                                </li>
                                            @endforeach
                                        </ul>

                                    </div>
                                    <div class="clearfix"></div>
                                @endforeach
                            </form>
                        </div>
                    @endif
                    <div class="p-config-detail">
                        <div class="p-seller">
                            {{--<div class="p-config-warranty ">--}}
                                {{--<i></i>--}}
                                {{--گارانتی سازنده--}}
                            {{--</div>--}}
                            <div class="p-seller-detail">
                                <div class="p-seller-title ">
                                    <i></i>
                                    فروش توسط
                                    <span>
                                                    <i></i>
                                        {{$product->seller->company_name}}
                                                </span>
                                </div>


                                <div class="p-seller-lead-time ">
                                    <i></i>
                                    بسته بندی و ارسال توسط     {{$product->seller->company_name}}
                                </div>
                            </div>

                            <form id="productConfig_P" class="p-add-to-cart-mobile">

                                @if($product->product_variety_values()->first())

                                        @if($variety_sel->count >0)
                                        <a href="javascript:;" onclick="$('#frm_variety').submit();" class="p-add-to-cart-button">
                                            <h3 class="cro-add-2-cart"> افزودن به سبد خرید </h3>
                                            <div class="cro-seprator"></div>
                                            <div class="cro-price">
                                                <div style=" display: grid; justify-content: center; text-align: right; ">
                                                    <div class="cro-old-p"></div>
                                                    <div class="cro-curr-p" style="line-height: 2.5;">
                                                        @if($variety_sel)
                                                        <div class="cro-num-p"> {{$variety_sel->price}}</div>
                                                        <div class="cro-toman">تومان</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>

                                        @else
                                        <a style="background-color: #ef6c51;">
                                            <h3 class="cro-add-2-cart"> ناموجود </h3>
                                            <div class="cro-seprator"></div>
                                            <div class="cro-price">
                                                <div style=" display: grid; justify-content: center; text-align: right; ">
                                                    <div class="cro-old-p"></div>
                                                    <div class="cro-curr-p" style="line-height: 2.5; font-size: 12px;text-align: center">
                                                        @if($variety_sel)
                                                            <div class="cro-num-p" style="font-size: 15px"> {{$product->seller->company_name}}</div>
                                                            <div class="cro-toman" style="font-size: 12px">{{$product->seller->tel_number}}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </a>


                                        @endif

                                @endif



                            </form>




                        </div>
                    </div>

                </div>

                <div class="col-sm-4 hidden-xs">
                    <div class="p-att-Summary">
                        <ul>
                            <li>
                                <i class="icon-circle"></i>
                                <span>طریقه مصرف:</span>
                                <span>هر هشت ساعت</span>
                            </li>
                            <li>
                                <i class="icon-circle"></i>
                                <span>زمان تاثیر:</span>
                                <span>یک ساعت پس از مصرف</span>
                            </li>
                            <li>
                                <i class="icon-circle"></i>
                                <span>زمان تاثیر:</span>
                                <span>یک ساعت پس از مصرف</span>
                            </li>
                            <li>
                                <i class="icon-circle"></i>
                                <span>زمان تاثیر:</span>
                                <span>یک ساعت پس از مصرف</span>
                            </li>

                        </ul>
                    </div>


                </div>

            </div>
        </div>


    </div>


</section>