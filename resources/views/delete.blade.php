@extends('layouts.app')

@section('content')
<div class="text-center">
    <h3>{{ Auth::user()->name }}さんご購入ありがとうございました</h3>
</div>
<div class="text-center">
    <a href="{{ route('shop') }}">商品一覧に戻る</a>
</div>
@endsection