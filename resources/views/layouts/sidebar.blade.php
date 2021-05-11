<!-- Sidebar - Brand -->
<a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
    <div class="sidebar-brand-icon rotate-n-15">
    </div>
    <div class="sidebar-brand-text">Managemen Las</div>
    </a>
    
    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    
    @if (checkUserLevel() == 'admin')
        <!-- Nav Item - Dashboard -->
        <li class="nav-item {{Request::is('dashboard*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('dashboard.admin')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>
        
        <hr class="sidebar-divider">
        
        <li class="nav-item {{Request::is('projects*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('projects.admin.index')}}">
            <i class="fas fa-chart-bar"></i>
            <span>Proyek</span></a>
        </li>
        
        <hr class="sidebar-divider">
        
        <li class="nav-item {{Request::is('suppliers*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('suppliers.admin.index')}}">
            <i class="fas fa-shopping-bag"></i>
            <span>Supplier</span></a>
        </li>
        
        <hr class="sidebar-divider">
        
        <li class="nav-item {{Request::is('products*') ? 'active' : ''}}">
        <a class="nav-link" href="{{route('products.admin.index')}}">
            <i class="fas fas fa-layer-group"></i>
            <span>Bahan Baku</span></a>
        </li>
    @endif
    
    <hr class="sidebar-divider d-none d-md-block">