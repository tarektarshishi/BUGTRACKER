<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Ticket;
use App\Models\Project;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //admin section
        $user=Auth()->user()->id;
         //number of projects for admin
         $adminnbprojects=Project::count();
         //number of solved tickets for admin
         $adminnbsolvedticket=Ticket::where('status','=','SOLVED')->count();
        //number of inprogress tickets for admin
        $adminnbinprogressticket=Ticket::where('status','=','INPROGRESS')->count();
        //number of new tickets for admin
        $adminnbnewticket=Ticket::where('status','=','NEW')->orwhere('status','=','child')->orwhere('status','=','parent')->count();
        
        //number of tickets sumbited
       // $userticket= User::role('developer')->role('tester');
      //  $userstickets=Ticket::where('created')
      //high tickets per date query
      $chartHIGH=DB::select(DB::raw("select COUNT(priority) as priority, date(created_at) as createdday from tickets Where priority = 'HIGH' group by date(created_at)"));
    
     //push them into an array
      
      $arrayhigh=[];$arraydata=[];
        foreach($chartHIGH as $value){
         array_push($arrayhigh, $value->priority);
         array_push($arraydata, $value->createdday);
        }
        
        $chartjs = app()->chartjs
         ->name('linechart')
         ->type('line')
         ->size(['width' => 400, 'height' => 200])
         ->labels($arraydata)
         ->datasets([
             [
                 "label" => "Number of Tickets",
                 'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                 'data' =>  $arrayhigh
             ]
         ])
         ->options([]);

         //tickets per user query
        $chartusers=DB::select(DB::raw("select count(Bugname) as ticketnum , name as username FROM tickets INNER JOIN users on tickets.submittedby= users.id group by name"));
      //  var_dump($chartusers);die();
        $arrayusers=[];$arraytickets=[];
        foreach($chartusers as $value){
         array_push($arrayusers, $value->username);
         array_push($arraytickets, $value->ticketnum);
        }
       
        $charttwo = app()->chartjs
         ->name('barchart')
         ->type('bar')
         ->size(['width' => 400, 'height' => 200])
         ->labels($arrayusers)
         ->datasets([
             [
                 "label" => "Number of Tickets",
                 'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
                 'data' => $arraytickets
             ]
         ])
         ->options([]);
         
         $project=DB::table('projects')->where('createdby', '=', $user)->get();
         //users section
        //number of new tickets in member projects
         $mytickets=DB::table('tickets')->join('members','members.projectid','=','tickets.projectid')->where('members.modelid', '=', $user)->where('tickets.status','=','NEW')->count('BugName');
        //number of inprogress tickets in member projects
         $inprogress=DB::table('tickets')->join('members','members.projectid','=','tickets.projectid')->where('members.modelid', '=', $user)->where('tickets.status','=','INPROGRESS')->count('BugName');
         //number of solved tickets in member projects
         $solved=DB::table('tickets')->join('members','members.projectid','=','tickets.projectid')->where('members.modelid', '=', $user)->where('tickets.status','=','SOLVED')->count('BugName');
         //number of projects a user is member in
         $projectnum=DB::table('members')->where('modelid', '=', $user)->count();
         $projectlist=DB::table('members')->where('modelid', '=', $user)->get();

         $tickets=DB::table('tickets')->join('members','members.projectid','=','tickets.projectid')->where('members.modelid', '=', $user)->where('assignedto','=',$user)->where('status','=','INPROGRESS')->get();
        //number of high priority tickets per day for tester
         $testerticketshigh=DB::select(DB::raw("select COUNT(priority) as priority, date(created_at) as createdday from tickets Where priority = 'HIGH' AND submittedby= '$user' group by date(created_at)"));
         //push them into an array
      
      $arraytester=[];$arraydate=[];
      foreach($testerticketshigh as $value){
       array_push($arraytester, $value->priority);
       array_push($arraydate, $value->createdday);
      }
      
      $charttester = app()->chartjs
       ->name('linechart')
       ->type('line')
       ->size(['width' => 400, 'height' => 200])
       ->labels($arraydate)
       ->datasets([
           [
               "label" => "Number of Tickets",
               'backgroundColor' => 'rgba(54, 162, 235, 0.2)',
               'data' =>  $arraytester
           ]
       ])
       ->options([]);

         return view('home',compact('adminnbprojects','adminnbsolvedticket','adminnbinprogressticket','adminnbnewticket','chartjs','charttwo','project','mytickets','inprogress','solved','projectnum','projectlist','tickets','charttester')); 
        }
}
