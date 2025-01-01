<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">

  <li class="nav-item">
    <a class="nav-link " href="{{url('/admin')}}">
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
        </ul>
      </li><!-- End Charts Nav -->


      <li class="nav-item">
        <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
          <i class="bi bi-menu-button-wide"></i><span>Membership</span><i class="bi bi-chevron-down ms-auto"></i>
        </a>
        <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
          <li>
            <a href="{{ url('admin/membershipform') }}">
              <i class="bi bi-circle"></i><span>Membership list</span>
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
    <a class="nav-link collapsed" href="{{url('profile')}}">
      <i class="bi bi-person"></i>
      <span>Profile</span>
    </a>
  </li><!-- End Profile Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('register') }}">
      <i class="bi bi-card-list"></i>
      <span>Register</span>
    </a>
  </li><!-- End Register Page Nav -->

  <li class="nav-item">
    <a class="nav-link collapsed" href="{{ route('login') }}">
      <i class="bi bi-box-arrow-in-right"></i>
      <span>Login</span>
    </a>
  </li><!-- End Login Page Nav -->



  <li class="nav-item">
    <a class="nav-link collapsed" href="pages-blank.html">
      <i class="bi bi-file-earmark"></i>
      <span>Blank</span>
    </a>
  </li><!-- End Blank Page Nav -->

</ul>

</aside><!-- End Sidebar-->
