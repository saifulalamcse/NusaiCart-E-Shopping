@extends('admin_layout')
@section('admin_content')

            <ul class="breadcrumb">
				
				<li><a href="#">Delivery Man Information !</a></li>
			</ul>
			        <p class="alert-success">
                     <?php 
                      $message=Session::get('message');
                      if ($message)
                      {
                      	echo $message;
                      	Session::put('message',null);

                      }

                      ?>									
					</p>

					
					<div class="">
						<table class="table table-striped table-bordered bootstrap-datatable ">
						  <thead>
							  <tr>
								  <th>ID</th>
								  <th>Name</th>
								  <th>Mobile</th>
								  <th>Email</th>
								  <th>Actions</th>
							  </tr>
						  </thead>   
 
                          @foreach($all_deliver_man as $v_man)  
						  <tbody>
							<tr>
								<td>{{$v_man->id}}</td>
								<td class="center">{{$v_man->name}}</td>
								<td class="center">{{$v_man->mobile}}</td>
								<td class="center">{{$v_man->email}}</td>
								
								

								<td class="center">
									<a class="btn btn-danger" 
									href="{{URL::to('/delete-delivery/'.$v_man->id)}}" onclick="return confirm('Are you sure');">
										<i class="halflings-icon white trash"></i> 
									</a>

								
								</td>
							</tr>
						
						  </tbody>
						  @endforeach
					  </table>            
					</div>
			

@endsection