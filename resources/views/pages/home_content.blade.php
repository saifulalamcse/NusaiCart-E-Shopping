@extends('welcome')
@section('content')
@include('slider')
<h2 class="title text-center">{{__('home.features_menu')}}</h2>

<?php foreach($all_published_pro as $v_published_product){?> 
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="{{URL::to($v_published_product->product_image)}}" style="height: 300px " alt="" />
                                            <h2>{{$v_published_product->product_price}} {{__('home.tk_menu')}}</h2>
                                            <p>{{$v_published_product->product_name}}</p>
                                            <!-- <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('home.addcart_menu')}}</a> -->
                                        </div>
                                        <div class="product-overlay">
                                            <div class="overlay-content">
                                                <h2>{{$v_published_product->product_price}} {{__('home.tk_menu')}}</h2>
                                                <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}"><p>{{$v_published_product->product_name}}</p></a>
                                                <a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('home.addcart_menu')}}</a>
                                                
                                            </div>
                                        </div>
                                </div>
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <li><a href="#"><i class="fa fa-plus-square"></i>
                                            {{$v_published_product->brand_name}}</a></li>
                                        <li><a href="{{URL::to('/view_product/'.$v_published_product->product_id)}}"><i class="fa fa-plus-square"></i>{{__('home.viewproduct_menu')}}</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        

@endsection


