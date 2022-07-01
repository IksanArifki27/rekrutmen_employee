<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PDF;


class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashbord(){
        return view('dashbord');
    }
    public function index(Request $request)
    {
        if($request->has('search')){
            $data =  Employee::where('nama','LIKE','%' . $request->search . '%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }
        return view('data-pegawai',compact('data'));
    }
     public function karyawan(Request $request)
    {
        if($request->has('search')){
            $data =  Employee::where('nama','LIKE','%' . $request->search . '%')->paginate(5);
        }else{
            $data = Employee::paginate(5);
        }
        return view('karyawan',compact('data'));
    }

   public function tambahData(){
       return view('tambah-data');
   }

   public function insertData(Request $request){
            $this->validate($request,[
                "nama" => "required|min:2|max:25",
                "noHP" => "min:7|max:13|unique",
            ]);
        $data = Employee::create($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoPegawai/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
        if($request->hasFile('cv')){
            $request->file('cv')->move('CVPegawai/',$request->file('cv')->getClientOriginalName());
            $data->cv = $request->file('cv')->getClientOriginalName();
            $data->save();
        }
        return redirect('/tambahData')->with('success','Berhasil,Data anda sudah terkirim!');
   }

    public function tampildata($id){
        $data = Employee::find($id);
        return view('tampildata',compact('data'));
    }

    public function updatedata(Request $request,$id){
        $data = Employee::find($id);
        $data->update($request->all());
        if($request->hasFile('foto')){
            $request->file('foto')->move('fotoPegawai/',$request->file('foto')->getClientOriginalName());
            $data->foto = $request->file('foto')->getClientOriginalName();
            $data->save();
        }
            if($request->hasFile('cv')){
            $request->file('cv')->move('CVPegawai/',$request->file('cv')->getClientOriginalName());
            $data->cv = $request->file('cv')->getClientOriginalName();
            $data->save();
        }
        return redirect('/pegawai')->with('success','Berhasil update data');
    }

    public function hapusdata($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect('/pegawai')->with('success','Berhasil hapus tambah data');
    }
    
    public function cetakPDF(){
        $data = Employee::all();
        view()->share('data',$data);
        $pdf = PDF::loadView('datapegawai-pdf');
        return $pdf->download('data.pdf');

    }

}
