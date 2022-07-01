<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #04AA6D;
  color: white;
}
</style>
</head>
<body>

<h1>Daftar Data Pegawai</h1>

<table id="customers">
  <tr>
    <th>no</th>
    <th>Nama</th>
    <th>Jenis Kelamin</th>
    <th>No HP</th>
    <th>Kota</th>
  </tr>
  @php
      $no = 1;
  @endphp
  @foreach ($data as $dat)
  <tr>
     <td>{{$no++}} </td>
     <td>{{$dat->nama}} </td>
     <td>{{$dat->jenis_kelamin}} </td>
     <td>0{{$dat->noHp}} </td>
     <td>{{$dat->kota}} </td>
  </tr>
  @endforeach
 
</table>

</body>
</html>


