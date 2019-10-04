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
            <form action="{{ route('jual.store') }}" method="post">
            {{ csrf_field()}}
            <div class="form-group">
                <label for="kd_barang">Kd_Barang</label>
                <input type="text" class="form-control" name="kd_barang" >
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" name="jumlah" >
            </div>
            <div class="form-group">
                <label for="harga">Harga</label>
                <input type="text" class="form-control" name="harga">
            </div>
            <div class="form-group">
                <button type="sumbit" class="btn btn-md btn-primary">Submit</button>
                <button type="reset" class="btn btn-md btn-danger">Cancel</button>
            </div>
        </form>
    </div>
</section>
@endsection