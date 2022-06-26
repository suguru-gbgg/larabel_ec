@extends('layouts.app')

@section('content')
<div class="text-center">
    <h2>{{ Auth::user()->name }}さんのカートの中身</h2>
</dvi>
<div class="container">
  <div class="row row-cols-md-3 g-4 justify-content-md-center">
    @php
    $price = 0;
    @endphp
@foreach($user_items as $user_item)
  <div class="col-auto">
    <div class="card h-100">
      <div class="card-img-top text-center">
        <img src="/image/makaron.jpg" class="card-img-top" alt="画像なし">
        <div class="card-body">
          <h5 class="card-title">{{$user_item->name}}</</h5>
        </div>
        <h7>{{number_format($user_item->price)}}円</h7></br>
        @php
            $price=$price + $user_item->price;
        @endphp
        <h7>{{$user_item->detail}}</h7>
      </div>
    </div>
  </div>
@endforeach
  </div>
<div class="card-header h-25">
    <h3>合計{{$price}}円</h3>
        <form method="post" action="{{ route('delete') }}">
            @csrf
            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
            <input type="submit" value="購入する" class="btn btn-primary">
        </form>
        <a href="{{ route('shop') }}">商品一覧に戻る</a>
    </div>
</div>
</div>
@endsection
