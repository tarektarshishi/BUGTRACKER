@extends('layouts.app')


@section('content')
<?php
use App\Models\User;
use App\Models\Project;
$user= auth()->user();
?>
@can('ticket-list')

<div class="container-fluid">
<div class="card shadow">
<div class="card-header py-3">
    <div class="pull-left">
     <p class="text-primary m-0 font-weight-bold">tickets</p>
     </div>
            
            <div class="pull-right">
                @can('ticket-create')
                <a class="btn btn-success" href="{{ route('tickets.create') }}"> Create New ticket</a>
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
    @can('user-create')
    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
  <table class="table my-0" id="dataTable">
     <thead>
        <tr>
            <th>ID</th>
            <th>Ticket Name</th>
            <th>Project Name</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Assigned to</th>
            <th>Submitted by</th>
            <th width="500">Action</th>
        </tr>
    </thead>
    <tbody>
	    @foreach ($ticketsall as $ticket)
	    <tr>
	        <td>{{ $ticket->id }}</td>
	        <td>{{ $ticket->Bugname }}</td>
            <td>{{ Project::find($ticket->projectid)->ProjectName }}</td>
	        <td> <label class="badge badge-primary">{{ $ticket->Priority }}</label></td>
	        <td> <label class="badge badge-danger">{{ $ticket->status }}</label></td>
            <td><span class="badge badge-success">{{ USER::find( $ticket->assignedto)->name }}</span></td>
            <td>{{ USER::find( $ticket->submittedby)->name }}</td>
	        <td width="500">
                <form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">
                    <div class="links">
                    <a class="btn btn-info" href="{{ route('tickets.show',$ticket->id) }}">Show</a>
                    @can('ticket-edit')
                    @if($user->id==$ticket->assignedto)
                    <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edit</a>
                    @else
                    @can('user-edit')
                    <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edit</a>
                    @endcan
                    @endif
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('ticket-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                    </div>
                </form>
	        </td>
	    </tr>
	    @endforeach
        </tbody>
    </table>
</div>
    @endcan
    @can('ticket-create')
     
<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
  <table class="table my-0" id="dataTable">
  <thead>
        <tr>
            <th>ID</th>
            <th>Ticket Name</th>
            <th>Project Name</th>
            <th>Priority</th>
            <th>Status</th>
            <th>Assigned to</th>
            <th>Submitted by</th>
            <th width="500">Action</th>
        </tr>
    </thead>
    <tbody>
	    @foreach ($tickets as $ticket)
	    <tr>
	        <td>{{ $ticket->id }}</td>
	        <td>{{ $ticket->Bugname }}</td>
            <td>{{ Project::find($ticket->projectid)->ProjectName }}</td>
	        <td> <label class="badge badge-primary">{{ $ticket->Priority }}</label></td>
	        <td> <label class="badge badge-danger">{{ $ticket->status }}</label></td>
            <td><span class="badge badge-success">{{ USER::find( $ticket->assignedto)->name }}</span></td>
            <td>{{ USER::find( $ticket->submittedby)->name }}</td>
	        <td width="500">
                <form action="{{ route('tickets.destroy',$ticket->id) }}" method="POST">
                    <div class="links">
                    <a class="btn btn-info" href="{{ route('tickets.show',$ticket->id) }}">Show</a>
                    @can('ticket-edit')
                    @if($user->id==$ticket->assignedto)
                    <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edit</a>
                    @else
                    @can('user-edit')
                    <a class="btn btn-primary" href="{{ route('tickets.edit',$ticket->id) }}">Edit</a>
                    @endcan
                    @endif
                    @endcan
                    @csrf
                    @method('DELETE')
                    @can('ticket-delete')
                    <button type="submit" class="btn btn-danger">Delete</button>
                    @endcan
                    </div>
                </form>
	        </td>
	    </tr>
	    @endforeach
    </tbody>
</table>
</div>
    
    @endcan
    {!! $ticketsall->links() !!}
    @endcan


@endsection