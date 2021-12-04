<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\userdataModel;
use App\Models\tempodata;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class dashboardController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $countries = DB::table("countries")->pluck("name","id");
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();
        $allUser = tempodata::paginate(5);

        if ($User->role == "member") {
            return view('vDashboard', compact('user','User','countries'));
        }
        else {
            return view('vAdminHome', ['allUser'=>$allUser] ,compact('user','User'));
        }
    }
}
