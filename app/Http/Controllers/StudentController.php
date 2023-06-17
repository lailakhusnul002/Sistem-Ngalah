<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\StudentImport;
use App\Models\Asrama;
use App\Models\User;
use Barryvdh\DomPDF\PDF as DomPDFPDF;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    public function index(Request $request){

        if($request->has('search')){
            $data = Student::where('nama','LIKE','%' .$request->search.'%')->paginate(5);
            Session::put('halaman_url', request()->fullUrl());
        }else{
            $data = Student::paginate(5);
           
            Session::put('halaman_url', request()->fullUrl());
        }

        
        return view('datasantri',compact('data'));
    }

    public function tambahsantri(){
        $dataasrama = Asrama::all();
        return view('tambahdata',compact('dataasrama'));
    }

    public function insertdata(Request $request){
        //dd($request->all());
        $this->validate($request,[
                'nama' => 'required',
                'notelpon' => 'required|unique:students',
                'tanggal_lahir' => 'required',
                'alamat' => 'required',
                'foto' => 'required',
                'id_asramas' => 'required',
                'jeniskelamin' => 'required',
         ]);
         $filename = $request->foto->getClientOriginalName();
         $request->file('foto')->move('fotosantri/',$request->file('foto')->getClientOriginalName());
         $request->foto = $request->file('foto')->getClientOriginalName();

         Student::create([
             'nama' => $request->nama,
             'notelpon' => $request->notelpon,
             'tanggal_lahir' => $request->tanggal_lahir,
             'alamat' => $request->alamat,
             'foto' => $request->foto,
             'id_asramas' =>$request->id_asramas,
             'jeniskelamin' => $request->jeniskelamin,
         ]);
        //  dd($request);
        return redirect()->route('santri')->with('success',' Data Berhasil Di Tambahkan');
    }

    public function tampilkandata($id){
        
        $data = Student::find($id);
        //dd($data);
        return view('tampildata', compact('data'));
    }

    public function updatedata(Request $request, $id){
        $data = Student::find($id);
        $data->update($request->all());
        if(session('halaman_url')){
            return Redirect(session('halaman_url'))->with('success',' Data Berhasil Di Update');
        }

        return redirect()->route('santri')->with('success',' Data Berhasil Di Update');

    }

    public function delete($id){
        $data = Student::find($id);
        $data->delete();
        return redirect()->route('santri')->with('success',' Data Berhasil Di Hapus');
    }

    // public function exportpdf(){
    //     $data = Student::all();

    //     view()->share('data', $data);
    //     $pdf = DomPDFPDF::loadview('datasantri-pdf');
    //     return $pdf->download('data.pdf');
    // }

    public function exportexcel(){
        return Excel::download(new StudentExport, 'datasantri.xlsx');
    }

    public function importexcel(Request $request){
        $data = $request->file('file');

        $namafile = $data->getClientOriginalName();
        $data->move('StudentData', $namafile);

        Excel::import(new StudentImport, \public_path('/StudentData/'.$namafile));
        return \redirect()->back();
    }

    public function user(){
        $user = User::all();
        return view('datasantri',['user' => $user]);
    }
}
