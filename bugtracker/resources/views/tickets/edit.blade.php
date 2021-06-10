@extends('layouts.app')


@section('content')
@can('ticket-edit')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit ticket</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <?php
    $status=array("NEW"=>"NEW","INPROGRESS"=>"INPROGRESS","child"=>"child","parent"=>"parent","SOLVED"=>"SOLVED");
    
    
    $Priority=array("HIGH"=>"HIGH","MEDIUM"=>"MEDIUM","LOW"=>"LOW");
   
    ?>
    <?php
    $user= auth()->user();
    ?>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    {!! Form::model($ticket, ['method' => 'PATCH','route' => ['tickets.update', $ticket->id]]) !!}
    	@csrf
         <div class="row">
		    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Ticket Name:</strong>
                    {!! Form::text('Bugname', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
		        </div>
		    </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Priority:</strong>
            {!! Form::select('Priority', [null=>'please select'] + $Priority,$ticket->Priority, ['class' => 'form-control']) !!}
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Description:</strong>
                    {!! Form::text('Description', null, array('placeholder' => 'Description','class' => 'form-control')) !!}
		        </div>
		    </div>
		    <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status:</strong>
            {!! Form::select('status',[null=>'please select'] + $status,$ticket->status, ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Solution:</strong>
                    {!! Form::text('solution', null, array('placeholder' => 'Solution','class' => 'form-control')) !!}
		        </div>
		    </div>
            
            @can('user-create')
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>assign to:</strong>
            {!! Form::select('assignedto',$users,null, ['class' => 'form-control']) !!}
                </div>
            </div>
            @endcan
            
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


        {!! Form::close() !!}
@endcan
@endsection