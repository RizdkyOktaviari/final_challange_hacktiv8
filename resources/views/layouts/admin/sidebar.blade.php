<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon">
            <i class="fas fa-user-cog"></i>
        </div>
        <div class="sidebar-brand-text mx-3">  </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item {{Str::contains(Request::fullUrl(), 'home') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('home')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Berita & Postingan
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{Str::contains(Request::fullUrl(), 'categories') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#categoriesli"
            aria-expanded="true" aria-controls="categoriesli">
            <i class="fas fa-folder"></i>
            <span>Kategori</span>
        </a>
        <div id="categoriesli" class="collapse" aria-labelledby="headingProgram"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('kategori_index')}}">Daftar Kategori</a>
                <a class="collapse-item" href="{{route('kategori_create')}}">Tambah Kategori</a>
            </div>
        </div>
    </li>

    <li class="nav-item {{Str::contains(Request::fullUrl(), 'post') ? 'active' : ''}}">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#postli"
            aria-expanded="true" aria-controls="postli">
            <i class="far fa-newspaper"></i>
            <span>Produk</span>
        </a>
        <div id="postli" class="collapse" aria-labelledby="headingProgram"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <a class="collapse-item" href="{{route('produk_index')}}">Daftar Produk</a>
                <a class="collapse-item" href="{{route('produk_create')}}">Tambah Produk</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item {{Str::contains(Request::fullUrl(), 'transactions') ? 'active' : ''}}">
        <a class="nav-link collapsed" data-toggle="collapse" href="#Transaksi" role="button"
        aria-expanded="false" aria-controls="multiCollapseExample1">
            <i class="fas fa-fw fa-folder"></i>
            <span>Transaksi</span>
        </a>
        <div id="Transaksi" class="collapse multi-collapse" >
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Transaksi</h6>
                <a class="collapse-item" href="{{route('admin.transactions.index')}}">List Semua Transaksi</a>
            </div>
        </div>
    </li>
    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>