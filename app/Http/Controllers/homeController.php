<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\userdataModel;
use App\Models\tempodata;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\pendaftarExport;

class homeController extends Controller
{
    public function index(){
        $id = Auth::user()->id;
        $countries = DB::table("countries")->pluck("name","id");
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();
        $allUser = tempodata::where('status','belum konfirmasi')->paginate(5);

        if ($User->role == "member") {
            return view('vUserHome', compact('user','User','countries'));
        }
        else {
            return view('vAdminHome', ['allUser'=>$allUser] ,compact('user','User'));
        }
    }

    public function search()
    {
        $id = Auth::user()->id;
        $query = Request()->search;
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();
        $allUser = tempodata::where('nama','like',"%".$query."%")->paginate(5);
        return view('vAdminHome', ['allUser'=>$allUser] ,compact('user','User'));

    }

    public function verify($id){
        $ids = Auth::user()->id;
        $detailuser = tempodata::where('id','=',Request()->id)->first();
        $User = User::where('id','=',$ids)->first();
        $user = userdataModel::all();

        return view('vDetailUser1',compact('detailuser','user','User'));


    }


    public function verified($id){
        $ids = Auth::user()->id;
        $detailuser = userdataModel::where('id','=',Request()->id)->first();
        $User = User::where('id','=',$ids)->first();
        $user = userdataModel::all();

        return view('vDetailUser2',compact('detailuser','user','User'));

    }

    public function store(Request $request){

        $validate = $request->validate([
            'email' => 'required|unique:tempodata,email|max:40',
            'nama' => 'required|max:40',
            'alamat' => 'required|max:150',
            'kodepos' => 'required|max:40',
            'kota' => 'required|max:50',
            'provinsi' => 'required|not_in:Pilih',
            'negara' => 'required|not_in:Pilih',
            'nohp' => 'required|numeric',
            'tgllahir' => 'required',
            'kategori' => 'required|in:Pelajar,Mahasiswa / Umum',
            'klasifikasi' => 'required|in:Run,Ride',
            'ukuran' => 'required|in:S,M,L,XL',
            'pembayaran' => 'required|in:BCA,BNI,OVO,Dana',
            'jumlahbayar' => 'required|max:40',
            'foto_pembayaran' => 'required|mimes:jpg,png|max:10000'
        ],[
            'email.required'=> 'Email harus diisi!',
            'email.unique'=> 'Email sudah terdaftar!',
            'email.max' => 'Karakter melebihi batas!',
            'nama.required'=> 'Nama harus diisi!',
            'nama.max' => 'Karakter melebihi batas!',
            'alamat.required'=> 'Alamat harus diisi!',
            'alamat.max' => 'Karakter melebihi batas!',
            'kota.required'=> 'Kota harus diisi!',
            'kota.max' => 'Karakter melebihi batas!',
            'provinsi.required'=> 'Provinsi harus diisi!',
            'provinsi.max' => 'Karakter melebihi batas!',
            'kodepos.required'=> 'Kodepos harus diisi!',
            'kodepos.max' => 'Karakter melebihi batas!',
            'negara.required'=> 'Negara harus diisi!',
            'negara.max' => 'Karakter melebihi batas!',
            'nohp.required'=> 'Nomer Handphone harus diisi!',
            'nohp.max' => 'Karakter melebihi batas!',
            'nohp.numeric' => 'Karakter tidak boleh menggunakan huruf!',
            'tgllahir.required'=> 'Tanggal Lahir harus diisi!',
            'kategori.in'=> 'Kategori harus diisi!',
            'klasifikasi.in'=> 'Klasifikasi harus diisi!',
            'ukuran.in' => 'Ukuran harus diisi!',
            'pembayaran.in' => 'Pembayaran harus diisi!',
            'jumlahbayar.required'=> 'Jumlah pembayaran harus diisi!',
            'jumlahbayar.max' => 'Karakter melebihi batas!',
            'foto_pembayaran.required' => 'foto pembayaran harus di isi!',
            'foto_pembayaran.mimes' => 'foto pembayaran harus format jpg atau png!',
            'foto_pembayaran.max' => 'ukuran tidak boleh lebih dari 10mb!',
        ]);

        // $id = Auth::user()->id;
        $negara = DB::table("countries")
            ->where("id",Request()->negara)
            ->value('name');
        $state = DB::table("states")
            ->where("id", Request()->provinsi)
            ->value('name');
        $file = Request()->foto_pembayaran;
        $fileName = $file->getClientOriginalName();
        $file->move(public_path('images/buktiPembayaran'), $fileName);
        $userdataModel = tempodata::create([
            'email' => Request()->email,
            'nama' => Request()->nama,
            'alamat' => Request()->alamat,
            'kodepos' => Request()->kodepos ,
            'negara' => $negara,
            'provinsi' => $state,
            'kota' => Request()->kota,
            'nohp' => Request()->nohp,
            'tgllahir' => Request()->tgllahir,
            'status' => 'belum konfirmasi',
            'kategori' => Request()->kategori,
            'klasifikasi' => Request()->klasifikasi,
            'ukuran' => Request()->ukuran,
            'pembayaran' => Request()->pembayaran,
            'totalpembayaran' => Request()->jumlahbayar,
            'buktipembayaran' => $fileName
        ]);

        return redirect()->route('pendaftaran')->with('pesan', 'Pendaftaran telah berhasil, silahkan menunggu konfirmasi Admin!');
    }


    public function getStateList(Request $request){
        // echo $request->country_id;
        $states = DB::table("states")
            ->where("country_id",$request->id)
            ->get();
            return response()->json($states);
    }

    public function export_excel()
    {
        return Excel::download(new pendaftarExport, 'pendaftar.xlsx');
    }
    public function downloadImage($id){
        $image = tempodata::where('id', $id)->firstOrFail();
        $path = public_path(). '/images/buktiPembayaran/'. $image->buktipembayaran;
        return response()->download($path, $image
                 ->original_filename, ['Content-Type' => $image->mime]);
    }
    public function deskripsi(){
        $id = Auth::user()->id;
        $countries = DB::table("countries")->pluck("name","id");
        $user = userdataModel::all();
        $User = User::where('id','=',$id)->first();
        $allUser = tempodata::where('status','belum konfirmasi')->paginate(5);

        if ($User->role == "member") {
            return view('vDeskripsi', compact('user','User','countries'));
        }
        else {
            return view('vAdminHome', ['allUser'=>$allUser] ,compact('user','User'));
        }
    }
}
