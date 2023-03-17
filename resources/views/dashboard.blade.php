@extends('layouts.gentelella')

@section('content')
<h1>Saldo Saat Ini : Rp. {{number_format($current_balance)}}</h1>
<h1>Pemasukan Selama 1 Tahun</h1>
<table id="custometable1" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Pemasukan</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i =1;
        @endphp
        {{-- @foreach ($pemasukan_tahunan as $pem) --}}
            <tr>
                <td>1</td>
                <td>X</td>
                <td>100000</td>
            </tr>
        {{-- @endforeach --}}
    </tbody> 
</table>
<h1>Pengeluaran Selama 1 Tahun</h1>
<table id="custometable2" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Pengeluaran</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i =1;
        @endphp
        {{-- @foreach ($pengeluaran_tahunan as $peng) --}}
            <tr>
                <td>1</td>
                <td>X</td>
                <td>100000</td>
            </tr>
        {{-- @endforeach --}}
    </tbody> 
</table>
<h1>Transaksi Belum Terkonfirmasi</h1>
<table id="custometable3" class="table table-striped table-bordered" style="width:100%">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal Transaksi</th>
            <th>Nominal</th>
            <th>Kategori</th>
            <th>Jenis Transaksi</th>
            <th>Keterangan</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        @php
            $i =1;
        @endphp
        @foreach ($transactions_process as $tp)
            <tr>
                <td>{{$i++}}</td>
                <td>{{ Carbon\Carbon::parse($tp->date)->format('d M Y') }}</td>
                <td>{{number_format($tp->nominal)}}</td>
                <td>{{ucfirst($tp->categories->name)}}</td>
                <td>{{ucfirst($tp->categories->type)}}</td>
                @if ($tp->desc == NULL)
                    <td>-</td>
                @else
                    <td>{{ucfirst($tp->desc)}}</td>
                @endif
                <td>{{ucfirst($tp->status)}}</td>
            </tr>
        @endforeach
    </tbody> 
</table>
@endsection