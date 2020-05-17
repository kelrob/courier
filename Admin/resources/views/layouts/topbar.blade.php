<header id="page-topbar">
    <div class="navbar-header">
        <div class="container-fluid">
            <div class="float-right">


                <div class="dropdown d-inline-block">
                    <button type="button" class="btn header-item waves-effect" id="page-header-user-dropdown"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-user-alt fa-1x"></i>
                        <span class="d-none d-xl-inline-block ml-1">{{ $userName }}</span>
                        <i class="mdi mdi-chevron-down d-none d-xl-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item text-danger" href="logout"><i
                                class="bx bx-power-off font-size-16 align-middle mr-1 text-danger"></i> Logout</a>
                    </div>
                </div>


            </div>
            <div>
                <!-- LOGO -->
                <div class="navbar-brand-box">
                    <a href="index" class="logo logo-dark">
                        <span class="logo-sm">
                            <h3 class="text-white mt-3">PGE</h3>
{{--                            <img src="images/logo-sm.png" alt="" height="20">--}}
                        </span>
                        <span class="logo-lg">
                            <h3 class="text-white mt-3">PGE</h3>
{{--                            <img src="images/logo-dark.png" alt="" height="17">--}}
                        </span>
                    </a>

                    <a href="index" class="logo logo-light">
                        <span class="logo-sm">
                            <h3 class="text-white mt-3">PGE</h3>
{{--                            <img src="images/logo-sm.png" alt="" height="20">--}}
                        </span>
                        <span class="logo-lg">
                            <h3 class="text-white mt-3">PGE</h3>
{{--                            <img src="images/logo-light.png" alt="" height="19">--}}
                        </span>
                    </a>
                </div>

                <button type="button" class="btn btn-sm px-3 font-size-16 header-item toggle-btn waves-effect"
                        id="vertical-menu-btn">
                    <i class="fa fa-fw fa-bars"></i>
                </button>

            </div>

        </div>
    </div>
</header>
