
@extends('layout.main')

@section('content')



<div class="page-wrapper">
<div class="content container-fluid">

<div class="page-header mt-5">
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
<div class="card">
<div class="card-header">
<h4 class="card-title " style="display:inline !important;">
    <a href="{{route('admin.savequestion')}}" class="btn btn-info mb-5"> Add a Question </a>
</h4>
<h4 class="card-title " style="display:inline !important;">
    <a href="{{route('admin.importviafile')}}" class="btn btn-info mb-5">  Import Via File </a>
</h4>

<h4 class="card-title">All Questions </h4>

</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th>Question</th>
<th>F.Answer</th>
 <th>S.Answer</th>
 <th>T.Answer</th>
 <th>F.Answer</th>
 <th>Final.Answer</th>
 <th>Categori</th>
 <th>Action</th>
</tr>
</thead>
<tbody>
    @foreach($Questions as $Question)
<tr>
<td>{{$Question->question}}</td>
<td>{{$Question->answerone}}</td>
<td>{{$Question->answertow}}</td>
<td>{{$Question->answerthree}}</td>
<td>{{$Question->answerfour}}</td>
<td><a class="btn btn-primary" data-cfemail="d2b8bdbabc92b7aab3bfa2beb7fcb1bdbf"> {{$Question->finalanswer}} </a></td>
<td>{{$Question->name}}</td>
<td class="d-flex">
    <a href="{{ route('admin.editquestion' , Crypt::encryptString($Question->question_id))}}" class="btn btn-success mr-2" data-cfemail="d2b8bdbabc92b7aab3bfa2beb7fcb1bdbf">Edit</a>
    <a href="{{ route('admin.deletequestion' , Crypt::encryptString($Question->question_id))}}" class="btn btn-danger" data-cfemail="d2b8bdbabc92b7aab3bfa2beb7fcb1bdbf">Delete</a>

</td>

</tr>
@endforeach
 
 
</tbody>
</table>
</div>
</div>
</div>
</div>
</div>
</div>
</div>
</div>

</div>
@endsection