@extends('base')
@section('title', 'Customer')
@section('content')
    <div class="breadcrumbs mb-6">
        <ul class="text-xl text-gray-700">
            <li></li>
            <li>Customer</li>
        </ul>
    </div>

    <div class="card shadow-xl p-5 bg-background">
        <div class="flex justify-between items-center">
            <div class="flex gap-3">
                <input type="text" name="name" id="name"
                    class="input w-full max-w-xs bg-transparent border-2 border-primary hover:border-primary transition"
                    placeholder="Cari Nama" />
                <button
                    class="btn bg-transparent border-primary border-2 hover:bg-primary hover:text-light hover:border-primary "><i
                        class="fa fa-search"></i></button>
            </div>
            <a href="{{ route('customer.add') }}"
                class="btn bg-transparent border-primary border-2 hover:bg-primary hover:border-primary hover:text-light">
                <span class="material-icons">add</span>
                Tambah
            </a>
        </div>
        <table class="table text-dark" id="customer-table">
            <thead class="text-dark">
                <tr>
                    <th width="5%">#</th>
                    <th>Nama</th>
                    <th>No.Telp</th>
                    <th>Alamat</th>
                    <th class="text-center"><span class="material-icons">settings</span></th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>

    <dialog id="deleteCustomer" class="modal">
        <div class="modal-box bg-background">
            <div>
                <div class="h4 text-center">Apakah Anda yakin?</div>
                <div class="text-center">
                    Tindakan ini tidak dapat dibatalkan. Seluruh data terkait pelanggan ini akan terhapus.
                </div>
            </div>
            <div class="modal-action">
                <form method="dialog">
                    <button class="btn bg-light">Batal</button>
                    <a href="#" id="confirmDeleteBtn" class="btn bg-secondary">Hapus</a>
                </form>
            </div>
        </div>
    </dialog>

    @include('customer.scripts.index')
@endsection
