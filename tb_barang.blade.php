@extends('template')
@section('content')

    <section class="main-section">
    <div class="content">
    <h1>Data Barang</h1>
    @if(Session::has('alert_message'))
        <div class="alert alert-success">
            <strong>{{ Session::get('alert_message') }}</strong>
        </div>
        @endif
        <div align="left">
        <a href="{{ URL::asset('barang/create') }}"><button class="btn btn-success btn-lg">Tambah Data Barang</button></a><br>
        </div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kd_Barang</th>
                    <th>Nama Barang</th>
                    <th>Stok</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach($data as $datas)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$datas->kd_barang}}</td>
                    <td>{{$datas->nama_barang}}</td>
                    <td>{{$datas->stok}}</td>
                    <td>{{$datas->harga}}</td>
                    <td>
                        <form action="{{ route('barang.destroy', $datas->id)}}" method="post">
                        {{ csrf_field()}}
                        {{ method_field('DELETE')}}
                        <a href="{{ route('barang.edit',$datas->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <button class="btn btn-sm btn-danger" type="sumbit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection