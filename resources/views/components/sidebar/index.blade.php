<div id="sidebar" class="w-64 bg-background shadow-lg border-r-2 transition-all duration-300">
    <div class="p-4 text-center font-bold text-xl text-secondary sidebar-title">
        Magenta App
    </div>
    <ul class="menu p-4 space-y-2 text-primary">
        <li>
            <a href="{{route('overview')}}" class="flex items-center space-x-3 hover:translate-x-3 rounded-md p-2 @if (Request::is('overview') || Request::is('overview/*')) bg-primary text-light font-bold hover:bg-primary hover:text-light @endif">
                <span class="material-icons">dashboard</span>
                <span class="sidebar-menu">Overview</span>
            </a>
        </li>
        <li>
            <a href="{{route('transaction')}}" class="flex items-center space-x-3 hover:translate-x-3 rounded-md p-2 @if (Request::is('transaction') || Request::is('transaction/*')) bg-primary text-light font-bold hover:bg-primary hover:text-light @endif">
                <span class="material-icons">receipt</span>
                <span class="sidebar-menu">Transaksi</span>
            </a>
        </li>
        <li>
            <a href="{{route('product')}}" class="flex items-center space-x-3 hover:translate-x-3 rounded-md p-2 @if (Request::is('product') || Request::is('product/*')) bg-primary text-light font-bold hover:bg-primary hover:text-light @endif">
                <span class="material-icons">inventory_2</span>
                <span class="sidebar-menu">Produk</span>
            </a>
        </li>
        <li>
            <a href="{{route('customer')}}" class="flex items-center space-x-3 hover:translate-x-3 rounded-md p-2 @if (Request::is('customer') || Request::is('customer/*')) bg-primary text-light font-bold hover:bg-primary hover:text-light @endif">
                <span class="material-icons">group</span>
                <span class="sidebar-menu">Pelanggan</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center space-x-3 hover:translate-x-3 rounded-md p-2">
                <span class="material-icons">local_shipping</span>
                <span class="sidebar-menu">Armada</span>
            </a>
        </li>
        <li>
            <a href="{{route('employee')}}" class="flex items-center space-x-3 hover:translate-x-3 rounded-md p-2">
                <span class="material-icons">person</span>
                <span class="sidebar-menu">Pengguna</span>
            </a>
        </li>
        <li>
            <a href="#" class="flex items-center space-x-3 hover:translate-x-3 rounded-md p-2">
                <span class="material-icons">analytics</span>
                <span class="sidebar-menu">Laporan</span>
            </a>
        </li>
    </ul>
</div>
