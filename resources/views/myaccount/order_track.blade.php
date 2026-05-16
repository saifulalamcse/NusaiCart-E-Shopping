@extends('welcome')
@section('content')

<style>
ol.progtrckr {
    margin: 0;
    padding: 0;
    list-style-type none;
}

ol.progtrckr li {
    display: inline-block;
    text-align: center;
    line-height: 4em;
}

ol.progtrckr[data-progtrckr-steps="2"] li { width: 49%; }
ol.progtrckr[data-progtrckr-steps="3"] li { width: 33%; }
ol.progtrckr[data-progtrckr-steps="4"] li { width: 24%; }
ol.progtrckr[data-progtrckr-steps="5"] li { width: 19%; }
ol.progtrckr[data-progtrckr-steps="6"] li { width: 16%; }
ol.progtrckr[data-progtrckr-steps="7"] li { width: 14%; }
ol.progtrckr[data-progtrckr-steps="8"] li { width: 12%; }
ol.progtrckr[data-progtrckr-steps="9"] li { width: 11%; }

ol.progtrckr li.progtrckr-done {
    color: black;
    border-bottom: 4px solid yellowgreen;
}
ol.progtrckr li.progtrckr-todo {
    color: silver; 
    border-bottom: 4px solid silver;
}

ol.progtrckr li:after {
    content: "\00a0\00a0";
}
ol.progtrckr li:before {
    position: relative;
    bottom: -2.5em;
    float: left;
    left: 50%;
    line-height: 1em;
}
ol.progtrckr li.progtrckr-done:before {
    content: "\2713";
    color: white;
    background-color: yellowgreen;
    height: 2.2em;
    width: 2.2em;
    line-height: 2.2em;
    border: none;
    border-radius: 2	.2em;
}
ol.progtrckr li.progtrckr-todo:before {
    content: "\039F";
    color: silver;
    background-color: white;
    font-size: 2.2em;
    bottom: -1.2em;
}


.greyBg{ margin-top:20px}
.inner_msg{
	clear: both;
	padding: 10px;
	margin: 0 auto;
	width:99%;
	background-color:#efefef;
	border:1px solid #ccc;
	min-height: 150px;
}


</style>

	<div class="greyBg">
      <div class="container">
		<div class="wrapper">
            <div class="row">
				<div class="col-sm-12">
				   <div class="breadcrumbs">
           
			       <ul>
              <td><a href="{{URL::to('/my-order')}}" class="btn btn-info">My Order</a></td>
                <h3><li><span class="dot">Name:</span>
                <a href=""> {{Auth::user()->name}}</a></li>
                <li><span class="dot">Your Order Current Location !</span>
                </h3>
                
			        </ul>
                    </div>
                </div>
	        </div>

          <div class="row top25 inboxMain" >
             <div class="row text-center alert alert-info">

             <div class="col-md-4"><h3>Order ID:  {{$track_orders[0]->order_id}}</h3> </div>
             <div class="col-md-4"><h3> Status: {{$track_orders[0]->order_status}}</h3></div>
           
             </div>
           </div>

               @if($track_orders[0]->order_status=="pending")
               @include('myaccount.steps.pending')

               @elseif($track_orders[0]->order_status=="dispatched")
                @include('myaccount.steps.dispatched')


                 @elseif($track_orders[0]->order_status=="processed")
                @include('myaccount.steps.processed')
                

                 @elseif($track_orders[0]->order_status=="shipped")
                @include('myaccount.steps.shipped')
                
                @elseif($track_orders[0]->order_status=="delivered")
                @include('myaccount.steps.delivered')

                @elseif($track_orders[0]->order_status=="cancelled")

              <h1 align="center">your order cancelled by admin</h1><br>


               @endif


        </div> 

      </div>

    </div>


@endsection