<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\userdataModel;
use App\Models\collecteddata;
use App\Models\tempodata;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\hasilExport;

class hasilcontroller extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $countries = DB::table("countries")->pluck("name","id");
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();
        $allUser = collecteddata::paginate(5);

        $userdata = tempodata::all();

        return view('vDaftarHasil', ['allUser'=>$allUser, 'userdata'=>$userdata] ,compact('user','User'));

    }
    public function search()
    {
        $id = Auth::user()->id;
        $query = Request()->search;
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();
        $allUser = collecteddata::where('nama','like',"%".$query."%")->paginate(5);
        return view('vDaftarHasil', ['allUser'=>$allUser] ,compact('user','User'));

    }
    public function export_excel()
    {
        return Excel::download(new hasilExport, 'hasil.xlsx');
    }
    public function downloadImage($id){
        $image = collecteddata::where('id', $id)->firstOrFail();
        $path = public_path(). '/images/hasilLari/'. $image->hasil;
        return response()->download($path, $image
                 ->original_filename, ['Content-Type' => $image->mime]);
    }
}
