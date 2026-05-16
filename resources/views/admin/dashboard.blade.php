@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
				
					
					<i class="icon-angle-right"></i>
				</li>
				<li><a href="{{URL::to('/dashboard')}}">Dashboard</a></li>
			</ul>

			<div class="logo pull-left">
                            <a href="{{URL::to('/')}}"><img src="frontend/images/home/onlinelogo.png" alt="" /></a>
                        </div>


                <!-- <div class="active" style="color:red;">
                           
                           <h1>Nusai Cart</h1> 
                </div> -->
			
			

@endsection
