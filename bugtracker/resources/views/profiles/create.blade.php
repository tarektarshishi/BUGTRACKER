@extends('layouts.app')


@section('content')
@can('user-create')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>create Profile</h2>
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
    
{!! Form::open(array('route' => 'profiles.store','method'=>'POST','files' => true)) !!}
<input type="hidden" value="{{$id}}" name="user_id" />
    <div class="col-xs-12 col-sm-12 col-md-12">
        <label for="exampleFormControlFile1">Select Profile Picture</label>
        <input type="file" class="form-control-file" name="image">
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Nationality:</strong>
                    {!! Form::text('Nationality', null, array('placeholder' => 'Nationality','class' => 'form-control')) !!}
		        </div>
		</div>
        <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>city:</strong>
                    {!! Form::text('city', null, array('placeholder' => 'city','class' => 'form-control')) !!}
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Area:</strong>
                    {!! Form::text('Area', null, array('placeholder' => 'Area','class' => 'form-control')) !!}
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>street:</strong>
                    {!! Form::text('street', null, array('placeholder' => 'street','class' => 'form-control')) !!}
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>Building:</strong>
                    {!! Form::text('Building', null, array('placeholder' => 'Building','class' => 'form-control')) !!}
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>floor:</strong>
                    {!! Form::text('floor', null, array('placeholder' => 'floor','class' => 'form-control')) !!}
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>mobile number:</strong>
                    {!! Form::number('mobile', null, array('placeholder' => '76123456','class' => 'form-control')) !!}
		        </div>
		    </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
		        <div class="form-group">
		            <strong>phone number:</strong>
                    {!! Form::number('phone', null, array('placeholder' => '08123456','class' => 'form-control')) !!}
		        </div>
		    </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
</div>
{!! Form::close() !!}
@endcan
@endsection