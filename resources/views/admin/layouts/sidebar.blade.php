<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
{{--    <a href="/backend/index3.html" class="brand-link">--}}
{{--        <img src="/backend/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">--}}
{{--        <span class="brand-text font-weight-light">AdminLTE 3</span>--}}
{{--    </a>--}}

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/backend/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                @if(Auth::check())
                <a href="{{ route('admin.profile') }}" class="d-block">{{ Auth::user()->name }}</a>
                    @endif
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="{{route('admin.room.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Quản lý phòng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.room-book.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Quản lý đặt phòng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.employee.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                           Quản lý nhân viên
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('admin.user.index')}}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Quản lý khách hàng
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{route('room_book.statistics')}}" class="nav-link">
                        <i class="nav-icon fas fa-inbox"></i>
                        <p>
                            Thống kê doanh thu
                        </p>
                    </a>
                </li>


            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
