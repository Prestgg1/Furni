<!--begin::Sidebar-->
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
  <!--begin::Sidebar Brand-->
  <div class="sidebar-brand">
    <!--begin::Brand Link-->
    <a href="{{route('admin.dashboard')}}" class="brand-link">
      <!--begin::Brand Image-->
      <img src="{{ asset('backend/assets/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
        class="brand-image opacity-75 shadow" />
      <!--end::Brand Image-->
      <!--begin::Brand Text-->
      <span class="brand-text fw-light">AdminLTE 4</span>
      <!--end::Brand Text-->
    </a>
    <!--end::Brand Link-->
  </div>
  <!--end::Sidebar Brand-->
  <!--begin::Sidebar Wrapper-->
  <div class="sidebar-wrapper">
    <nav class="mt-2">
      <!--begin::Sidebar Menu-->
      <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">

        <li class="nav-item"> <a href="{{route('admin.dashboard')}}" class="nav-link"> <i
              class="nav-icon bi bi-speedometer"></i>
            <p>Dashboard</p>
          </a></li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon bi bi-table"></i>
            <p>
              Tables
              <i class="nav-arrow bi bi-chevron-right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview" style="display: block; box-sizing: border-box;">
            <li class="nav-item"> <a href="{{ route('admin.edit.languages') }}" class="nav-link"> <i
                  class="nav-icon bi bi-circle"></i>
                <p>Languages</p>
              </a> </li>
            <li class="nav-item"> <a href="{{ route('admin.edit.menus') }}" class="nav-link"> <i
                  class="nav-icon bi bi-circle"></i>
                <p>Menus</p>
              </a> </li>
            <li class="nav-item"> <a href="{{ route('admin.edit.blogs') }}" class="nav-link"> <i
                  class="nav-icon bi bi-circle"></i>
                <p>Blogs</p>
            </a> </li>
            <li class="nav-item"> <a href="{{ route('admin.edit.categories') }}" class="nav-link"> <i
                  class="nav-icon bi bi-circle"></i>
                <p>Categories</p>
            </a> </li>
          </ul>
        </li>
      </ul>
      <!--end::Sidebar Menu-->
    </nav>
  </div>
  <!--end::Sidebar Wrapper-->
</aside>
<!--end::Sidebar-->
