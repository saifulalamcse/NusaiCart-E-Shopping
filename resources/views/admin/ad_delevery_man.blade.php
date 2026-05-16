@extends('admin_layout')
@section('admin_content')

			<ul class="breadcrumb">
				<li>
					<i class="icon-home"></i>
					<a href="index.html">Home</a>
					<i class="icon-angle-right"></i> 
				</li>
				<li>
					<i class="icon-edit"></i>
					<a href="#">Add Category</a>
				</li>
			</ul>
			
			<div class="row-fluid sortable">
				<div class="box span12">
					<div class="box-header" data-original-title>
						<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Delivery man</h2>	
					</div>
					 
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

					<div class="box-content">
						<form class="form-horizontal" action="{{ url('/save-deliver') }}" 
						method="post">
						
							{{ csrf_field() }}
						  <fieldset>
							<div class="control-group">
							  <label class="control-label" for="date01">Name</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="name" required="">
							  </div>
							</div>

							         
							<div class="control-group">
							  <label class="control-label" for="date01">Mobile</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="mobile" required="">
							  </div>
							</div>

							<div class="control-group">
							  <label class="control-label" for="date01">Email</label>
							  <div class="controls">
								<input type="text" class="input-xlarge" name="email" required="">
							  </div>
							</div>

							<div class="form-actions">
							  <button type="submit" class="btn btn-primary">Done</button>
							  <button type="reset" class="btn">Cancel</button>
							</div>
						  </fieldset>
						</form>   

					</div>
				</div><!--/span-->

			</div><!--/row-->


@endsection
