<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserInformation;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;

class UserInfoController extends Controller
{
    public function index(){
        $userinformations=UserInformation::orderBy('id','DESC')->paginate(5);
        return view('user.list',['userinformations'=>$userinformations]);
    }

    public function create(){
     return view('user.create');
    }

    public function store(Request $request){
    $validator=Validator::make($request->all(),[
        'first_name'=>'required|string',
        'last_name'=>'required|string',
        'email'=>'required|unique',
        'phone'=>'required|numeric|digits:10',
        'gender' => 'required|in:Male,Female,Other',
        'role' => 'required|in:Admin,User',
        'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
    ]);
     if($validator->passes()){
     //save the data
      $userinformation=new UserInformation();
      $userinformation->first_name=$request->first_name;
      $userinformation->last_name=$request->last_name;
      $userinformation->email=$request->email;
      $userinformation->phone=$request->phone;
      $userinformatation->gender=$request->gender;
      $userinformation->role=$request->role;
      $userinformation->save();

      //upload image here
    if($request->profile_picture){
      $ext=$request->profile_picture->getClientOriginalExtension();
      $file=time().'.'.$ext;
      $request->profile_picture->move(public_path().'/uploads/users/',$file);
      $user->profile_picture=$file;
      $userinformation->save();
    } 
  return redirect()->route('userinfomations.index')->with('success','User Added Successfully');

     }
     else{
        return redirect()->route('userinformations.create')->withErrors($validator)->withInput();
     }
    }

    public function edit($id)
    {
        $userinformation=UserInformation::findOrFail($id);
        return view('user.edit',['userinformation'=> $userinformation]);
    }

     public function update($id ,Request $request)
     {
             $validator=Validator::make($request->all(),[
                'first_name'=>'required',
                'last_name'=>'required',
                'email'=>'required|unique',
                'phone'=>'required|numeric|digits:10',
                'gender' => 'required|in:Male,Female,Other',
                'role' => 'required|in:Admin,User',
                'profile_picture' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
             if($validator->passes()){
             //save the data
              $userinformation=new UserInformation();
              $userinformation->first_name=$request->first_name;
              $userinformation->last_name=$request->last_name;
              $userinformation->email=$request->email;
              $userinformation->phone=$request->phone;
              $userinformation->gender=$request->gender;
              $userinformation->role=$request->role;
              $userinformation->save();
        
              //upload image here
            if($request->profile_picture){
              $ext=$request->profile_picture->getClientOriginalExtension();
              $file=time().'.'.$ext;
              $request->profile_picture->move(public_path().'/uploads/users/',$file);
              $userinformation->profile_picture=$file;

          File::delete(public_path().'/uploads/users/'.$oldImage);
        } 
        $request->session()->flash('success','User Edited Successfully');
          return redirect()->route('userinformations.index');
    
         }
         else{
            return redirect()->route('userinformations.edit',$id)->withErrors($validator)->withInput();
         }
     }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user =UserInformation::find($id);
        $user->delete();
        return redirect()->route('userinformations.index')->with('success','User deleted successfully!');
    }

}
