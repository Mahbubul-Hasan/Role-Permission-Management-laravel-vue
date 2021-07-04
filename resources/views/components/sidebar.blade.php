<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Stisla</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">St</a>
        </div>
        <ul class="sidebar-menu">
            @can('Dashboard')
            <li><router-link class="nav-link" :to="{ name: 'home'}"><i class="fas fa-fire"></i><span>Dashboard</span></router-link></li>
            @endcan
            <li class="dropdown">
                <a href="javascript:void(0)" class="nav-link has-dropdown"><i class="fas fa-user-shield"></i><span>User Management</span></a>
                <ul class="dropdown-menu">
                    @can('Role list')
                    <li><router-link class="nav-link" :to="{ name: 'roles'}">Role</router-link></li>
                    @endcan
                    @can('User list')
                    <li><router-link class="nav-link" :to="{ name: 'users'}">User</router-link></li>
                    @endcan
                </ul>
            </li>
        </ul>
    </aside>
</div>
