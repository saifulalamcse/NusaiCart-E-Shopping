<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Nusai Cart</title>
    <link href="{{asset('frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::to('frontend/images/ico/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{URL::to('frontend/images/ico/apple-touch-icon-144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{URL::to('frontend/images/ico/apple-touch-icon-114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{URL::to('frontend/images/ico/apple-touch-icon-72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{URL::to('frontend/images/ico/apple-touch-icon-57-precomposed.png')}}">
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    

    </head>

 <style type="text/css">
     <style type="text/css">
.paymentWrap {
padding: 50px;
}

.paymentWrap .paymentBtnGroup {
    max-width: 800px;
    margin: auto;
}

.paymentWrap .paymentBtnGroup .paymentMethod {
    padding: 40px;
    box-shadow: none;
    position: relative;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active {
    outline: none !important;
}

.paymentWrap .paymentBtnGroup .paymentMethod.active .method {
    border-color: #4cd264;
    outline: none !important;
    box-shadow: 0px 3px 22px 0px #7b7b7b;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method {
    position: absolute;
    right: 3px;
    top: 3px;
    bottom: 3px;
    left: 3px;
    background-size: contain;
    background-position: center;
    background-repeat: no-repeat;
    border: 2px solid transparent;
    transition: all 0.5s;
}

.paymentWrap .paymentBtnGroup .paymentMethod .method.visa{
       background-image: url("https://c8.alamy.com/comp/FF4349/hand-paying-with-cash-from-wallet-FF4349.jpg");
   }
   

.paymentWrap .paymentBtnGroup .paymentMethod .method.master-card {
       background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcTCWKlVWNpKBA02KbvbmebCfmSewOLbOp7rpQ&usqp=CAU");
   }

.paymentWrap .paymentBtnGroup .paymentMethod .method.amex{
       background-image: url("https://encrypted-tbn0.gstatic.com/images?q=tbn%3AANd9GcSGoz3y6ZkhQWNLCsojJhidOXKd62tjclnjvw&usqp=CAU");
   }




.paymentWrap .paymentBtnGroup .paymentMethod .method.hover{
       border-color: #4cd264;
       outline: none !important;
   }

    </style>

    <body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        
                    </div>
                  
                </div>
            </div>
        </div>

    <p class="alert-success">
                      <?php 
                      $message=Session::get('title');
                      if ($message)
                      {
                        echo $message;
                        Session::put('title',null);

                      }

                      ?>
                      </p>
        
        <div class="header-middle">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img src="frontend/images/home/onlinelogo.png" alt="" /></a>
                        </div>
                        <!-- <div class="active" style="color:red;">
                            <h3>Nusai Cart</h3> 
                        </div> -->

                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">

                                @auth
                                <li><a href="{{route('checkout.page')}}">{{__('home.checkout_menu')}}</a></li> 

                                <li><a href="{{route('sell.page')}}">{{__('home.sellproduct_menu')}}</a></li>

                                <li><a href="{{URL::to('/my-order')}}">{{__('home.myorder_menu')}}</a></li> 

                                @else
                                <li><a href="{{URL::to('/login-check')}}">{{__('home.checkout_menu')}}</a></li> 

                                <li><a href="{{URL::to('/login-check')}}"><i class=""></i>{{__('home.sellproduct_menu')}}</a></li></a></li>

                                @endauth 

                                    <li><a href="{{URL::to('/show-cart')}}"><i class="fa fa-shopping-cart"></i> {{__('home.cart_menu')}}</a></li>

                                @if (Route::has('login'))
                                @auth
                                    
                                    <li><a href="#" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-user"></i>  
                                    {{__('home.logout_menu')}}</a></li>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                                </form>
                                @else
                                        <li><a href="{{URL::to('/login-check')}}"><i class="fa fa-lock"></i> {{__('home.login_menu')}}</a></li>

                                    @if (Route::has('register'))
                                       <li><a href="{{URL::to('/regi-check')}}"><i class="fa fa-user"></i>{{__('home.signup_menu')}}</a></li>
                                    @endif
                                @endauth
                            @endif
                            </ul>
                        </div>
                        <div class="btn-group pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default dropdown-toggle usa" data-toggle="dropdown">
                                    {{__('home.language_menu')}}
                                    <span class="caret"></span>
                                </button>
                                <ul class="dropdown-menu">
                                    <li><a class ="nav-link" href="lang/en">English</a></li>
                                    <li><a class ="nav-link" href="lang/bn">Bangla</a></li>
                                </ul>
                            </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/')}}" class="active">{{__('home.home_menu')}}</a></li>
                                <li class="dropdown"><a href="#">{{__('home.shop_menu')}}<i class="fa fa-angle-down">
                                </i></a>
                                    <ul role="menu" class="sub-menu">
                                        @auth
                                        <li><a href="{{route('checkout.page')}}">{{__('home.checkout_menu')}}</a></li> 
                                        @else
                                        <li><a href="{{URL::to('/login-check')}}">{{__('home.checkout_menu')}}</a></li> 
                                        @endauth
                                        
                                        <li><a href="{{URL::to('/show-cart')}}">{{__('home.cart_menu')}}</a></li> 
                                         
                                    </ul>
                                </li> 
                               
                                <li><a href="{{URL::to('/old-product')}}">{{__('home.oldproduct_menu')}}</a></li>
                                <li><a href="{{URL::to('/contact')}}">{{__('home.Contact_menu')}}</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="search_box pull-right">
                            <input type="text" id="search-product" placeholder="{{__('home.Search_menu')}}"/>
                            <div id="search-result">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>{{__('home.category_menu')}}</h2>
                        <div class="panel-group category-products" id="accordian">
                            <!--category-productsr-->
                            <div class="panel panel-default">

                            <?php
                             
                             $all_published_category=DB::table('tbl_category')
                                                    ->where('publication_status', 1)
                                                    ->get();
                            foreach($all_published_category as $v_category){?> 

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h4 class="panel-title"><a href="{{URL::to('/product_by_category/'.$v_category->id ?? '')}}">{{$v_category->category_name}}</a></h4>
                                </div>
                            </div>

                             <?php } ?>


                        </div><!--/category-products-->
                        </div>
                        <div class="brands_products"><!--brands_products-->
                            <h2>{{__('home.brands_menu')}}</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                        <?php
                             
                             $all_published_brand=DB::table('tbl_brand')
                                                    ->where('publication_status', 1)
                                                    ->get();
                            foreach($all_published_brand as $v_brand){?> 
                                    <li><a href="{{URL::to('/product_by_brand/'.$v_brand->id ?? '')}}"> <span class="pull-right"></span>{{$v_brand->brand_name}} </a></li>
                        <?php } ?> 
                                </ul>
                            </div>
                        </div><!--/brands_products-->
                        
                      
                        
                        
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">
                    <div class="features_items">

                <!--features_items-->
                    
                 @yield('content')
                    
                </div>
            </div>

        </div>
        
        </div>
    </section>
    
    <footer id="footer"><!--Footer-->
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="companyinfo">
                            <h2><span>NUSAI</span>CART</h2>
                            
                        </div>
                    </div>
                  
                  
                </div>
            </div>
        </div>
        
      
        
    </footer><!--/Footer-->
    <script src="{{asset('frontend/js/jquery.js')}}"></script>
    <script src="{{asset('frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('frontend/js/price-range.js')}}"></script>
    <script src="{{asset('frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('frontend/js/main.js')}}"></script>
    <script>
        $(document).ready(function(){
            $("#search-result").empty();
            var list='';
            $("#search-product").keyup(function(){
$("#search-result").empty();
            var list='';
                var search=$("#search-product").val();
                // console.log(search);
                $.ajax({
                            url: '{{route('search.product')}}',
                            type: "get",
                            data: {search_query: search},

                        }).done(function(data){
                           // console.log(data);
                           var list='';

                            $.each(data,function(index,value){
                             var list=`<a class="text-danger" href="{{url('view_product/')}}/${value.product_id ? value.product_id : '0'}"><li>${value.product_name ? value.product_name : ''}</a></li>`;
                             $("#search-result").append(list);
                             console.log(value)
                            });
                            // console.log(list);
                           
                        }).fail(function(jqXHR, ajaxOptions, thrownError){
                              alert('No response from server');
                        });
            });
        });
    </script>
</body>
</html>
