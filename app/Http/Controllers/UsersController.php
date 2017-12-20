<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class UsersController extends Controller
{
    public function __construct(){
        $this->middleware('auth',[
            'except'=>['show','create','store','index','confirmEmail']]);
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
        $statuses = $user->statuses()
            ->orderBy('created_at','desc')
            ->paginate(30);
        return view('users.show',compact('user','statuses'));
    }

    public function store(UserStoreRequest $request){

        $user=User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            ]
        );

        $this->sendEmailConfirmationTo($user);
        session()->flash('success','the confirmation email has been sent to your email box');
        return redirect('/');

    }

    public function confirmEmail($token){
        $user=User::where('activation_token',$token)->firstOrFail();
        $user->activated=true;
        $user->activation_token=null;
        $user->save();

        Auth::login($user);
        session()->flash('success','Congratulation,activation finished');
        return redirect()->route('users.show',[$user]);

    }

    protected function sendEmailConfirmationTo($user){
        $view='emails.confirm';
        $data=compact('user');
        $from='arcaneade@gmail.com';
        $name='clarkhe';
        $to=$user->email;
        $subject='Thanks for registering Sample Website';

        Mail::send($view,$data,function ($message) use($from,$name,$to,$subject){
            $message->from($from,$name)->to($to)->subject($subject);
        });
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
