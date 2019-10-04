@extends('template')
@section('content')

    <section class="main-section">
    <div class="content">
    <h1>Data Pembelian</h1>
    @if(Session::has('alert_message'))
        <div class="alert alert-success">
            <strong>{{ Session::get('alert_message') }}</strong>
        </div>
        @endif
        <div align="left">
        <a href="{{ URL::asset('beli/create') }}"><button class="btn btn-success btn-lg">Tambah Data Pembelian</button></a><br>
        </div>
        <table class="table table-dark">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kd_Barang</th>
                    <th>Jumlah</th>
                    <th>Harga</th>
                    <th>Total Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no = 1; @endphp
            @foreach($data as $datas)
            @foreach($data1 as $datas1)
                <tr>
                    <td>{{$no++}}</td>
                    <td>{{$datas->kd_barang}}</td>
                    <td>{{$datas->jumlah}}</td>
                    <td>{{$datas1->harga}}</td>
                    <td>{{$datas->jumlah * $datas1->harga}}</td>
                    <td>
                        <form action="{{ route('beli.destroy', $datas->id)}}" method="post">
                        {{ csrf_field()}}
                        {{ method_field('DELETE')}}
                        <a href="{{ route('beli.edit',$datas->id)}}" class="btn btn-sm btn-primary">Edit</a>
                        <button class="btn btn-sm btn-danger" type="sumbit" onclick="return confirm('Yakin ingin menghapus data?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endforeach
            </tbody>
        </table>
    </div>
</section>
@endsection