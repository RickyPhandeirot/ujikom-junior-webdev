<aside
class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3   bg-gradient-info"
id="sidenav-main">

<div class="sidenav-header">
    <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
        aria-hidden="true" id="iconSidenav"></i>
    <a class="navbar-brand m-0" href="{{ route('dashboard') }}">
        <span class="ms-1 font-weight-bold text-white">Selamat Datang</span>
    </a>
</div>


<hr class="horizontal light mt-0 mb-2">

<div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
    <ul class="navbar-nav">

        <li class="nav-item">
            <a class="nav-link text-white " href="{{ route('dashboard') }}">

                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">dashboard</i>
                </div>

                <span class="nav-link-text ms-1">Dashboard</span>
            </a>
        </li>


        <li class="nav-item">
            <a class="nav-link text-white " href="{{route ('pegawai.index') }}">

                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="fas fa-users fa-fw"></i>
                </div>

                <span class="nav-link-text ms-1">Pegawai</span>
            </a>
        </li>


        <li class="nav-item mt-3">
            <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">Account
            </h6>
        </li>

        <li class="nav-item">
            <a class="nav-link text-white" href="{{ route('logout') }}"
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                    <i class="material-icons opacity-10">logout</i>
                </div>
                <span class="nav-link-text ms-1">Sign Out</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </li>



    </ul>
</div>


</aside>
