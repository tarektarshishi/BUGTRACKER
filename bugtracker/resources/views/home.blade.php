@extends('layouts.app')

@section('content')
<?php 
use App\Models\Project;
$user=Auth()->user();
?>
@can('user-create')
<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Projects</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>{{$adminnbprojects}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-project-diagram fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Solved Tickets</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>{{$adminnbsolvedticket}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-check fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-danger py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span style="color: rgb(28,45,200);"><strong>in progress</strong>&nbsp;Tickets</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>{{$adminnbinprogressticket}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-clock fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-warning py-2">
                                <div class="card-body" style="color: var(--indigo);">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>New Tickets</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>{{$adminnbnewticket}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-search fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                         <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">HIGH Priority tickets Per Day </h6>
                                </div>
                                <div class="card-body">
                                {!! $chartjs->render() !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Projects</h6>
                                </div>
                                <div class="card-body">
                                @if(!is_null($project))
                                    @foreach($project as $projects)
                                    <h4 class="small font-weight-bold">{{Project::find($projects->id)->ProjectName}}<span class="float-right"></span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only"></span></div>
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <div class="row">
                         <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Tickets Per User </h6>
                                </div>
                                <div class="card-body">
                                {!! $charttwo->render() !!}
                                </div>
                            </div>
                        </div>
@endcan

@can('ticket-create')


<div class="container-fluid">
                    <div class="d-sm-flex justify-content-between align-items-center mb-4">
                        <h3 class="text-dark mb-0">Dashboard</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-primary py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-primary font-weight-bold text-xs mb-1"><span>Projects</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>{{$projectnum}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-project-diagram fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-success py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span>Solved Tickets</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>{{$solved}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-check fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-danger py-2">
                                <div class="card-body">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-success font-weight-bold text-xs mb-1"><span style="color: rgb(28,45,200);"><strong>in progress</strong>&nbsp;Tickets</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>{{$inprogress}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="far fa-clock fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3 mb-4">
                            <div class="card shadow border-left-warning py-2">
                                <div class="card-body" style="color: var(--indigo);">
                                    <div class="row align-items-center no-gutters">
                                        <div class="col mr-2">
                                            <div class="text-uppercase text-warning font-weight-bold text-xs mb-1"><span>New Tickets</span></div>
                                            <div class="text-dark font-weight-bold h5 mb-0"><span>{{$mytickets}}</span></div>
                                        </div>
                                        <div class="col-auto"><i class="fas fa-search fa-2x text-gray-300"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                         <div class="col-lg-7 col-xl-8">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                @if($user->hasRole('developer'))
                                    <h6 class="text-primary font-weight-bold m-0">Tickets Assigned to me</h6>
                                </div>
                                <div class="card-body">
                                
                                
<div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
  <table class="table my-0" id="dataTable">
  <thead>
        <tr>
            <th>Ticket Name</th>
            <th>Priority</th>
        </tr>
    </thead>
    <tbody>
	    @foreach ($tickets as $ticket)
	    <tr>
	        <td>{{ $ticket->Bugname }}</td>
	        <td> <label class="badge badge-primary">{{ $ticket->Priority }}</label></td>
	    </tr>
	    @endforeach
    </tbody>
</table>
</div>
                                @endif
                                @if($user->hasRole('tester'))
                                <h6 class="text-primary font-weight-bold m-0">HIGH priority tickets by me</h6>
                                </div>
                                <div class="card-body">
                                {!! $charttester->render() !!}
        
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-4">
                            <div class="card shadow mb-4">
                                <div class="card-header d-flex justify-content-between align-items-center">
                                    <h6 class="text-primary font-weight-bold m-0">Projects</h6>
                                </div>
                                <div class="card-body">
                                @if(!is_null($projectlist))
                                    @foreach($projectlist as $projects)
                                    <h4 class="small font-weight-bold">{{Project::find($projects->projectid)->ProjectName}}<span class="float-right"></span></h4>
                                    <div class="progress progress-sm mb-3">
                                        <div class="progress-bar bg-danger" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"><span class="sr-only"></span></div>
                                    </div>
                                    @endforeach
                                @endif
                                </div>
                            </div>
                        </div>
                        
                    </div>
@endcan

@endsection
