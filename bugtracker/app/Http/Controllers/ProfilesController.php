<?php

namespace App\Http\Controllers;
use App\Models\Profile;
use App\Models\User;
use App\Models\Member;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use DB;



class ProfilesController extends Controller
{
   
        public function index(){
            
            $user=auth()->user()->id;
            $users=auth()->user();
           $profile=Profile::where('user_id',$user)->first();
          $project=DB::table('members')->where('modelid', '=', $users->id)->get();
          $name=User::where('id',$user)->first();
          return view('profiles.index',compact('profile','project','name'));
         
          
           // if(is_null($profile)){
             //   return view('profiles.create');
            //}else{
              //  return view('profiles.index',compact('profile'));
            //}
        }
        
        public function store(Request $request){
            request()->validate([
                'user_id' => 'required',
                'image' => 'required',
                'Nationality' ,
                'city',
                'Area',
                'street',
                'Building',
                'floor',
                'mobile',
                'phone'
            ]);
            //$imageName = time().'.'.$request->image->extension();  
            // $request->image->move(public_path('storage'), $imageName);
            
            $imageName=$request->file('image');
          //  var_dump($cover);
            
           $extension=$imageName->getClientOriginalExtension();

          $nextid = Profile::count()+1;
          $time =time();
          Storage::disk('public')->put($time.'-'.$request->user_id.'.'.$extension,File::get($imageName));
            $profile=new Profile();
            $profile->user_id =$request->user_id;
            $profile->image =$time.'-'.$request->user_id.'.'.$extension;
            $profile->Nationality =$request->Nationality;
            $profile->city =$request->city;
            $profile->Area =$request->Area;
            $profile->street =$request->street;
            $profile->Building =$request->Building;
            $profile->floor =$request->floor;
            $profile->mobile =$request->mobile;
            $profile->phone =$request->phone;
            $profile->save();
            //$Profilecheck=Profile::create($request->all());
    
    
            return redirect()->route('users.index')
                            ->with('success','profile created successfully.');
        }
        public function update(Request $request, Profile $profile)
    {
      if($request->hasFile('image')){
       $imageName=$request->file('image');
          //  var_dump($cover);
            
           $extension=$imageName->getClientOriginalExtension();

          $nextid = Profile::count()+1;
          $time =time();
          Storage::disk('public')->put($time.'-'.$request->user_id.'.'.$extension,File::get($imageName));
          $profile->image =$time.'-'.$request->user_id.'.'.$extension;
          $profile->save();
        }
        else{
        $profile->update($request->all());
        }
        return redirect()->route('profiles.index')
                        ->with('success','profile updated successfully');
    }

        public function createProfile($id){
            return view('profiles.create',compact('id'));
        }

        public function changePicture($id)
        {
        return view('profiles.profilePicture',compact('id'));
        }
}
