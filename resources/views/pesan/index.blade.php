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
          <li class="breadcrumb-item active" aria-current="page">{{$barang->nama_barang}}</li>
        </ol>
      </nav>
     </div>

      <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="row">
              <div class="col-md-6">
               <center>
                 <img class="rounded mx auto d block" src="{{url('uploads')}}/{{$barang->gambar}}" style="width:300px; height: 350px; margin-left: auto; margin-right: auto;">
              </center> 
              </div>
              <div class="col-md-6 mt-5">
                <h2 class="card-title">{{ $barang->nama_barang}}</h2>
              <table class="table">
                <tbody>
                  <tr>
                    <td>Harga</td>
                    <td>:</td>
                    <td>Rp. {{number_format($barang->harga)}}</td>
                  </tr>
                  <tr>
                    <td>Stok</td>
                    <td>:</td>
                    <td>{{$barang->stok}} {{$barang->keterangan}}</td>
                  </tr>
                  
                    <tr>
                      <td>Jumlah Pesan</td>
                      <td>:</td>
                      <td>
                      <form action="{{ url('pesan')}}/{{$barang->id}}" method="post">
                          @csrf
                        <select class="custom-select" id="inputGroupSelect01" name="jumlah_pesan">
                          <option selected>Pilih...</option>
                          @for ($i = 0; $i < $barang->stok; $i++)
                        <option value="{{$i+1}}">{{$i+1}}</option>
                          @endfor
                        </select>

                        <button type="submit" class="btn btn-primary mt-3"><i class="fa fa-shopping-cart"></i> Masukkan Keranjang</button>  
                      </form>
                      </td>
                    </tr>  
                 
                  
                </tbody>
              </table>
              </div>
                
              </div>
          </div>
      </div>
    </div>
</div>
</div>
    

@endsection
