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
                            <input type="radio" value="{{$v_option['op_id']}}" name="spec[{{$key}}][]"  @if($v_option['active']) checked="checked" @endif   @if($v_option['disable']) disabled="true" @endif>
                            <label class=" @if($v_option['active']) active @endif "  onclick="v_load(this);" @if($v_option['disable']) disabled="true" @endif>{{$v_option['op_name']}} </label>
                        </div>
                    </li>

                @endforeach

            </ul>

        </div>
        <div class="clearfix"></div>
    @endforeach



</form>
