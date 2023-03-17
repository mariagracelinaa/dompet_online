@extends('layouts.gentelella')

 @section('content')
 <form method="POST" action="{{url('transactions/'.$transaction->id)}}">
    @csrf
    @method('PUT')
    <div class="form-group">
        <label>Tanggal transaksi</label>
        <input type="date" class="form-control" id="editDate" name="editDate" value="{{$transaction->date}}">
    </div>
    <div class="form-group">
        <label>Kategori Transaksi</label>
        <select name="editCategory" id="editCategory" class="form-control">
            <option value="">--- Pilih Kategori ---</option>
            @foreach ($categories as $c)
                @if ($transaction->categories_id == $c->id)
                    <option value="{{$c->id}}" selected>{{ucfirst($c->name)}}</option>
                @else
                    <option value="{{$c->id}}">{{ucfirst($c->name)}}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Nominal Transaksi</label>
        <input type="text" class="form-control" id="editNominal" name="editNominal"
            placeholder="Masukkan nominal transaksi" value="{{$transaction->nominal}}"
            oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');">
    </div>
    <div class="form-group">
        <label>Keterangan Transaksi</label>
        <input type="text" class="form-control" id="editDesc" name="editDesc" value="{{$transaction->desc}}"
            placeholder="Masukkan keterangan transaksi">
    </div>
    <div class="form-group">
        <label>Status Transaksi</label>
        <select name="editStatus" id="editStatus" class="form-control">
            @if ($transaction->status == 'proses')
                <option value="proses" selected>Proses Konfirmasi</option>
            @else
                <option value="proses">Proses Konfirmasi</option>
            @endif

            @if ($transaction->status == 'diterima')
                <option value="diterima" selected>Diterima</option>    
            @else
                <option value="diterima">Diterima</option>
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
@endsection