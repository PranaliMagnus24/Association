<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{url('/admin/dashboard')}}">
      <i class="bi bi-grid"></i>
      <span>Dashboard</span>
    </a>
  </li><!-- End Dashboard Nav -->


  <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-bar-chart"></i><span>Master Settings</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="charts-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{url('admin/membership')}}">
              <i class="bi bi-circle"></i><span>Membership Type</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/technologies')}}">
              <i class="bi bi-circle"></i><span>Technologies</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/tax')}}">
              <i class="bi bi-circle"></i><span>Tax Settings</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/fees')}}">
              <i class="bi bi-circle"></i><span>Fees Settings</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/membershipyear')}}">
              <i class="bi bi-circle"></i><span>Membership Year Settings</span>
            </a>
          </li>

          <li>
            <a href="{{route('setting.index')}}">
              <i class="bi bi-circle"></i><span>General Settings</span>
            </a>
          </li>

          <li>
            <a href="{{route('email.index')}}">
              <i class="bi bi-circle"></i><span>Email Settings</span>
            </a>
          </li>
        </ul>
      </li><!-- End Charts Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Membership</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{ route('member.add') }}">
              <i class="bi bi-circle"></i><span>Register New Member</span>
            </a>
          </li>
          <li>
            <a href="{{ url('admin/membershipform') }}">
              <i class="bi bi-circle"></i><span>Membership list</span>
            </a>
          </li>
          <li>
            <a href="{{ route('companyregister.add')}}">
              <i class="bi bi-circle"></i><span>Register New Company </span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/companylist')}}">
              <i class="bi bi-circle"></i><span>Company list</span>
            </a>
          </li>

        </ul>
      </li>


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
        <i class="bi bi-card-checklist"></i></i><span>C.M.S Pages</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="tables-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
        <li>
            <a href="{{url('admin/cms')}}">
              <i class="bi bi-circle"></i><span>C.M.S</span>
            </a>
          </li>
          <li>
            <a href="{{url('admin/faq')}}">
              <i class="bi bi-circle"></i><span>F.A.Q</span>
            </a>
          </li>
          <li>
            <a href="{{route('committee.index')}}">
              <i class="bi bi-circle"></i><span>Committee</span>
            </a>
          </li>
          <li>
            <a href="{{route('position.index')}}">
              <i class="bi bi-circle"></i><span>Position</span>
            </a>
          </li>
          <li>
            <a href="{{route('gallerylist')}}">
              <i class="bi bi-circle"></i><span>Gallery</span>
            </a>
          </li>
          <li>
            <a href="{{route('imagelisting')}}">
              <i class="bi bi-circle"></i><span>Image</span>
            </a>
          </li>
          <li>
            <a href="{{route('pagelist')}}">
              <i class="bi bi-circle"></i><span>Page</span>
            </a>
          </li>
          <li>
            <a href="{{route('typelist')}}">
              <i class="bi bi-circle"></i><span>CType</span>
            </a>
          </li>
          <li>
            <a href="{{route('categorylist')}}">
              <i class="bi bi-circle"></i><span>Category</span>
            </a>
          </li>
          <li>
            <a href="{{route('subcategorylist')}}">
              <i class="bi bi-circle"></i><span>Sub Category</span>
            </a>
          </li>
          <li>
            <a href="{{route('subsubcategorylist')}}">
              <i class="bi bi-circle"></i><span>Sub Sub Category</span>
            </a>
          </li>
        </ul>
      </li><!-- End Tables Nav -->



  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="{{url('profile')}}">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li> -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('register') }}">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li> -->

  <!-- <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('login') }}">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li> -->


<!--
  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
      <i class="bi bi-file-earmark"></i>
      <span>Blank</span>
    </a>
  </li> -->

</ul>

</aside><!-- End Sidebar-->
