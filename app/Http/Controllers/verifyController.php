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
use App\Exports\penggunaExport;

class verifyController extends Controller
{
    public function index()
    {
        $id = Auth::user()->id;
        $countries = DB::table("countries")->pluck("name","id");
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();
        $allUser = userdataModel::paginate(5);


        return view('vDaftarUser', ['allUser'=>$allUser] ,compact('user','User'));

    }
    public function search()
    {
        $id = Auth::user()->id;
        $query = Request()->search;
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();
        $allUser = userdataModel::where('nama','like',"%".$query."%")->paginate(5);
        return view('vDaftarUser', ['allUser'=>$allUser] ,compact('user','User'));

    }
    public function store($id){
        $user = tempodata::where('id',$id)->first();
        $userdataModel = userdataModel::create([
            'email' => $user->email,
            'nama' => $user->nama,
            'alamat' => $user->alamat,
            'kodepos' => $user->kodepos ,
            'negara' => $user->negara,
            'provinsi' => $user->provinsi,
            'kota' => $user->kota,
            'nohp' => $user->nohp,
            'tgllahir' => $user->tgllahir,
            'kategori' => $user->kategori,
            'klasifikasi' => $user->klasifikasi,
            'ukuran' => $user->ukuran,
            'pembayaran' => $user->pembayaran,
            'totalpembayaran' => $user->jumlahbayar,
            'buktipembayaran' => $user->buktipembayaran,
        ]);
        $update = tempodata::where('id',$id)->update(['status'=>'konfirmasi']);
        return redirect()->route('pendaftaran')->with('pesan', 'Konfirmasi telah berhasil');
    }
    public function delete($id)
    {
        // echo "hapus";
        $delete = userdataModel::where('id',$id)->delete();
        return redirect('daftaruser')->with('pesan', 'Pengguna telah dihapus');
    }
    public function export_excel()
    {
        return Excel::download(new penggunaExport, 'pengguna.xlsx');
    }
}
