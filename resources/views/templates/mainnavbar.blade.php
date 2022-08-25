<!-- Main navbar -->
<div class="navbar navbar-expand-md navbar-dark">
    <div class="navbar-brand">
        <a href="index.html" class="d-inline-block">
            <img src="../../../../global_assets/images/logo_light.png" alt="">
        </a>
    </div>

    <div class="d-md-none">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-mobile">
            <i class="icon-tree5"></i>
        </button>
        <button class="navbar-toggler sidebar-mobile-main-toggle" type="button">
            <i class="icon-paragraph-justify3"></i>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-mobile">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="#" class="navbar-nav-link sidebar-control sidebar-main-toggle d-none d-md-block">
                    <i class="icon-paragraph-justify3"></i>
                </a>
            </li>


        </ul>

        <span class="navbar-text ml-md-3 mr-md-auto">
        </span>

        <ul class="navbar-nav">


            <li class="nav-item dropdown dropdown-user">
                <a href="#" class="navbar-nav-link dropdown-toggle" data-toggle="dropdown">
                    <img src="{{asset('global_assets/images/accepted.png')}}" class="rounded-circle"
                        alt="">
                    <span>{{ auth()->user()->name }}</span>
                </a>

                <div class="dropdown-menu dropdown-menu-right">

                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();"><i class="icon-switch2"></i>
                        {{ __('Logout') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </div>
            </li>
        </ul>
    </div>
</div>
<!-- /main navbar -->