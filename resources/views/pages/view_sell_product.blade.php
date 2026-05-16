@extends('welcome')
@section('content')

<h2 class="title text-center">{{__('home.features_menu')}}</h2>

<?php foreach($old_product_published as $v_old_product){?> 
                <div class="col-sm-4">
                    <div class="product-image-wrapper">
                        <div class="single-products">
                            <div class="productinfo text-center">
                                <img src="{{URL::to($v_old_product->product_image)}}" style="height: 300px " alt="" />
                                <h2>{{$v_old_product->product_price}} {{__('home.tk_menu')}}</h2>
                                <p>{{$v_old_product->product_name}}</p>
                               
                            </div>
                                
                            <div class="product-overlay">
                                <div class="overlay-content">
                                    <h2>{{$v_old_product->product_price}} {{__('home.tk_menu')}}</h2>
                                    <a href="{{URL::to('/view_old_product/'.$v_old_product->product_id)}}"><p>{{$v_old_product->product_name}}</p></a>
                                    <a href="{{URL::to('/view_old_product/'.$v_old_product->product_id)}}" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>{{__('home.addcart_menu')}}</a>
                                    
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
                <?php } ?>
                        

@endsection



