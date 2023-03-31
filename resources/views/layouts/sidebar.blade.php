<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('dashboard')}}" class="app-brand-link">
        <span class="app-brand-logo demo">
          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 4h-3V2h-2v2h-4V2H8v2H5c-1.103 0-2 .897-2 2v14c0 1.103.897 2 2 2h14c1.103 0 2-.897 2-2V6c0-1.103-.897-2-2-2zM5 20V7h14V6l.002 14H5z"></path><path d="M7 9h10v2H7zm0 4h5v2H7z"></path></svg>
        </span>
            <span class="app-brand-text demo menu-text fw-bolder ms-2 text-uppercase">CMF</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        @role('admin')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Master</span>
        </li>
        <li class="menu-item">
            <a href="{{route('users.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account">Users</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{ route('divisis.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Divisi</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('departments.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Department</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('subdepartments.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-collection"></i>
                <div data-i18n="Basic">Subdepartment</div>
            </a>
        </li>
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Role and Permissions</span>
        </li>
        <li class="menu-item">
            <a href="{{route('roles.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-building"></i>
                <div data-i18n="Basic">Roles</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('permissions.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-shield"></i>
                <div data-i18n="Basic">Permissions</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('assign-permissions.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer"></i>
                <div data-i18n="Basic">Assign Permissions</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('assign-users.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-transfer-alt"></i>
                <div data-i18n="Basic">Assign User</div>
            </a>
        </li>
        @endrole
        @role('pic')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">CMF</span>
        </li>
        <li class="menu-item">
            <a href="{{route('cmf.create')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-add-to-queue"></i>
                <div data-i18n="Account">Buat CMF</div>
            </a>
        </li>
        <li class="menu-item">
            <a href="{{route('cmf.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Account">Pengajuan CMF</div>
            </a>
        </li>
        @endrole
        @role('depthead pic')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Depthead PIC</span>
        </li>
        <li class="menu-item">
            <a href="{{route('cmf.pic.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Account">Request Perubahan CMF</div>
            </a>
        </li>
        @endrole
        @role('depthead')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Depthead</span>
        </li>
        <li class="menu-item">
            <a href="{{route('cmf.dept.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Account">Request Perubahan CMF</div>
            </a>
        </li>
        @endrole
        @role('svp system')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">SVP</span>
        </li>
        <li class="menu-item">
            <a href="{{route('cmf.svp.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Account">Request Perubahan CMF</div>
            </a>
        </li>
        @endrole
        @role('mnf')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">MNF</span>
        </li>
        <li class="menu-item">
            <a href="{{route('cmf.mnf.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Account">Request Perubahan CMF</div>
            </a>
        </li>
        @endrole
        @role('mr & food safety team')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">MR</span>
        </li>
        <li class="menu-item">
            <a href="{{route('cmf.mr.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Account">Request Perubahan CMF</div>
            </a>
        </li>
        @endrole
        @role('document control')
        <li class="menu-header small text-uppercase">
            <span class="menu-header-text">Document Control</span>
        </li>
        <li class="menu-item">
            <a href="{{route('cmf.dc.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-task"></i>
                <div data-i18n="Account">Request Perubahan CMF</div>
            </a>
        </li>
        @endrole
        <li class="menu-item">
            <a class="menu-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="menu-icon tf-icons bx bx-log-out"></i>
                <div data-i18n="Basic">Logout</div>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</aside>
