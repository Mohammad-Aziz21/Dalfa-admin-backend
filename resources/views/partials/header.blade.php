<header id="page-topbar">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box" style="background-color: black;">
                <a href="index.html" class="logo logo-dark">
                                        <span class="logo-sm">

                                            <img src="{{ URL::to('/') }}/{{asset('assets/images/logo.svg')}}" alt="" height="22">
                                        </span>
                    <span class="logo-lg">
                                            <img src="{{ URL::to('/') }}/{{asset('assets/images/logo-dark.png')}}" alt="" height="17">

                </a>

                <a href="index.html" class="logo logo-light">
                                        <span class="logo-sm">

                                            <img src="{{ URL::to('/') }}/{{asset('assets/images/logo-light.svg')}}" alt=""
                                                 height="22">
                                        </span>
{{--                    <span class="logo-lg">--}}
{{--                                            <img src="{{ URL::to('/') }}/{{asset('assets/images/users/image.png')}}" alt="" height="35">--}}

                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 font-size-16 header-item waves-effect"
                    id="vertical-menu-btn">
                <i class="fa fa-fw fa-bars"></i>
            </button>

            <!-- App Search-->
            <form class="app-search d-none d-lg-block">
                <div class="position-relative">
                    <input type="text" class="form-control" placeholder="Search...">
                    <span class="bx bx-search-alt"></span>
                </div>
            </form>
        </div>
        <div class="d-flex">
            <div class="dropdown d-inline-block">
                <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                    <img class="rounded-circle header-profile-user" src="{{ URL::to('/') }}/{{asset('assets/images/users/image.png')}}">

                    <span class="d-none d-xl-inline-block ms-1" key="t-henry">Admin</span>
                    <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                </button>
                <div class="dropdown-menu dropdown-menu-end" style="">
                    <!-- item-->
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}">
                        <i class="bx bx-power-off font-size-16 align-middle me-1 text-danger"></i>
                        <span key="t-logout">Logout</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</header>
