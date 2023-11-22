@extends('layout.main')

@section('content')


		<div class="page-wrapper">
			<div class="content container-fluid">
				<div class="page-header">
					<div class="row align-items-center">
						<div class="col">
							<h3 class="page-title mt-5">Add Leave</h3> </div>
					</div>
				</div>

                <div class="row">
              @if(session('status'))
                        <div class="alert alert-success col-12" rol="alert" id="CanceldText" style="display:flex; justify-content: space-between;">
                        {{session('status')}}
                        <button class="btn-close me-auto btn btn-danger" onclick="CancelFunction()" id="CancelAlert" type="button" data-bs-dismiss="alert"> X </button>    

                        </div>
                      
                        @elseif(session('error'))
                        <div class="alert alert-danger text-center" rol="alert">
                            {{session('error')}}
                        </div>
                        @endif
                        </div>


				<div class="row">
					<div class="col-lg-12">
                    <form action="{{route('admin.savecategory')}}" method="post" enctype="multipart/form-data">
                                          @csrf
							<div class="row formtype">
							
								<div class="col-md-6">
									<div class="form-group">
										<label>Categori Name</label>
										<div class="cal-icon">
											<input type="text" name="cat_name" class="form-control"> </div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label>Timer</label>
										<div class="cal-icon">
											<input type="number" name="Minutes" class="form-control datetimepicker"> </div>
									</div>
								</div>
						
                              
                             
                              
                           
							
							</div>
                            <input type="submit" class="btn buttonedit mt-4" title="اضافه کردن نمایندگی" style="background-color: #0D5C75; color: white;" value="Add Categori">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    @endsection