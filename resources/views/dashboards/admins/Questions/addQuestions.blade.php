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
                    <form action="{{route('admin.storequestions')}}" method="post" enctype="multipart/form-data">
                                          @csrf
							<div class="row formtype">
							
								<div class="col-md-12">
									<div class="form-group">
										<label>Question</label>
										<div class="cal-icon">
											<input type="text" name="question" class="form-control"> </div>
									</div>
								</div>
                                
                                <div class="col-md-6">
									<div class="form-group">
										<label>Final Answer</label>
										<div class="cal-icon">
                                            <select name="cat_name" id="" class="form-control">
                                            @foreach($categories as $categorie)
                                            <option class="form-control" value="{{$categorie->cat_id}}">{{$categorie->name}}</option>
                                            @endforeach
                                            </select>
									</div>
								</div>
                            </div>
								<div class="col-md-6">
									<div class="form-group">
										<label>First Answer</label>
										<div class="cal-icon">
											<input type="text" name="answerone" class="form-control datetimepicker"> </div>
									</div>
								</div>

						
                                <div class="col-md-6">
									<div class="form-group">
										<label>Second Answer</label>
										<div class="cal-icon">
											<input type="text" name="answertwo" class="form-control datetimepicker"> </div>
									</div>
								</div>

                                <div class="col-md-6">
									<div class="form-group">
										<label>Third Answer</label>
										<div class="cal-icon">
											<input type="text" name="answerthree" class="form-control datetimepicker"> </div>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Forth Answer</label>
										<div class="cal-icon">
											<input type="text" name="answerforth" class="form-control datetimepicker"> </div>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Final Answer</label>
										<div class="cal-icon">
                                            <select name="finalanswer" id="" class="form-control">
                                            <option class="form-control" value="1">1</option>
                                              <option class="form-control" value="2">2</option>
                                              <option class="form-control" value="3">3</option>
                                              <option class="form-control" value="4">4</option>

                                            </select>
									</div>
								</div>
                              
                           
							
							</div>
                            <input type="submit" class="btn buttonedit mt-4" title="اضافه کردن نمایندگی" style="background-color: #0D5C75; color: white;" value="Add Question">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    @endsection