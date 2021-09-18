<div class="sidebar-wrapper active">
    <div class="sidebar-header">
        <div class="d-flex justify-content-between">
            <div class="logo">
                <a href="index.html"><img src="{{ asset('admin/assets/images/logo/logo.png') }}" alt="Logo" srcset=""></a>
            </div>
            <div class="toggler">
                <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
            </div>
        </div>
    </div>
    <div class="sidebar-menu">
        <ul class="menu">
            <li class="sidebar-title">Menu</li>
            <li class="sidebar-item @yield('Dashboard') ">
                <a href="{{ route('home') }}" class='sidebar-link'>
                    <i class="bi bi-grid-fill"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('company.index') }}" class='sidebar-link'>
                    <i class="bi bi-house-fill"></i>
                    <span>Company</span>
                </a>
            </li>
            <li class="sidebar-title">Master</li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-egg-fried"></i>
                    <span>Pet</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item @yield('PetCategory')">
                        <a href="{{ route('pet_category.index') }}">Category</a>
                    </li>
                    <li class="submenu-item " @yield('Pet')'>
                        <a href="{{ route('pet.index') }}">Pet</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item  has-sub">
                <a href="#" class='sidebar-link'>
                    <i class="bi bi-archive-fill"></i>
                    <span>Product</span>
                </a>
                <ul class="submenu ">
                    <li class="submenu-item ">
                        <a href="{{ route('product_category.index') }}">Category</a>
                    </li>
                    <li class="submenu-item ">
                        <a href="{{ route('product.index') }}">Product</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item @yield('service')">
                <a href="{{ route('service.index') }}" class='sidebar-link'>
                    <i class="bi bi-card-checklist"></i>
                    <span>Service</span>
                </a>
            </li>
            <li class="sidebar-title">Transaction</li>
            <li class="sidebar-item @yield('service_transaction')">
                <a href="{{ route('service_transaction.index') }}" class='sidebar-link'>
                    <i class="bi bi-card-checklist"></i>
                    <span>Service</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-cart-fill"></i>
                    <span>Order</span>
                </a>
            </li>
            <li class="sidebar-title">User &amp; Role</li>
            <li class="sidebar-item @yield('user')">
                <a href="{{ route('user.index') }}" class='sidebar-link'>
                    <i class="bi bi-people-fill"></i>
                    <span>User</span>
                </a>
            </li>
            <li class="sidebar-item @yield('role')">
                <a href="{{ route('role.index') }}" class='sidebar-link'>
                    <i class="bi bi-lock-fill"></i>
                    <span>Role</span>
                </a>
            </li>
            <li class="sidebar-title">Settings</li>
            <li class="sidebar-item">
                <a href="index.html" class='sidebar-link'>
                    <i class="bi bi-gear-fill"></i>
                    <span>Profil</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="top" title="Logout" class='sidebar-link'>
                    <i class="bi bi-box-arrow-left"></i>
                    <span>Logout</span>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </a>
            </li>
        </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
</div>
