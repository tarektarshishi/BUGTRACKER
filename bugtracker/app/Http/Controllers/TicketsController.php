<?php


namespace App\Http\Controllers;


use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use DB;



class TicketsController extends Controller
{ 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
         $this->middleware('permission:ticket-list');
         $this->middleware('permission:ticket-create', ['only' => ['create','store']]);
         $this->middleware('permission:ticket-edit', ['only' => ['edit','update']]);
         $this->middleware('permission:ticket-delete', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //all tickets for the admin
        $ticketsall = Ticket::latest()->paginate(5);
        //ticket for only project members 
       // $tickets=Ticket::latest()->paginate(5);
       $users=auth()->user();
       $tickets=DB::table('tickets')->join('members','members.projectid','=','tickets.projectid')->where('members.modelid', '=', $users->id)->latest()->paginate(5);
       return view('tickets.index',compact('ticketsall','tickets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //$projects= Project::get()->pluck('ProjectName', 'ProjectName');
        $users=auth()->user();
        $projects=DB::table('projects')->join('members','members.projectid','=','projects.id')->where('members.modelid', '=', $users->id)->get()->pluck('ProjectName','ProjectName');
        if($projects->isEmpty()){
            return redirect()->action([ProjectsController::class,'index'])
             ->with('fail','ask your admin to add you to a project');
        }else{
    
     return view('tickets.create',compact('projects'));
    }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'Bugname' => 'required',
            'Priority' => 'required',
            'Description' => 'required',
            'status',
            'solution',
            'projectid'=>'required',
            'submittedby',
            'assignedto',
        ]);
       
            //conversion of project name to project id
            $PrnameTOPrid=DB::table('projects')
                ->where('ProjectName', '=', $request->projectid)
                ->first('id'); 
            //get project admin to assign to
            $Pradmin=DB::table('projects')
            ->where('ProjectName', '=', $request->projectid)
            ->first('createdby');   

            
            $ticket=new Ticket();
            $ticket->Bugname=$request->Bugname;
            $ticket->Priority=$request->Priority;
            $ticket->Description=$request->Description;
            $ticket->status=$request->status;
            $ticket->solution=$request->solution;
            $ticket->projectid=$PrnameTOPrid->id;
            $ticket->submittedby=$request->submittedby;
            $ticket->assignedto=$Pradmin->createdby;
            $ticket->save();
         

       // Ticket::create($request->all());


        return redirect()->route('tickets.index')
                        ->with('success','ticket created successfully.');
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        return view('tickets.show',compact('ticket'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {

        $users= User::role('developer')->join('members','members.modelid','=','users.id')->where('members.projectid','=',$ticket->projectid)->get()->pluck('name','name');
        return view('tickets.edit',compact('ticket','users'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket)
    {
         request()->validate([
            'Bugname' => 'required',
            'Priority' => 'required',
            'Description' => 'required',
            'status',
            'solution',
            'submittedby',
            'assignedto'
        ]);
       
       
   //conversion of assignedto name to id 
   if(!is_null($request->assignedto)){
   $nameToid=DB::table('users')
   ->where('name', '=', $request->assignedto)
   ->first('id'); 
   }
        
        

        $ticket->Bugname=$request->Bugname;
        $ticket->Priority=$request->Priority;
        $ticket->Description=$request->Description;
        $ticket->status=$request->status;
        $ticket->solution=$request->solution;
        if(!is_null($request->assignedto)){
        $ticket->assignedto=$nameToid->id;
        }
        $ticket->save();
      //  $ticket->update($request->all());


        return redirect()->route('tickets.index')
                        ->with('success','ticket updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();


        return redirect()->route('tickets.index')
                        ->with('success','ticket deleted successfully');
    }
}