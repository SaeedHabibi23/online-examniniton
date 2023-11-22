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
                    <form action="{{route('admin.storeeditquestion')}}" method="post" enctype="multipart/form-data">
                                          @csrf
                    <input type="hidden" name="question_id" value="{{$data['questionsedit']->question_id}}">
							<div class="row formtype">
							
								<div class="col-md-12">
									<div class="form-group">
										<label>Question</label>
										<div class="cal-icon">
											<input type="text" name="question" class="form-control"
                                            value="{{$data['questionsedit']->question}}"> </div>
									</div>
								</div>
                                
                                <div class="col-md-6">
									<div class="form-group">
										<label>Final Answer</label>
										<div class="cal-icon">
                                        <select name="categori" id="" class="form-control">
                                        @foreach($data['categories'] as $categories)
                                            <option  @if($data['questionsedit']->cat_id == $categories->cat_id) selected @endif
                                            value="{{$categories->cat_id}}">{{$categories->name}}</option>
                                            @endforeach
                                        </select>
									</div>
								</div>
                            </div>
								<div class="col-md-6">
									<div class="form-group">
										<label>First Answer</label>
										<div class="cal-icon">
											<input type="text" name="answerone" value="{{$data['questionsedit']->answerone}}"
                                            class="form-control datetimepicker"> </div>
									</div>
								</div>

						
                                <div class="col-md-6">
									<div class="form-group">
										<label>Second Answer</label>
										<div class="cal-icon">
											<input type="text"  value="{{$data['questionsedit']->answertow}}"
                                            name="answertwo" class="form-control datetimepicker"> </div>
									</div>
								</div>

                                <div class="col-md-6">
									<div class="form-group">
										<label>Third Answer</label>
										<div class="cal-icon">
											<input type="text" value="{{$data['questionsedit']->answerthree}}"
                                             name="answerthree" class="form-control datetimepicker"> </div>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Forth Answer</label>
										<div class="cal-icon">
											<input type="text" value="{{$data['questionsedit']->answerfour}}"
                                             name="answerforth" class="form-control datetimepicker"> </div>
									</div>
								</div>
                                <div class="col-md-6">
									<div class="form-group">
										<label>Final Answer</label>
										<div class="cal-icon">
                                            <select id="" class="form-control" name="finalanswer">
                                            <option value="1"   {{$data['questionsedit']->finalanswer =="1" ? 'selected' : ''}} >1</option>
                                            <option value="2"  {{$data['questionsedit']->finalanswer =="2" ? 'selected' : ''}} >2</option>
                                            <option value="3"   {{$data['questionsedit']->finalanswer =="3" ? 'selected' : ''}} >3</option>
                                            <option value="4"  {{$data['questionsedit']->finalanswer =="4" ? 'selected' : ''}} >4</option>
                                            </select>
									</div>
								</div>
                              
                           
							
							</div>
                            <input type="submit" class="btn buttonedit mt-4" title="اضافه کردن نمایندگی" style="background-color: #0D5C75; color: white;" value="Edit Question">
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

    @endsection