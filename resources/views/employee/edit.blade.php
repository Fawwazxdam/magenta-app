@extends('base')
@section('title', 'Ubah Karyawan')
@section('content')
    @include('employee.scripts.form')
    <div class="breadcrumbs mb-6">
        <ul class="text-xl text-ash">
            <li></li>
            <li>Karyawan</li>
            <li>Ubah</li>
            <li>{{$employee->name}}</li>
        </ul>
    </div>
    {{-- {{dd($employee)}} --}}
    <form action="{{ route('employee.update', $employee->uuid) }}" id="employee-form" method="POST">
        @csrf
        <div class="card bg-white shadow-xl p-5">
            <div class="flex gap-5">
                <div class="w-full">
                    <div class="form-control">
                        <label class="label">
                            <span class="label-text">Nama <span class="text-xs text-red-500">*</span></span>
                        </label>
                        <input type="text" name="name" placeholder="Nama"
                            class="input input-bordered bg-slate-100 @error('name') is-invalid @enderror"
                            value="{{ $employee->name }}" />
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
                            class="input input-bordered bg-slate-100 @error('email') mt-2 text-sm text-red-500 @enderror"
                            value="{{ $employee->email }}" />
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
                            class="input input-bordered bg-slate-100 @error('phone_number') mt-2 text-sm text-red-500 @enderror"
                            value="{{ $employee->phone_number }}" />
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
                            class="input input-bordered bg-slate-100 @error('whatsapp') mt-2 text-sm text-red-500 @enderror"
                            value="{{ $employee->whatsapp }}" />
                        <div class="invalid-feedback">
                            @error('business_phone')
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
                <select class="select select-bordered w-full bg-slate-100 @error('province') mt-2 text-sm text-red-500 @enderror" name="province" id="province-select">
                    <option selected>{{explode('-', $employee->province)[1]}}</option>
                </select>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control city-input">
                <label class="label">
                    <span class="label-text">Kabupaten <span class="text-xs text-red-500">*</span></span>
                </label>
                <select class="select select-bordered w-full bg-slate-100" name="city" id="city-select">
                    <option selected>{{ explode('-', $employee->city)[1] }}</option>
                </select>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control district-input">
                <label class="label">
                    <span class="label-text">Kecamatan <span class="text-xs text-red-500">*</span></span>
                </label>
                <select class="select select-bordered w-full bg-slate-100" name="district" id="district-select">
                    <option selected>{{explode('-', $employee->district)[1]}}</option>
                </select>
                <div class="invalid-feedback">
                    @error('business_phone')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="form-control urban-village-input">
                <label class="label">
                    <span class="label-text">Kelurahan <span class="text-xs text-red-500">*</span></span>
                </label>
                <select class="select select-bordered w-full bg-slate-100" name="urban_vilage" id="urban-village-select">
                    <option selected>{{explode('-', $employee->urban_village)[1]}}</option>
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
                <textarea class="textarea textarea-bordered bg-slate-100" placeholder="Alamat" name="address">{{$employee->address}}</textarea>
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
                <textarea class="textarea textarea-bordered bg-slate-100" placeholder="Kode pos atau lainnya" name="additional_address">{{$employee->additional_address}}</textarea>
                <div class="invalid-feedback">
                    @error('business_phone')
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
@endsection
