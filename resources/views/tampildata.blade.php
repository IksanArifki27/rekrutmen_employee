@extends('layouts.admin')

@section('content')
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Home</a></li>
             <li class="breadcrumb-item active">Dashboard v2</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
    <div class="container">
       <h2 class="text-success text-center">Update Data Pegawai</h2>
       <div class="row justify-content-center">
           <div class="col-8">
               <div class="card">
                   <div class="card-body">
                       <form action="/updatedata/{{$data->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                         <div class="mb-3">
                             <label for="nama" class="form-label"> Nama </label>
                                <input type="text" name="nama"  class="form-control" value="{{$data->nama}} " placeholder="nama">
                         </div>
                         <div class="mb-3">
                             <label for="jenis_kelamin" class="form-label"> Jenis kelamin: </label>
                             <select class="form-select" name="jenis_kelamin" {{$data->jenis_kelamin}}>
                               {{-- <option selected>{{$data->jenis_kelamin}}</option> --}}
                               <option value="laki-laki">Laki-Laki</option>
                               <option value="perempuan">Perempuan</option>
                            </select>
                         </div>
                         <div class="mb-3">
                             <label for="foto" class="form-label">Foto </label>
                                <input type="file" name="foto"  class="form-control" value="{{$data->foto}}">
                         </div>
                         <div class="mb-3">
                             <label for="noHp" class="form-label"> No telpn </label>
                                <input type="number" name="noHp"  class="form-control" value="{{$data->noHp}}">
                         </div>
                         <div class="mb-3">
                             <label for="kota" class="form-label"> Kota </label>
                                <input type="text" name="kota" class="form-control" value="{{$data->kota}} " placeholder="masukan kota">
                         </div>
                         <div class="mb-3">
                             <label for="sertif" class="form-label"> cv </label>
                                <input type="file" name="cv"  class="form-control" value="{{$data->cv}} " placeholder="masukan kota">
                         </div>
                         <button type="submit" class="btn btn-primary">Update</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </div>
</div>
@endsection