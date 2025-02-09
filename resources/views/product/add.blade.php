@extends('base')
@section('title', 'Tambah Produk')
@section('content')
    <div class="breadcrumbs mb-6">
        <ul class="text-xl text-dark">
            <li></li>
            <li><a href="{{ route('product') }}">Produk</a></li>
            <li>Tambah</li>
        </ul>
    </div>

    <form action="{{ route('product.store') }}" id="product-form" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card bg-background shadow-xl p-5">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama <span class="text-xs text-red-500">*</span></span>
                </label>
                <input type="text" name="name" placeholder="Nama" class="input input-bordered bg-light @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                <div class="invalid-feedback">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Deskripsi Produk </span>
                </label>
                <textarea class="textarea textarea-bordered bg-light" placeholder="Deskripsi Produk" name="description">{{ old('description') }}</textarea>
                <div class="invalid-feedback">
                    @error('description')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Kategori <span class="text-xs text-red-500">*</span></span>
                </label>
                <select class="select select-bordered w-full bg-light" name="category_id">
                    <option disabled selected>Pilih Kategori</option>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                <div class="invalid-feedback">
                    @error('category')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Harga <span class="text-xs text-red-500">*</span></span>
                </label>
                <input type="text" name="price" placeholder="Harga" class="price-input input input-bordered bg-light @error('price') is-invalid @enderror" value="{{ old('price') }}" />
                <div class="invalid-feedback">
                    @error('price')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Gambar</span>
                </label>
                <input type="file" name="image" id="image" class="file-input file-input-bordered file-input-ghost bg-light">
                {{-- <input type="text" name="price" placeholder="Harga" class="price-input input input-bordered bg-light @error('price') is-invalid @enderror" value="{{ old('price') }}" /> --}}
                <div class="invalid-feedback">
                    @error('image')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit"
                class="btn bg-primary border-primary hover:bg-primary-dark hover:border-primary-dark shadow-lg text-white"
                id="store-customer">
                {{-- <button type="button" class="btn btn-info shadow-lg text-white" id="store-customer"> --}}
                Simpan
            </button>
        </div>
    </form>
    @include('product.scripts.form')
@endsection
