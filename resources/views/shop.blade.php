@extends('layouts.app') 
@section('content')
<div class="container">
  <div class="row row-cols-md-3 g-4 justify-content-md-center">
@foreach($stocks as $stock)
  <div class="col-auto">
    <div class="card h-100">
      <div class="card-img-top text-center">
        <img src="/image/makaron.jpg" class="card-img-top" alt="画像なし">
        <div class="card-body">
          <h5 class="card-title">{{$stock->name}}</</h5>
        </div>
        <h7>{{number_format($stock->price)}}円</h7></br>
        <h7>{{$stock->detail}}</h7>
        <div class="card-body">
          <form method="post" action="{{ route('cart') }}" >
          @csrf
          <input type="hidden" name="stock_id" value="{{ $stock->id }}">
          <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
          <input type="submit" value="カートに入れる" class="btn btn-primary">
        </form>
        </div>
      </div>
    </div>
  </div>
@endforeach
  </div>
</div>
@endsection