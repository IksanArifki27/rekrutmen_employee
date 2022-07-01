<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/bootstrap.css">
    <title>Tambah</title>
</head>
<body>
<div class="container">
       <h2 class="text-success text-center mb-3 fw-bold">Form Recruitment PT. Wakri Jaya Pusaka</h2>
       <div class="row justify-content-center">
         <div class="col-8">
           <div class="card">
                 @if ($message = Session::get('success'))
                     <div class="alert alert-success" role="alert">
                         {{$message}}
                     </div>
                 @endif
                   <div class="card-body">
                       <form action="/insertData" method="post" enctype="multipart/form-data">
                        @csrf
                         <div class="mb-3">
                             <label for="nama" class="form-label"> Nama </label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="nama">
                                @error('nama')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                         </div>
                         <div class="mb-3">
                             <label for="jenis_kelamin" class="form-label"> jenis kelamin: </label>
                             <select class="form-select" name="jenis_kelamin">
                               <option selected> pilih jenis kelamin</option>
                               <option value="laki-laki">Laki-Laki</option>
                               <option value="perempuan">perempuan</option>
                            </select>
                         </div>
                           <div class="mb-3">
                             <label for="foto" class="form-label"> FOTO </label>
                            <input type="file" name="foto" id="foto" class="form-control" placeholder="masukan kota">
                         </div>
                         <div class="mb-3">
                             <label for="noHp" class="form-label"> No telpn </label>
                                <input type="number" name="noHp" id="noHp" class="form-control" placeholder="masukan No HP">
                                 @error('noHP')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                         </div>
                         <div class="mb-3">
                             <label for="kota" class="form-label"> Kota </label>
                                <input type="text" name="kota" id="kota" class="form-control" placeholder="masukan kota">
                         </div>
                         <div class="mb-3">
                             <label for="sertif" class="form-label"> CV </label>
                                <input type="file" name="cv" id="cv" class="form-control" placeholder="masukan Cv">
                         </div>
                       
                         <button type="submit" class="btn btn-primary">tambah</button>
                       </form>
                   </div>
               </div>
           </div>
       </div>
    </div>
      <script src="js/bootstrap.js"></script>
    <script src="js/popper.js"></script>
</body>
</html>