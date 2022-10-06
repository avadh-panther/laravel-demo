<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
      <img src="{{asset('images/shopify.png')}}" alt="AdminLTE Logo" class="brand-image elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light"> My Business</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{asset('images/user.png')}}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Username</a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{route('template')}}" class="nav-link active" data-val='Template'>
              <i class="nav-icon fas fa-clipboard-list"></i>
              <p>
                Template
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{route('store')}}" class="nav-link" data-val='Store'>
              <i class="nav-icon fas fa-store"></i>
              <p>
                Store
              </p>
            </a>
          </li>

          <li class="nav-item">
            <a href="{{ route('create') }}" class="nav-link" data-val='E-mail'>
              <i class="nav-icon fas fa-mail-bulk"></i>
              <p>
                E-mail
              </p>
            </a>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>