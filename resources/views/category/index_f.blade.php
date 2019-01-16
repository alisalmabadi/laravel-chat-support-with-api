





                    <div class="row ">
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


