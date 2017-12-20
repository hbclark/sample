<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatusRequest;
use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StatusesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(StatusRequest $request){
        Auth::user()->statuses()->create([
            'content'=>$request->content
            ]
        );
        return redirect()->back();

    }

    public function destroy(Status $status){
        $this->authorize('destroy',$status);
        $status->delete();
        session()->flash('success','status has been deleted');
        return redirect()->back();
    }
}
