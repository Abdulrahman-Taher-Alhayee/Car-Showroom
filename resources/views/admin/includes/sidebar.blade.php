<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
        <img src="{{ asset('assest/admin/imgs/IMG-20230307-WA0000.jpg') }}" alt="AdminLTE Logo"
            class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">LIFE SOFT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assest/admin/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2"
                    alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->name }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            الصفحة الرئيسية
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('admin.adminpanalsetting.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            الضبط العام
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.treasuiers.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            بيانات الخزن
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                           السيارات
                        </p>
                    </a>
                </li>

                 <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            العملاء
                        </p>
                    </a>
                </li> <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                             الموردين
                        </p>
                    </a>
                </li> <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                             المبيعات
                        </p>
                    </a>
                </li> <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                             المشتريات
                        </p>
                    </a>
                </li>

                 </li> <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                             الموظفون
                        </p>
                    </a>
                </li>

                 </li> <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                             الأقساط
                        </p>
                    </a>
                </li> </li> <li class="nav-item">
                    <a href="{{ route('admin.cars.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                             التقارير
                        </p>
                    </a>
                </li>

            </li> </li> <li class="nav-item">
                <a href="{{ route('admin.cars.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                         الصلاحيات
                    </p>
                </a>
            </li>  </li> </li> <li class="nav-item">
                <a href="{{ route('admin.cars.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                         المستخدمين
                    </p>
                </a>
            </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
