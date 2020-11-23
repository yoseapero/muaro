@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 mb-3">
        <a href="{{url('home')}}" class="btn btn-light"><i class="fa fa-arrow-left"></i></a>
        </div>
        
        <div class="col-md-12 mb-2">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{url('home')}}">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Check Out</li>
            </ol>
        </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="fa fa-shopping-cart"></i>Check Out</h3>
                    @if(!@empty($pesanan)) 
                <p align="right">Tanggal Pesan : {{ $pesanan->tanggal}}</p>
                    <table class="table table-striped ">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Barang</th>
                                <th>Jumlah</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach ($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{$pesanan_detail->barang->nama_barang}}</td>
                                <td>{{$pesanan_detail->jumlah}} box</td>
                                <td align="left" >Rp. {{number_format($pesanan_detail->barang->harga)}}</td>
                                <td align="left">Rp. {{number_format($pesanan_detail->jumlah_harga)}}</td>
                                <td>
                                <form action="{{ url('checkout') }}/{{ $pesanan_detail->id }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger" 
                                    onclick="return confirm('Anda yakin akan menghapus barang?');"><i class="fa fa-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                                
                            @endforeach
                            <tr>
                                <td colspan="4" align="right"><strong>Total Harga : </strong></td>
                                <td><strong>Rp. {{number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" 
                                    onclick="return confirm('Anda yakin akan check out?');">
                                    <i class="fa fa-shopping-cart"></i> Check Out
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>

            </div>
        </div>
        

        
    </div>
</div>

    

@endsection
