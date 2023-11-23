
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
<h4 class="card-title">
</h4>
<h4 class="card-title">All Categories</h4>

</div>
<div class="card-body">
<div class="table-responsive">
<table class="table table-striped mb-0">
<thead>
<tr>
<th>Name</th>
<th>email</th>
<th>Correct Answer</th>
<th>Incorrect Answer</th>

</tr>
</thead>
<tbody>
    @foreach($Result as $Resul)
<tr>
<td>{{$Resul->name}}</td>
<td>{{$Resul->email}}</td>
<td>{{$Resul->correctanswer}}</td>
<td>{{$Resul->incorrectanswer}}</td>


</tr>
@endforeach
 
 
</tbody>
</table>
{{$Result->links()}}
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