@extends('layouts.app')


@section('content')
<?php
use App\Models\Project;
?>
@can('ticket-create')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add New ticket</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tickets.index') }}"> Back</a>
            </div>
        </div>
    </div>


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
    <?php
    $status=array("NEW"=>"NEW","child"=>"child","parent"=>"parent");
    
    
    $Priority=array("HIGH"=>"HIGH","MEDIUM"=>"MEDIUM","LOW"=>"LOW");
   
    ?>
    <?php
    $user= auth()->user();
    
    ?>
        {!! Form::open(array('route' => 'tickets.store','method'=>'POST')) !!}
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
            {!! Form::select('Priority',[null=>'please select'] + $Priority,'please select', ['class' => 'form-control']) !!}
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
            {!! Form::select('status', [null=>'please select'] + $status,'please select', ['class' => 'form-control']) !!}
                </div>
            </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Project:</strong>
            {!! Form::select('projectid',$projects,[],array('class' => 'form-control','multiple')) !!}
                </div>
            </div>
           
            <input type="hidden" value="{{$user->id}}" name="submittedby" />
        
		    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
		            <button type="submit" class="btn btn-primary">Submit</button>
		    </div>
		</div>


        {!! Form::close() !!}

    
@endcan
@endsection