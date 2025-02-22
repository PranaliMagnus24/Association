<aside id="sidebar" class="sidebar">

<ul class="sidebar-nav" id="sidebar-nav">
@if(Auth::check())
    @if(Auth::user()->role === 'bazar')
        <!-- Catalog (Only for 'bazar' role) -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#catelouge-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-collection"></i><span>Catalog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="catelouge-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('catalog.list') }}">
                        <i class="bi bi-circle"></i><span>Catalog List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Catalog -->
    @else
        <!-- If role is 'user', display everything including Catalog -->
        <li class="nav-item">
            <a class="nav-link" href="{{url('member')}}">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="{{ route('myaccount')}}">
                <i class="bi bi-person-circle"></i>
                <span>My Account</span>
            </a>
        </li><!-- End Profile Page Nav -->

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="bi bi-image"></i>
                <span>Media Kit</span>
            </a>
        </li><!-- End Media Kit -->

        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#charts-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-briefcase"></i><span>Jobs</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="charts-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{route('job')}}">
                        <i class="bi bi-circle"></i><span>Create Job</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('joblist')}}">
                        <i class="bi bi-circle"></i><span>List Job</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Jobs -->

        <li class="nav-item"><!-- Ads Manager -->
            <a class="nav-link collapsed" data-bs-target="#components-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-signpost"></i><span>Ads Manager</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="components-nav" class="nav-content collapse " data-bs-parent="#sidebar-nav">
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Ads Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="bi bi-circle"></i><span>Ads List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Ads Manager -->

        <!-- Catalog (Also for 'user' role) -->
        <li class="nav-item">
            <a class="nav-link collapsed" data-bs-target="#catelouge-nav" data-bs-toggle="collapse" href="#">
                <i class="bi bi-collection"></i><span>Catalog</span><i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul id="catelouge-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                <li>
                    <a href="{{ route('catalog.list') }}">
                        <i class="bi bi-circle"></i><span>Catalog List</span>
                    </a>
                </li>
            </ul>
        </li><!-- End Catalog -->
    @endif
@endif





</ul>

</aside><!-- End Sidebar-->
