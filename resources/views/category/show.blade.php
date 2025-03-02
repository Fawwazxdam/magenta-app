@extends('base')
@section('title', 'Kategori')
@section('content')
    <div class="breadcrumbs mb-6">
        <ul class="text-xl text-dark">
            <li></li>
            <li>Kategori</li>
            <li>{{$category->name}}</li>
        </ul>
    </div>

@endsection
