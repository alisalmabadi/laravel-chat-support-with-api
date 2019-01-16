<section class="product-main-spec">
    <div class="col-sm-4" style="height: 600px">
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
        <div class="xzoom-container">
            @if($product->images()->first())
            <img class="xzoom" id="xzoom-default" src="{{route('media',$product->images()->first()->id)}}" xoriginal="{{route('media',$product->images()->first()->id)}}" />
            <div class="xzoom-thumbs">
                @foreach($product->images as $image)

                    <a href="{{route('media',$image->id)}}"><img class="xzoom-gallery" width="60" src="{{route('media',$image->id)}}"  xpreview="{{route('media',$image->id)}}" ></a>
                @endforeach
            </div>
            @endif
        </div>
    </div>

    <div class="col-sm-8" style="height: 600px">
        <div style="width: 100%;height: 500px;top: 0;right:0;background-color: #fff" id="gallery-zoom">
            <header class="product-spec-header">
                <div class="p-header-info">
                    <h1>{{$product->name}}
                        <span>{{$product->skill}}</span>

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
                            @if($product->product_variety_values()->first())
                            <div id="productConfig_P">
                                @if($variety_sel->count >0)
                                    <div class="p-price-state">
                                <div class="p-payable-price">
                                    <span class="label">قیمت</span>
                                    <span class="price">
                                        @if($variety_sel)
                                            {{$variety_sel->price}}
                                        @endif
                                    </span>
                                    <span class="payable-currency">تومان</span>


                                </div>
                            </div>
                                    <div class="p-add-to-cart-area">
                                <div class="p-add-to-cart">
                                    <a href="javascript:;" onclick="$('#frm_variety').submit();"  class="p-add-to-cart-button">
                                        <i></i>
                                        @if($variety_sel && $variety_sel->count>0)
                                        <span>افزودن به سبد خرید</span>
                                        @else
                                            <span>ناموجود</span>
                                        @endif

                                    </a>
                                </div>

                            </div>
                                @else
                                    <div class="well p-notavalible"> متاسفانه این کالا در حال حاضر موجود نیست. می‌توانید از طریق شماره تماس زیر برای موجود شدن این کالا تلاش فرمایید.
                                       <br/>
                                       <br/>
                                        <span>{{$product->seller->company_name}}: &nbsp {{$product->seller->tel_number}}</span>
                                        </div>
                                @endif
                            </div>
                            @endif


                        </div>
                    </div>

                </div>

                <div class="col-sm-4 hidden-xs">
                    <div class="p-att-Summary">
                        <ul>
                                    @foreach($product->category->attribute_groups->first()->attributes as $attribute)

                                        <li>
                                            <i class="icon-circle"></i>
                                            <span >{{$attribute->name}}:</span>
                                            <span >

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
                                        </li>
                                    @endforeach

                        </ul>
                    </div>


                </div>

            </div>

        </div>


    </div>


</section>

