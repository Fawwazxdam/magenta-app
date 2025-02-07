<div class="bg-background shadow-md flex justify-between items-center px-4 py-3">
    <!-- Toggle Sidebar Button -->
    <button id="toggleSidebar" class="text-secondary focus:outline-none">
        <span class="material-icons">menu</span>
    </button>

    <!-- Navbar Right Items -->
    <div class="flex items-center space-x-4">
        <!-- Notification Icon -->
        <div class="relative">
            <button class="text-secondary focus:outline-none">
                <span class="material-icons">notifications</span>
            </button>
            <span class="absolute top-0 right-0 bg-red-500 text-white text-xs rounded-full px-1">

            </span>
        </div>
        <!-- Profile Dropdown -->
        <div class="dropdown dropdown-end">
            <button tabindex="0" class="avatar">
                <div class="w-8 rounded-full">
                    <img src="https://i.pravatar.cc/300" alt="Profile">
                </div>
            </button>
            <ul tabindex="0" class="dropdown-content menu p-2 shadow bg-white rounded-box w-52">
                <li><a href="#">Profile</a></li>
                <li><a href="#">Settings</a></li>
                {{-- <li></li> --}}
                <li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit">Log out</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</div>
