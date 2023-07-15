<?php

namespace App\Http\Controllers;

use App\Exports\ViolationaExport;
use App\Imports\ViolationaImport;
use App\Models\Student;
use App\Models\User;
use App\Models\Violationa;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;

class ViolationaController extends Controller
{
    public function index(Request $request){

        // if($request->has('search')){
        //     $datapelanggarana = Violationa::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
        //     Session::put('halaman_url', request()->fullUrl());
        // }else{
        //     $datapelanggarana = Violationa::paginate(5);
           
        //     Session::put('halaman_url', request()->fullUrl());
        // }
        $data = [
            'datapelanggarana' => Violationa::paginate(5),
            'user' => new User(),
        ];

        
        return view('datapelanggaranasramaa',$data);
    }

    public function tambahpelanggarana(){
        $data = [
            'datapelanggarana' => Violationa::all(),
            'user' => User::all()
        ];
        // $datapelanggarana = Violationa::all();
        return view('tambahdatapelanggarana',$data);
    }

    public function insertdatapelanggarana(Request $request){
        // dd($request->all());
        $this->validate($request,[
                'user_id' => 'required',
                'jeniskelamin' => 'required',
                'pelanggaran' => 'required',
                'jenispelanggaran' => 'required',
                'hukuman' => 'required',
                'foto' => 'required|mimes:jpg,png,jpeg',
                
         ]);

        
        //  $request->file('foto')->move('fotosantri/',$request->file('foto')->getClientOriginalName());
        //  $request->foto = $request->file('foto')->getClientOriginalName();

        //
        //  Violationa::create([
        //      'user_id' => $request->user_id,
        //      'jeniskelamin' => $request->jeniskelamin,
        //      'pelanggaran' => $request->pelanggaran,
        //      'jenispelanggaran' => $request->jenispelanggaran,
        //      'hukuman' => $request->hukuman,
        //      'foto' => $image,
            
        //  ]);
       

        $file_dir = 'public/foto/';
       

        if ($request->hasFile('foto')) {

            $foto = $request->file('foto');
            // $filename = $image->getClientOriginalName();
            $image_uploaded = $foto->store($file_dir);

            $url = Storage::url($image_uploaded);

            URL::to('/'). $url;
           
        

        
        }
        // $file_dir = $request->foto->getClientOriginalName();
        // $image = $request->file('foto')->store('public/foto');
        // $url = Storage::url($image);

        //     return URL::to('/'). $url;

        // $filename = $request->foto->getClientOriginalName();
        //  $request->file('foto')->move('public/foto/',$request->file('foto')->getClientOriginalName());
        //  $request->foto = $request->file('foto')->getClientOriginalName();
        //  $url = Storage::url($request);

        //     return URL::to('/'). $url;

        // $filename = $request->foto->getClientOriginalName();
        // $request->file('foto')->move('fotosantri/',$request->file('foto')->getClientOriginalName());
        // $request->foto = $request->file('foto')->getClientOriginalName();
        
         Violationa::create([
             'user_id' => $request->user_id,
             'jeniskelamin' => $request->jeniskelamin,
             'pelanggaran' => $request->pelanggaran,
             'jenispelanggaran' => $request->jenispelanggaran,
             'hukuman' => $request->hukuman,
             'foto' => $request->foto,
            
         ]);

        
        // dd($request);
        return redirect()->route('pelanggarana')->with('success',' Data Berhasil Di Tambahkan');
    }

    public function tampilkandatapelanggarana($id){
        
        $datapelanggarana = Violationa::find($id);
        //dd($data);
        return view('tampildatapelanggarana', compact('datapelanggarana'));
    }

    public function updatedatapelanggarana(Request $request, $id){
        $datapelanggarana = Violationa::find($id);
        $datapelanggarana->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success',' Data Berhasil Di Update');
        }

        return redirect()->route('pelanggarana')->with('success',' Data Berhasil Di Update');

    }

    public function delete($id){
        $datapelanggarana = Violationa::find($id);
        $datapelanggarana->delete($id);
        return redirect()->route('pelanggarana')->with('success',' Data Berhasil Di Hapus');
    }

    // public function exportpdfpelanggarana(){
    //     $datapelanggarana = Violationa::all();

    //     view()->share('datapelanggaranasramaa', $datapelanggarana);
    //     $pdf = PDF::loadview('datapelanggarana-pdf');
    //     return $pdf->download('datapelanggarana.pdf');
    // }

    public function exportexcelpelanggarana(){
        return Excel::download(new ViolationaExport, 'datapelanggarana.xlsx');
    }

    public function importexcelpelanggarana(Request $request){
        $datapelanggarana = $request->file('file');

        $namafile = $datapelanggarana->getClientOriginalName();
        $datapelanggarana->move('ViolationaData', $namafile);

        Excel::import(new ViolationaImport, \public_path('/ViolationaData/'.$namafile));
        return \redirect()->back();
    }
}
