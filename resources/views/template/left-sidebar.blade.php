<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        {{-- <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div> --}}
        <div class="sidebar-brand-text mx-3">SEM KOMINFO</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item @yield('dashboard')">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item @yield('kategori')">
        <a class="nav-link" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
            aria-controls="collapsePages">
            <i class='bx bx-list-check' style="font-size: 25px"></i>
            <span>Taks</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{ route('periodik.index') }}">
                    {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                    <span>Periode</span></a>
                <a class="collapse-item" href="{{ route('kategori.index') }}">
                    {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                    <span>Kategori</span></a>
                <a class="collapse-item" href="{{ route('sub_kategori.index') }}">
                    {{-- <i class="fas fa-fw fa-tachometer-alt"></i> --}}
                    <span>Sub Kategori</span></a>

                <a class="collapse-item" href="{{ route('evaluasi.index') }}">
                    <span>Evaluasi</span></a>
                <div class="collapse-divider"></div>
            </div>
        </div>
    </li>

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
