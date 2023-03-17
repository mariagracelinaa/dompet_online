@extends('layouts.gentelella')

 @section('content')
 <form method="POST" action="{{url('transactions')}}">
    @csrf
    <div class="form-group">
        <label>Tanggal transaksi</label>
        <input type="date" class="form-control" id="date" name="date" value="<?php echo date('Y-m-d'); ?>">
    </div>
    <div class="form-group">
        <label>Kategori Transaksi</label>
        <select name="category" id="category" class="form-control">
            <option value="">--- Pilih Kategori ---</option>
            @foreach ($categories as $c)
                <option value="{{$c->id}}">{{ucfirst($c->name)}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Nominal Transaksi</label>
        <input type="text" class="form-control" id="nominal" name="nominal"
            placeholder="Masukkan nominal transaksi"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
    </div>
    <div class="form-group">
        <label>Keterangan Transaksi</label>
        <input type="text" class="form-control" id="desc" name="desc"
            placeholder="Masukkan keterangan transaksi">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<br>
<table id="custometable" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nominal</th>
            <th>Kategori</th>
            <th>Jenis Transaksi</th>
            <th>Keterangan</th>
            <th>Status</th>
            <th style="width: 15%">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i =1;
        @endphp
        @foreach ($transactions as $t)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ Carbon\Carbon::parse($t->date)->format('d M Y') }}</td>
                <td>{{number_format($t->nominal)}}</td>
                <td>{{ucfirst($t->categories->name)}}</td>
                <td>{{ucfirst($t->categories->type)}}</td>
                @if ($t->desc == NULL)
                    <td>-</td>
                @else
                    <td>{{ucfirst($t->desc)}}</td>
                @endif
                <td>{{ucfirst($t->status)}}</td>
                <td>
                    <a href="{{url('transactions/'.$t->id.'/edit')}}" class="btn btn-warning btn-xs">Ubah</a>
                    <form method="POST" action="{{url('transactions/'.$t->id)}}">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Hapus" class="btn btn-danger btn-xs" onclick="if(!confirm('Apakah anda yakin ingin menghapus data?')) return false">
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody> 
</table>
 @endsection