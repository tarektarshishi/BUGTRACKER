<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ProjectMember;
use App\Models\Member;
use App\Models\Project;
use App\Models\Profile;
use DB;

class MembersController extends Controller
{
    
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = Member::all()->toArray();die();
        return view('members.index',compact('member'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function create(Project $project,$id )
    {
        var_dump($id);die();
        $members =User::where('id', '!=', auth()->id())->get();
        // User::get()->pluck('id','id');
        return view('members.create',compact('members','project'));

    }

    

    public function addMember($id)
    {

        $members =User::get();
        // User::get()->pluck('id','id');
        return view('members.create',compact('members','id'));
    }

    public function viewMember($id){
        $member = Member::where('projectid','=',$id)->get();
        return view('members.index',compact('member'));
    }

    public function viewProfile($id){
        $profile=Profile::where('user_id',$id)->first();
        $project=DB::table('members')->where('modelid', '=', $id)->get();
        $name=User::where('id',$id)->first();
       return view('profiles.index',compact('profile','project','name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'projectid' => 'required',
           'modelid' => 'required',
        ]);
        $input = $request->all();
        $input['modelid'] = $request->input('modelid');
        //Member::insert($input);


     $users = [];

        $modelid = $request->input('modelid');
        $projectid = $request->input('projectid');
      
        foreach ($modelid as $model) {
            $test=Member::where('modelid','=',$model)->where('projectid','=',$projectid)->first();

            if(is_null($test)){
                array_push($users, [
                    'projectid' => $projectid,
                    'modelid' => $model,
                ]);
            }else{
                return redirect()->action([ProjectsController::class,'index'])
                    ->with('fail','members already exist');
            }
        }
        //var_dump($users);
        Member::insert($users);
        return redirect()->action([ProjectsController::class,'index'])
                       ->with('success','members added successfully');
    }

    public function removeMember($projectid, $modelid){
       // DB::delete('DELETE FROM members WHERE modelid = ?'[$modelid] ' AND projectid = ?' [$projectid]);
        Member::where('modelid','=', $modelid)->where('projectid','=',$projectid)->delete(); 
       return redirect()->route('viewMember', ['id' => $projectid])
       ->with('success','member removed');
    }

    /**
     * Display the specified resource.f
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Project $project)
    {
        $member = Member::all()->toArray();die();
        
        return view('members.show',compact('members','project'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $users =User::where('id', '!=', auth()->id())->get();
        
        $project = Project::find($id);
        $members = User::get();
        $membersexist = DB::table("members")->where("projectid",$id)
            ->pluck('modelid','modelid')
            ->all();
        return view('members.edit',compact('project','user','members'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

}
