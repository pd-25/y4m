<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item {{ Route::is('admin.dashboard') ? 'active' : '' }}">
            <a class="nav-link " href="{{ route('admin.dashboard') }}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse"
                href="#">
                <i class="bi bi-menu-button-wide"></i><span>Leads</span><i
                    class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse {{(Route::is('admin.leads')) ? 'show' : ''}}" data-bs-parent="#sidebar-nav">
                <li>
                    <a class="{{ Route::is('admin.leads') ? 'active' : ''}}" href="{{route('admin.leads', 'membership')}}">
                        <i class="ri-group-fill"></i>
                        <span>Member leads</span>
                    </a>
                </li>

                <li class="">
                    <a class="" href="">
                        <i class="ri-group-fill"></i>
                        <span>Contact Page</span>
                    </a>
                </li>
                
            </ul>
        </li>
        



        <li class="nav-item {{ Route::is('category-mamages.*') ? 'active' : '' }}">
            <a class="nav-link " href="{{route('category-mamages.index')}}">
                <i class="ri-group-fill"></i>
                <span>Categories</span>
            </a>
        </li>

        <li class="nav-item {{ Route::is('product-mamages.*') ? 'active' : '' }}">
            <a class="nav-link " href="{{route('product-mamages.index')}}">
                <i class="ri-group-fill"></i>
                <span>Products</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('orders.*') ? 'active' : '' }}">
            <a class="nav-link " href="{{route('orders.index')}}">
                <i class="ri-group-fill"></i>
                <span>Orders</span>
            </a>
        </li>
        <li class="nav-item {{ Route::is('users.*') ? 'active' : '' }}">
            <a class="nav-link " href="{{route('users.index')}}">
                <i class="ri-group-fill"></i>
                <span>Users</span>
            </a>
        </li>
        
    </ul>

</aside>
