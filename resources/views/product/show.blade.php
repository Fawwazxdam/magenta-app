@extends('base')
@section('title', 'Produk' . $product->name)
@section('content')
    <div class="breadcrumbs mb-6">
        <ul class="text-xl text-dark">
            <li></li>
            <li><a href="{{ route('product') }}">Produk</a></li>
            <li>Detail</li>
            <li>{{ $product->name }}</li>
        </ul>
    </div>
    @foreach ($product->images as $image)
        <img src="{{ url($image->url) }}" alt="">
    @endforeach
@endsection
