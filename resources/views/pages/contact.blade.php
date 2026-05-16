@extends('welcome')
@section('content')

	
	<div>
		<h3>{{__('home.problem_menu')}}</h3>
		<h4>{{__('home.admi_menu')}}</h4>
		<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
				  	  <th>SL:</th>
					  <th>Admin Name:</th>
					  <th>Admin Mobile</th>
					  <th>Admin Email</th>
				  </tr>
			  </thead>   
			    <tbody>
				<tr>
					<td>1</td>
					<td>Saiful Alam</td>
					<td>01690-262216</td>
					<td>saifulalamcse@gmail.com</td>					
			    </tr>	
			    <tr>
			    	<td>2</td>
					<td>Nusrat Jahan Muna</td>
					<td>01718-485436</td>
					<td>nusratmuna@gmail.com</td>					
			    </tr>			
						
				</tbody>
		
		</table>  
	
		
	</div>
			

	


@endsection