@extends('base')
@section('title', 'Tambah Kategori')
@section('content')
    <div class="breadcrumbs mb-6">
        <ul class="text-xl text-dark">
            <li></li>
            <li>Kategori</li>
            <li>Tambah</li>
        </ul>
    </div>

    <form action="{{ route('category.store') }}" id="category-form" method="POST">
        @csrf
        <div class="card bg-background shadow-xl p-5">
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Nama <span class="text-xs text-red-500">*</span></span>
                </label>
                <input type="text" name="name" placeholder="Nama"
                    class="input input-bordered bg-light @error('name') is-invalid @enderror" value="{{ old('name') }}" />
                <div class="invalid-feedback">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Deskripsi <span class="text-xs text-slate-400"></span></span>
                </label>
                <textarea class="textarea textarea-bordered bg-light" placeholder="--" name="description"></textarea>
                <div class="invalid-feedback">
                    @error('description')
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

@endsection
