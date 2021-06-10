@extends('layouts.app')


@section('content')
<?php
use App\Models\User;
use App\Models\Project;

?>
@can('ticket-list')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show ticket</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Back</a>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ticket Name:</strong>
                {{ $ticket->Bugname }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Priority:</strong>
                <span class="badge badge-primary">
                {{ $ticket->Priority }}
                </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Description:</strong>
                {{ $ticket->Description }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>AssignedTo:</strong>
                <span class="badge badge-info">
                {{ USER::find( $ticket->assignedto)->name }}
                </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                <span class="badge badge-danger">
                {{ $ticket->status }}
                </span>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Solution:</strong>
                {{ $ticket->solution }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Submitted By:</strong>
                {{ USER::find( $ticket->submittedby)->name }}
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>ProjectName:</strong>
                {{ Project::find($ticket->projectid)->ProjectName }}
            </div>
        </div>
    </div>
@endcan

@endsection