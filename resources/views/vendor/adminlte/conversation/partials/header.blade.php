
<div class="headerpart clearfix hidden-xs">
    <div class="top-add">
        <div class="container clearfix">
            <div class="currencydiv">
                <!--currency component-->
            </div>

          {{--  <ul class="top-left-link">
                @if(\Auth::guard('web')->check())

                    @php
                        $user=Auth::guard('web')->user();
                            $total_price=0;
                                foreach ($user->carts as $cart)
                                {
                                 $total_price+=$cart->product->product_variety_values()->where('id',$cart->product_variety_value_id)->first()->price*$cart['count'];
                                }

                    @endphp
                <li>

                    <a href="{{route('user.cart')}}">
                        <i  class="shopping-cart">
                            <img class="flag" src="{{route('home')}}/images/cart-icon.png" alt=""></i> {{count($user->carts) }} مورد (<span class="price">{{ $total_price }} ريال</span>)</a> </li>
                @else
                    @php
                        $count=0;
                        $total_price=0;

                            if(\Cookie::get("carts"))
                              {
                                  $json_str = \Cookie::get("carts");

                                  $rearr = json_decode($json_str);

                                  foreach($rearr as $obj)
                                  {
                                   $count++;
                                      $total_price += $obj->price * $obj->count;

                                  }

                              }

                    @endphp--}}
             {{--   <li>
                    <a href="{{route('user.cart')}}">
                        <i  class="shopping-cart">
                            <img class="flag" src="{{route('home')}}/images/cart-icon.png" alt=""></i> {{ $count}} مورد (<span class="price">{{ $total_price }} ريال</span>)</a> </li>

                @endif--}}

                @if(Auth::guard('web')->check())
                <li>
                    <a href="{{route('logout')}}">خروج</a>
                </li>
                @endif
                @if(Auth::guard('web')->check())

                    <li>
                        <a href="{{route('user.profile')}}">سلام،{{Auth::guard('web')->user()->name}}</a>
                    </li>
                @else
                <li>
                    <a href="{{route('login')}}" data-toggle="modal" data-target="#loginM">حساب من</a>
                </li>
                    @endif


            </ul>



        </div>

    </div>

    <div class="logo-part">
        <div class="container">
            <div class="logo">
                <a href="#">
                    <img class="logo-img large" alt="" />

                </a>
            </div>

            <form class="searchautocomplete UI-SEARCHAUTOCOMPLETE" action="#" method="get" data-tip="product name, product number, CAS or keywords">

                <div class="nav">


                    <div class="nav-input UI-NAV-INPUT">
                        <input class="input-text UI-SEARCH" autocomplete="off" name="q" value="" maxlength="128" type="text">
                    </div>

                    <div class="searchautocomplete-loader UI-LOADER">
                        <div id="g01"></div>
                        <div id="g02"></div>
                        <div id="g03"></div>
                        <div id="g04"></div>
                        <div id="g05"></div>
                        <div id="g06"></div>
                        <div id="g07"></div>
                        <div id="g08"></div>
                    </div>
                </div>
                <div class="nav-submit-button">
                    <button type="submit" title="Go" class="button"><i aria-hidden="true" class="fa fa-search"></i></button>
                </div>
                <div style="display:none" class="searchautocomplete-placeholder UI-PLACEHOLDER"></div>
            </form>
        </div>
    </div>

    @include('partials.menu')

    <div id="loginM" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                {{--<div class="modal-header">--}}
                    {{--<button type="button" class="close" data-dismiss="modal">&times;</button>--}}
                    {{--<h4 class="modal-title">Modal Header</h4>--}}
                {{--</div>--}}
                {{--<div class="modal-body">--}}
                    {{--<p>Some text in the modal.</p>--}}
                {{--</div>--}}
                {{--<div class="modal-footer">--}}
                    {{--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>--}}
                {{--</div>--}}
            </div>

        </div>
    </div>


</div>

