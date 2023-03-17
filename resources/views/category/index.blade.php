@extends('layouts.gentelella')

 @section('content')
 <form method="POST" action="{{url('brands')}}">
    @csrf
    <div class="form-group">
        <label>Nama Kategori</label>
        <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Masukkan nama kategori">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<table id="custometable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Nama Brand</th>
            <th style="width: 15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i =1;
        @endphp
        @foreach ($categories as $c)
            <tr>
                <td>{{$i++}}</td>
                <td>{{$c->name}}</td>
                <td>
                    <a href="{{url('categories/'.$c->id.'/edit')}}" class="btn btn-warning btn-xs">Ubah</a>
                    <form method="POST" action="{{url('categories/'.$c->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Hapus" class="btn btn-danger btn-xs" onclick="if(!confirm('Apakah anda yakin ingin menghapus data {{$c->name}}')) return false">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody> 
</table>
 @endsection