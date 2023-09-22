<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-heartbeat"></i>
        </div>
        <div class="sidebar-brand-text mx-2">Foursichology</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Data
    </div>

    <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('#') }}" data-toggle="collapse" data-target="#laporanTab"
            aria-expanded="true" aria-controls="laporanTab">
            <i class="fas fa-fw fa-paste"></i>
            <span>Laporan</span>
        </a>
        <div id="laporanTab" class="{{ request()->routeIs('report.*') ? 'show' : '' }} collapse"
            aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="collapse-inner rounded bg-white py-2">
                @hasanyrole('super admin|admin')
                    <a class="collapse-item {{ request()->routeIs('report.cancel') ? 'active' : '' }}"
                        href="{{ route('report.cancel') }}">Dibatalkan</a>
                    <a class="collapse-item {{ request()->routeIs('report.pending') ? 'active' : '' }}"
                        href="{{ route('report.pending') }}">Belum Selesai</a>
                    <a class="collapse-item {{ request()->routeIs('report.solve') ? 'active' : '' }}"
                        href="{{ route('report.solve') }}">Sudah Selesai</a>
                @else
                    <a class="collapse-item {{ request()->routeIs('my-report.pending') ? 'active' : '' }}"
                        href="{{ route('my-report.pending') }}">Belum Selesai</a>
                    <a class="collapse-item {{ request()->routeIs('my-report.solve') ? 'active' : '' }}"
                        href="{{ route('my-report.solve') }}">Sudah Selesai</a>
                @endhasanyrole
            </div>
        </div>
    </li>

    @role('admin')
        <li class="nav-item">
            <a class="nav-link" href="{{ url('charts.html') }}">
                <i class="fas fa-fw fa-info-circle"></i>
                <span>Inbox</span>
            </a>
        </li>
    @endrole

    @role('super admin')
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Account
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ url('#') }}" data-toggle="collapse" data-target="#userTab"
                aria-expanded="true" aria-controls="userTab">
                <i class="fas fa-fw fa-user"></i>
                <span>User</span>
            </a>
            <div id="userTab" class="{{ request()->routeIs('account.*') ? 'show' : '' }} collapse"
                aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="collapse-inner rounded bg-white py-2">
                    <a class="collapse-item {{ request()->routeIs('account.admin.*') ? 'active' : '' }}"
                        href="{{ route('account.admin.index') }}">Admin</a>
                    <a class="collapse-item {{ request()->routeIs('account.student.*') ? 'active' : '' }}"
                        href="{{ route('account.student.index') }}">Siswa</a>
                </div>
            </div>
        </li>
    @endrole

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="d-none d-md-inline text-center">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->
    <div class="sidebar-card d-none d-lg-flex">
        <img class="sidebar-card-illustration mb-2" src="{{ asset('admin/img/undraw_rocket.svg') }}" alt="...">
        <p class="mb-2 text-center"><strong>SB Admin Pro</strong> is packed with premium features, components,
            and more!</p>
        <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
            Pro!</a>
    </div>

</ul>
