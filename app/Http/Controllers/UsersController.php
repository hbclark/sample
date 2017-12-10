<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth',[
            'except'=>['show','create','store','index']]);
        $this->middleware('guest',[
            'only'=>['create']
        ]);
    }



    public function create(){
        return view('users.create');
    }

    public function index(){
        $users=User::paginate(10);
        return view('users.index',compact('users'));
    }

    public function show(User $user){
        return view('users.show',compact('user'));
    }

    public function store(UserStoreRequest $request){

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            ]
        );
        Auth::login($user);  //Login automatically after registered successfully
        session()->flash('success','welcome');
        return view('users.show',compact('user'));

    }
    public function edit(User $user){
        $this->authorize('update',$user);
        return view('users.edit',compact('user'));
    }

    public function update(User $user,UserUpdateRequest $request){
        $this->authorize('update',$user);
        $data=[];
        $data['name']=$request->name;
        if($request->password){
            $data['password']=bcrypt($request->password);
        }
        $user->update($data);
        session()->flash('success','user profile updated');
        return redirect()->route('users.show',$user);
    }

    public function destroy(User $user){
        $this->authorize('destroy',$user);
        $user->delete();
        session()->flash('success',"$user->name".'has been deleted!');
        return back();
    }
}
