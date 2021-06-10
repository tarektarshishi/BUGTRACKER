@extends('layouts.app')


@section('content')
<?php
use App\Models\User;
?>
<div class="container-fluid">
<div class="card shadow">
<div class="card-header py-3">
<div class="pull-left">
     <p class="text-primary m-0 font-weight-bold">Projects Management</p>
     </div>
     <div class="pull-right">
            @can('project-create')
            <a class="btn btn-success" href="{{ route('projects.create') }}"> Create New Project</a>
            @endcan
        </div>
</div>



@if ($message = Session::get('success'))
<div class="alert alert-success">
  <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('fail'))
<div class="alert alert-danger">
  <p>{{ $message }}</p>
</div>
@endif

@can('ticket-create')
<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
  <table class="table my-0" id="dataTable">
     <thead>
 <tr>
   <th>ID</th>
   <th>ProjectName</th>
   <th>Description</th>
   <th>Created By</th>
   
 </tr>
 </thead>
 <tbody>

 @foreach ($projects as $key => $project)
  <tr>
    <td>{{ $project->id }}</td>
    <td>{{ $project->ProjectName }}</td>
    <td>{{ $project->Description }}</td>
    <td>{{ USER::find($project->createdby)->name }} </td>
  </tr>
 @endforeach
 </tbody>
</table>
</div>
@endcan

@can('user-create')
<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
  <table class="table my-0" id="dataTable">
     <thead>
 <tr>
   <th>ID</th>
   <th>ProjectName</th>
   <th>Description</th>
   <th>Created By</th>
   <th width="280px">Action</th>
 </tr>
 </thead>
 <tbody>
@foreach ($projectsall as $key => $project)
  <tr>
    <td>{{ $project->id }}</td>
    <td>{{ $project->ProjectName }}</td>
    <td>{{ $project->Description }}</td>
    <td>{{ USER::find($project->createdby)->name }} </td>
   
    <td>
       <a class="btn btn-info" href="{{ route('projects.show',$project->id) }}">Show</a>
       @can('user-create')
       <a class="btn btn-primary" href="{{ route('addMember',$project->id) }}"> Add Members</a>
       <a class="btn btn-primary" href="{{ route('viewMember',$project->id) }}"> view Members</a>
       
       @endcan
       @can('project-edit')
       <a class="btn btn-primary" href="{{ route('projects.edit',$project->id) }}">Edit</a>
       @endcan
       @can('project-delete')
        {!! Form::open(['method' => 'DELETE','route' => ['projects.destroy', $project->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
 @endforeach
 </tbody>
</table>
</div>
</div>
@endcan



@endsection