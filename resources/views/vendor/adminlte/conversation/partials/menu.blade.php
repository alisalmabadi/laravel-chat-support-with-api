{{--
<div class="menu-part text-center">
    <div class="container clearfix">
        <nav class="rootmenu">
            <ul class="mobile-sub rootmenu-list">

                @php  $menu_i=1 @endphp

                @foreach($menus as $menu)

                    @if($menu->parent_id == 0)
                        <li class="roottopnav{{$menu_i}}"><span class="rootmenu-click"><i class="rootmenu-arrow"></i></span>
                    <a class="" href="{{$menu->link}}">{{$menu->name}}</a>
                    <div class="megamenu topmenu_main clearfix tabmenu " style="height: 523px;">
                        <div class="mainmenuwrap clearfix">
                            <ul class="root-col-1 clearfix vertical-menu">
                                @foreach($menus as $menu_l2)
                                    @if($menu_l2->parent_id == $menu->id)
                                <li class="clearfix"><a href="#" class="root-col-4"><span class="cat-arrow"></span><span class="tabmainimg">
                                            <img src="{{route('media', $menu_l2->icon)}}"
                                             alt="" width="28px" height="28px"></span><span class="tabmaintitle">{{$menu_l2->name}}</span></a>
                                    <div class="root-col-75 tab-menu-img verticalopen"
                                         style="height: 460px;">
                                        <div class="tab-left-link" style=" width: 31%;text-align: center">
                                           --}}
{{--@php--}}{{--


                                            --}}
{{--$menu_l3_res=$menus->where('parent_id', $menu_l2->id)->toArray();--}}{{--


                                            --}}
{{--$count=count($menu_l3_res)>1? count($menu_l3_res)/2:1;--}}{{--


                                            --}}
{{--$menu_dev=array_chunk($menu_l3_res,$count);--}}{{--




                                            --}}
{{--@endphp--}}{{--

                                            <div class="tabimgwpr">



                                                    @foreach($menus as $menul3)
                                                        @if($menul3->parent_id == $menu_l2->id)
                                                            <a href="{{$menul3['link']}}" class="tabimtag">
                                                                <div class="tabimgtext"><img style="width: 20px!important;height: 20px!important;" src="{{route('media',[$menul3->icon,20,20])}}" alt="">{{$menul3['name']}}</div>
                                                            </a>
                                                        @endif
                                                    @endforeach



                                            </div>


                                        </div>
                                        <div class="tab-right-img" style="width: 65%;">
                                            <img style="width: 460px!important;height: 460px!important;"
                                                    src="{{route('media',[$menu_l2->avatar,460,460])}}">
                                        </div>
                                    </div>
                                </li>
                                    @endif
                                @endforeach

                            </ul>
                        </div>
                    </div>
                </li>
                        @php  $menu_i++ @endphp

                    @endif

                @endforeach
            </ul>
            <div class="rootmenu-mobile" @click="toggler"><span class="icon-bar"></span> <span class="icon-bar"></span><span class="icon-bar"></span></div><div class="rootmenu-text">Navigation</div></nav>
    </div>
</div>--}}
