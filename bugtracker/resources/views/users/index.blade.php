@extends('layouts.app')


@section('content')
<div class="container-fluid">
<div class="card shadow">
<div class="card-header py-3">
<div class="pull-left">
     <p class="text-primary m-0 font-weight-bold">Users Management</p>
     </div>
     <div class="pull-right">
        @can('user-create')
            <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
            @endcan
            @can('role-create')
            <a class="btn btn-success" href="{{ route('roles.index') }}"> edit roles</a>
            @endcan
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
   <th>No</th>
   <th>Name</th>
   <th>Email</th>
   <th>Roles</th>
   <th width="280px">Action</th>
 </tr>
 </thead>
 <tbody>
 @foreach ($data as $key => $user)
  <tr>
    <td>{{ $user->id }}</td>
    <td>{{ $user->name }}</td>
    <td>{{ $user->email }}</td>
    <td>
      @if(!empty($user->getRoleNames()))
        @foreach($user->getRoleNames() as $v)
           <label class="badge badge-success">{{ $v }}</label>
        @endforeach
      @endif
    </td>
    <td>
       <a class="btn btn-info" href="{{ route('viewProfile',$user->id) }}">Show</a>
       @can('user-edit')
       <a class="btn btn-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
       @endcan
       @can('user-delete')
        {!! Form::open(['method' => 'DELETE','route' => ['users.destroy', $user->id],'style'=>'display:inline']) !!}
            {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
        {!! Form::close() !!}
        @endcan
    </td>
  </tr>
  </tbody>
 @endforeach
</table>
</div>
</div>

{!! $data->render() !!}


@endsection