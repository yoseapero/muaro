@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 mb-5">
        </div>    
            @foreach( $barangs as $barang )
            <div class="col-md-4 mt-5">
                <div class="card border-dark">
                
                <img class="card-img-top" src="{{url('uploads')}}/{{$barang->gambar}}" alt="Card image cap" style="width: 130px; height: 150px; margin-left: auto; margin-right: auto;">
                    <div class="card-body">
                      <h5 class="card-title">{{ $barang->nama_barang}}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Rp. {{number_format($barang->harga, 0)}}</h6>
                    <p class="card-text">{{ $barang->stok}} {{$barang->keterangan}}</p>
                      
                    <a href="{{url('pesan')}}/{{$barang->id}} " class="btn btn-dark"><i class="fa fa-shopping-cart"></i> Pesan</a>    
                    
                  </div>
                  </div>
              </div>
              @endforeach
    </div>           
</div>
    

@endsection
