@extends('layouts.app')


@section('content')
<?php
use App\Models\Project;
?>

<div class="container-fluid">
                    <h3 class="text-dark mb-4">{{$name->name}}</h3>
                    <div class="row mb-3">
                        <div class="col-lg-4">
                            <div class="card mb-3">
                                <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="{{ asset('storage/'.$profile->image)}}" width="160" height="160">
                                      
     
{!! Form::model($profile, ['method' => 'PATCH','route' => ['profiles.update', $profile->id],'files' => true]) !!}
        <div class="mb-3">
        <div class="form-group">
            <input type="file" name="image" class="form-control" id="image">
            <span class="text-danger" id="image-input-error"></span>
        </div>

        <div class="form-group">
          <button type="submit" class="btn btn-success">Upload</button>
        </div>
        </div>
        {!! Form::close() !!}
                                </div>
                            </div>
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="text-primary font-weight-bold m-0">Projects</h6>
                                </div>
                                <div class="card-body">
                                
                                
                                @if(!is_null($project))
                                    @foreach($project as $projects)
                                    <h4 class="small font-weight-bold">{{Project::find($projects->projectid)->ProjectName}}<span class="float-right"></span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only"></span></div>
                                    </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        </div>
                        <div class="col-lg-8">
                            <div class="row mb-3 d-none">
                                <div class="col">
                                    <div class="card text-white bg-primary shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="card text-white bg-success shadow">
                                        <div class="card-body">
                                            <div class="row mb-2">
                                                <div class="col">
                                                    <p class="m-0">Peformance</p>
                                                    <p class="m-0"><strong>65.2%</strong></p>
                                                </div>
                                                <div class="col-auto"><i class="fas fa-rocket fa-2x"></i></div>
                                            </div>
                                            <p class="text-white-50 small m-0"><i class="fas fa-arrow-up"></i>&nbsp;5% since last month</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="card shadow mb-3">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">User Info</p>
                                        </div>
                                        
    {!! Form::model($profile, ['method' => 'PATCH','route' => ['profiles.update', $profile->id]]) !!}
    	@csrf
                                        <div class="card-body">
                                            <form>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="username"><strong>Nationality</strong></label><input class="form-control" type="text" value="{{$profile->Nationality}}" name="Nationality"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="email"><strong>city</strong></label><input class="form-control" type="text" value="{{$profile->city}}" name="city"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="first_name"><strong>Area</strong></label><input class="form-control" type="text" value="{{$profile->Area}}" name="Area"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>street</strong></label><input class="form-control" type="text" value="{{$profile->street}}" name="street"></div>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                     <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>Building</strong></label><input class="form-control" type="text" value="{{$profile->Building}}" name="Building"></div>
                                                    </div>
                                                    <div class="col">
                                                        <div class="form-group"><label for="last_name"><strong>floor</strong></label><input class="form-control" type="text" value="{{$profile->floor}}" name="floor"></div>
                                                    </div>
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                    {!! Form::model($profile, ['method' => 'PATCH','route' => ['profiles.update', $profile->id]]) !!}
    	@csrf
                                    <div class="card shadow">
                                        <div class="card-header py-3">
                                            <p class="text-primary m-0 font-weight-bold">Contact Info</p>
                                        </div>
                                        <div class="card-body">
                                            <form>
                                                <div class="form-group"><label for="address"><strong>Mobile Number</strong></label><input class="form-control" type="text"  value="{{$profile->mobile}}" name="mobile"></div>
                                                <div class="form-row">
                                                    <div class="col">
                                                        <div class="form-group"><label for="city"><strong>Phone Number</strong></label><input class="form-control" type="text"  value="{{$profile->phone}}" name="phone"></div>
                                                    </div>
                                                    
                                                </div>
                                                <div class="form-group"><button class="btn btn-primary btn-sm" type="submit">Save&nbsp;Settings</button></div>
                                            </form>
                                        </div>
                                    </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
               
                </div>
            </div>
          
@endsection