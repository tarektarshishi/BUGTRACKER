@extends('layouts.app')


@section('content')
<?php
use App\Models\USER;
?>


<div class="container-fluid">
<div class="card shadow">
<div class="card-header py-3">
<div class="pull-left">
     <p class="text-primary m-0 font-weight-bold">Members Management</p>
     </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif


<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
  <table class="table my-0" id="dataTable">
     <thead>
        <tr>
            <th>members</th>
            <th>action</th>
        </tr>
        </thead>
        <tbody>
	    @foreach ($member as $member)
	    <tr>
	        <td>{{ USER::find($member->modelid)->name }}</td>
            <td><a class="btn btn-info" href="{{ route('viewProfile',$member->modelid) }}">Show</a>
            <a class="btn btn-danger" href="{{ route('removeMember',['projectid'=>$member->projectid,'modelid'=>$member->modelid]) }}">Delete</a></td>
	    </tr>
	    @endforeach
        </tbody>
    </table>
    </div>
    </div>
@endsection