<?php

namespace App\Http\Controllers;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;


class SessionsController extends Controller
{
    public function create(){
        return view('sessions.create');
    }

    public function store(LoginRequest $request){
        $credentials=[
            'email'=>$request->email,
            'password'=>$request->password,
        ];

        if(Auth::attempt($credentials,$request->has('remember'))){
            session()->flash('success','welcome back');
            return redirect()->route('users.show',[Auth::user()]);

        }else{
            session()->flash('danger','Sorry your email or password is not correct.Please try again!');
            return redirect()->back();

        }

    }

    public function destory(){
        Auth::logout();
        session()->flash('success','logout');
        return redirect('login');
    }
}
