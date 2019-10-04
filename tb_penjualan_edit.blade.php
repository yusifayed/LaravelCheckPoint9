@extends('template')
@section('content')
    <section class="main-section">
        <div class="content">
            <h1>Ubah Data Penjualan</h1>
            <hr>
            @if($errors->any())
                <div class="alert alert-danger">
                    @foreach($errors->all() as $error)
                    <li><strong>{{$error}}</strong>
                    @endforeach
                </div>
            @endif
            @foreach($data as $datas)
            <form action="{{ route('jual.update', $datas->id) }}" method="post">
            {{ csrf_field()}}
            {{ method_field('PUT')}}
            <div class="form-group">
                <label for="kd_barang">Kd_Barang</label>
                <input type="text" class="form-control" name="kd_barang" value="{{ $datas->kd_barang}}">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" name="jumlah" value="{{ $datas->jumlah}}">
            </div>
            <div class="form-group">
                <label for="harga">Total Harga</label>
                <input type="text" class="form-control" name="harga" value="{{ $datas->harga}}">
            </div>
            <div class="form-group">
                <button type="sumbit" class="btn btn-md btn-primary">Submit</button>
                <button type="reset" class="btn btn-md btn-danger">Cancel</button>
            </div>
        </form>
        @endforeach
    </div>
</section>
@endsection