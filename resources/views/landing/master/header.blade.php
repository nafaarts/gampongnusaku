<!--::header part start::-->
<header class="main_menu home_menu">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-lg bg-white navbar-light">
                    <a class="navbar-brand" href="{{ route('index') }}"> <img
                            src="{{ asset('global_assets_landing/img/logo.png') }}" alt="logo"> </a>

                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="menu_icon"><i class="fas fa-bars"></i></span>
                    </button>

                    <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Gampong Nusa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('paket_wisata.index') }}">Paket Wisata</a>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pilihan Wisata
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">
                                    @foreach ($paket_wisata as $item)
                                    <a class="dropdown-item" href="{{ route('category-wisata.index',$item->id) }}"> {{
                                        $item->nama }}</a>
                                    @endforeach

                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('dokumentasi.index') }}">Aktivitas</a>
                            </li>

                            @auth
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_3" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Pemesanan
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_2">
                                    <a class="dropdown-item" href="{{ route('pemesanan-bb.index') }}"> Belum Bayar</a>
                                    <a class="dropdown-item" href="{{ route('pemesanan-selesai.index') }}"> Selesai</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('cart.index') }}">
                                    <i class="fas fa-cart-plus"></i>
                                    <span class="font-weight-bold text-danger" id="countCart">{{ $count_keranjang
                                        }}</span>
                                </a>
                            </li>
                            @endauth

                        </ul>
                    </div>
                    <div class="hearer_icon d-flex">

                        @auth
                        <ul class="navbar-nav">

                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="blog.html" id="navbarDropdown_1" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-user"></i> {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown_1">

                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        </ul>

                        @else
                        <a class="nav-link" href="{{ route('login') }}">Login/Register</a>

                        @endauth
                    </div>
                </nav>
            </div>
        </div>
    </div>
</header>
<!-- Header part end-->