@extends('base')
@section('title', 'Tambah Karyawan')
@section('content')
    <div class="breadcrumbs mb-6">
        <ul class="text-xl text-gray-700">
            <li></li>
            <li>Karyawan</li>
            <li>Tambah</li>
        </ul>
    </div>
    <form action="{{ route('employee.store') }}" id="employee-form" method="POST">
        @csrf
        <div class="card bg-background shadow-xl p-5">
            <div class="flex gap-5">
                <div class="w-full">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama <span class="text-xs text-red-500">*</span></span>
                        </label>
                        <input type="text" name="name" placeholder="Nama"
                            class="input input-bordered bg-light @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" />
                        <div class="invalid-feedback">
                            @error('name')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">E-mail</span>
                        </label>
                        <input type="email" name="email" placeholder="E-mail"
                            class="input input-bordered bg-light @error('email') mt-2 text-sm text-red-500 @enderror"
                            value="{{ old('email') }}" />
                        <div class="invalid-feedback">
                            @error('email')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="w-full">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">No. Telepon <span class="text-xs text-red-500">*</span></span>
                        </label>
                        <input type="number" name="phone_number" placeholder="08XXXXXXX"
                            class="input input-bordered bg-light @error('phone_number') mt-2 text-sm text-red-500 @enderror"
                            value="{{ old('phone_number') }}" />
                        <div class="invalid-feedback">
                            @error('business_phone')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">WhatsApp <span class="text-xs text-red-500">*</span></span>
                        </label>
                        <input type="number" name="whatsapp" placeholder="WhatsApp Number"
                            class="input input-bordered bg-light @error('whatsapp') mt-2 text-sm text-red-500 @enderror"
                            value="{{ old('whatsapp') }}" />
                        <div class="invalid-feedback">
                            @error('whatsapp')
                                {{ $message }}
                            @enderror
                        </div>
                    </div>
                </div>

            </div>

            <div class="mt-3">

            </div>

            <div class="form-control">
                <label class="label">
                    <span class="label-text">Provisi <span class="text-xs text-red-500">*</span></span>
                </label>
                <select class="select select-bordered w-full bg-light @error('province') mt-2 text-sm text-red-500 @enderror" name="province" id="province-select">
                    <option disabled selected>Provinsi</option>
                </select>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control city-input hidden">
                <label class="label">
                    <span class="label-text">Kabupaten <span class="text-xs text-red-500">*</span></span>
                </label>
                <select class="select select-bordered w-full bg-light" name="city" id="city-select">
                    <option disabled selected>Kabupaten</option>
                </select>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control district-input hidden">
                <label class="label">
                    <span class="label-text">Kecamatan <span class="text-xs text-red-500">*</span></span>
                </label>
                <select class="select select-bordered w-full bg-light" name="district" id="district-select">
                    <option disabled selected>Kecamatan</option>
                </select>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control urban-village-input hidden">
                <label class="label">
                    <span class="label-text">Kelurahan <span class="text-xs text-red-500">*</span></span>
                </label>
                <select class="select select-bordered w-full bg-light" name="urban_village" id="urban-village-select">
                    <option disabled selected>Kelurahan</option>
                </select>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Alamat <span class="text-xs text-red-500">*</span></span>
                </label>
                <textarea class="textarea textarea-bordered bg-light" placeholder="Alamat" name="address"></textarea>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Keterangan alamat <span class="text-xs text-slate-400">(opsional)</span></span>
                </label>
                <textarea class="textarea textarea-bordered bg-light" placeholder="Kode pos atau lainnya" name="additional_address"></textarea>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control">
                <label class="label">
                    <span class="label-text">Bergabung tanggal <span class="text-xs text-red-500">*</span></span>
                </label>
                <input type="date" name="joined_at" id="" class="input input-bordered bg-light @error('joined_at') is-invalid @enderror"
                value="{{ old('joined_at') }}">
                <div class="invalid-feedback">
                    @error('joined_at')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
        <div class="mt-4 flex justify-end">
            <button type="submit" class="btn bg-primary border-primary hover:bg-primary-dark hover:border-primary-dark shadow-lg text-white" id="store-employee">
                {{-- <button type="button" class="btn btn-info shadow-lg text-white" id="store-employee"> --}}
                Simpan
            </button>
        </div>
    </form>

    @include('employee.scripts.form')
@endsection
