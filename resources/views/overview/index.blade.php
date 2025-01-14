@extends('base')
@section('title', 'Overview')
@section('content')
    {{-- <div class="py-12">
        <div class=" mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{ __("You're logged in!") }}
                </div>
            </div>
        </div>
    </div> --}}

    <div class="min-h-screen p-6">
        <!-- Header -->
        <div class="mb-6">
            <h1 class="text-3xl font-semibold text-gray-700">Overview</h1>
            <p class="text-gray-500">Ringkasan statistik dan aktivitas terbaru.</p>
        </div>

        <!-- Statistics Cards -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
            <!-- Card 1 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700">Total Transaksi</h2>
                <p class="text-gray-500 mt-1">Jumlah transaksi bulan ini</p>
                <div class="mt-4 text-3xl font-bold text-blue-500">Rp 25,000,000</div>
            </div>
            <!-- Card 2 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700">Pelanggan Baru</h2>
                <p class="text-gray-500 mt-1">Jumlah pelanggan yang bergabung</p>
                <div class="mt-4 text-3xl font-bold text-green-500">120</div>
            </div>
            <!-- Card 3 -->
            <div class="bg-white shadow-md rounded-lg p-6">
                <h2 class="text-xl font-semibold text-gray-700">Produk Terjual</h2>
                <p class="text-gray-500 mt-1">Jumlah produk terjual bulan ini</p>
                <div class="mt-4 text-3xl font-bold text-purple-500">850</div>
            </div>
        </div>

        <!-- Chart Section -->
        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Grafik Penjualan</h2>
            <div class="h-64">
                <!-- Tempatkan grafik Anda di sini (gunakan library seperti Chart.js) -->
                <canvas id="salesChart"></canvas>
            </div>
        </div>

        <!-- Recent Activities Table -->
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold text-gray-700 mb-4">Aktivitas Terbaru</h2>
            <table class="table w-full">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tanggal</th>
                        <th>Aktivitas</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>2024-12-30</td>
                        <td>Transaksi Rp 5,000,000</td>
                        <td><span class="badge badge-success">Sukses</span></td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>2024-12-29</td>
                        <td>Pelanggan Baru</td>
                        <td><span class="badge badge-info">Baru</span></td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2024-12-28</td>
                        <td>Produk Ditambahkan</td>
                        <td><span class="badge badge-warning">Pending</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @include('overview.scripts.index')


@endsection
