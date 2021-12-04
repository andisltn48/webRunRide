<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\userdataModel;
use App\Models\collecteddata;
use App\Models\tempodata;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class pengumpulanController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $countries = DB::table("countries")->pluck("name","id");
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();

        if ($User->role == "member") {
            return view('vPengumpulan', compact('user','User','countries'));
        }
        else {
            return view('vAdminHome', ['allUser'=>$allUser] ,compact('user','task','User'));
        }
    }
    public function store(Request $request){

        $validate = $request->validate([
            'email' => 'required|max:255',
            'hasil' => 'required|mimes:jpg,png|max:10000',
            'nama' => 'required|max:40',
        ],[
            'email.required'=> 'Email harus diisi!',
            'email.max' => 'Karakter melebihi batas!',
            'nama.required'=> 'Nama harus diisi!',
            'nama.max' => 'Karakter melebihi batas!',
            'hasil.required' => 'foto pembayaran harus di isi!',
            'hasil.mimes' => 'foto pembayaran harus format jpg atau png!',
            'hasil.max' => 'ukuran tidak boleh lebih dari 10mb!',
        ]);

        $negara = DB::table("countries")
        ->where("id",Request()->negara)
        ->value('name');
        $state = DB::table("states")
            ->where("id", Request()->provinsi)
            ->value('name');
        $file = Request()->hasil;
        $tempodata = userdataModel::where('email',Request()->email)->first();

        $file = Request()->hasil;
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('images/hasilLari'), $fileName);
        $data = tempodata::where('email', Request()->email)->value('nama');
        $collected = collecteddata::create([
            'email' => Request()->email,
            'nama' => $data,
            'hasil' => $fileName,
            'alamat' => Request()->alamat,
            'kodepos' => Request()->kodepos ,
            'negara' => $negara,
            'provinsi' => $state,
            'kota' => Request()->kota,
            'kategori' => $tempodata->kategori,
            'klasifikasi' => $tempodata->klasifikasi,
            'hasil' => $fileName
        ]);

        return redirect()->route('pengumpulan')->with('pesan', 'Pengumpulan telah berhasil!');

        // $validate = $request->validate([
        //     'email' => 'required|max:255',
        //     'nama' => 'required|max:40',
        //     'alamat' => 'required|max:150',
        //     'kodepos' => 'required|max:40',
        //     'kota' => 'required|max:50',
        //     'provinsi' => 'required|not_in:Pilih',
        //     'negara' => 'required|not_in:Pilih',
        //     'kategori' => 'required|in:Pelajar,Mahasiswa / Umum',
        //     'klasifikasi' => 'required|in:Run,Ride',
        //     'hasil' => 'required|mimes:jpg,png|max:10000'
        // ],[
        //     'email.required'=> 'Email harus diisi!',
        //     'email.max' => 'Karakter melebihi batas!',
        //     'nama.required'=> 'Nama harus diisi!',
        //     'nama.max' => 'Karakter melebihi batas!',
        //     'alamat.required'=> 'Alamat harus diisi!',
        //     'alamat.max' => 'Karakter melebihi batas!',
        //     'kota.required'=> 'Kota harus diisi!',
        //     'kota.max' => 'Karakter melebihi batas!',
        //     'provinsi.required'=> 'Provinsi harus diisi!',
        //     'provinsi.max' => 'Karakter melebihi batas!',
        //     'kodepos.required'=> 'Kodepos harus diisi!',
        //     'kodepos.max' => 'Karakter melebihi batas!',
        //     'negara.required'=> 'Negara harus diisi!',
        //     'negara.max' => 'Karakter melebihi batas!',
        //     'tgllahir.required'=> 'Tanggal Lahir harus diisi!',
        //     'kategori.in'=> 'Kategori harus diisi!',
        //     'klasifikasi.in'=> 'Klasifikasi harus diisi!',
        //     'hasil.required' => 'foto pembayaran harus di isi!',
        //     'hasil.mimes' => 'foto pembayaran harus format jpg atau png!',
        //     'hasil.max' => 'ukuran tidak boleh lebih dari 10mb!',
        // ]);

        // $negara = DB::table("countries")
        //     ->where("id",Request()->negara)
        //     ->value('name');
        // $state = DB::table("states")
        //     ->where("id", Request()->provinsi)
        //     ->value('name');
        // $file = Request()->hasil;
        // $tempodata = userdataModel::where('email',Request()->email)->first();
        // $fileName = $file->getClientOriginalName();
        // $file->move(public_path('images/hasilLari'), $fileName);
        // $collected = collecteddata::create([
        //     'email' => Request()->email,
        //     'nama' => Request()->nama,
        //     'alamat' => Request()->alamat,
        //     'kodepos' => Request()->kodepos ,
        //     'negara' => $negara,
        //     'provinsi' => $state,
        //     'kota' => Request()->kota,
        //     'kategori' => $tempodata->kategori,
        //     'klasifikasi' => $tempodata->klasifikasi,
        //     'hasil' => $fileName
        // ]);

        // return redirect()->route('pengumpulan')->with('pesan', 'Pengumpulan telah berhasil!');
    }
}
