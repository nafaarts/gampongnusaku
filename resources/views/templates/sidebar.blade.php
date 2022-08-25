<!-- Sidebar content -->
<div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
                <div class="card-body">
                        <div class="media">
                                <div class="mr-3">
                                        <a href="#"><img src="{{asset('global_assets/images/placeholders/accepted.png')}}"
                                                        width="38" height="38" class="rounded-circle" alt=""></a>
                                </div>
                                <div class="media-body">
                                        <div class="media-title font-weight-semibold">{{ auth()->user()->name }}</div>
                                        <div class="font-size-xs opacity-50">
                                                <i class="icon-pin font-size-sm"></i> &nbsp;Gampong Nusa
                                        </div>
                                </div>
                                <div class="ml-3 align-self-center">
                                        <a href="#" class="text-white"><i class="icon-cog3"></i></a>
                                </div>
                        </div>
                </div>
        </div>
        <!-- /user menu -->


        <!-- Main navigation -->
        <div class="card card-sidebar-mobile">
                <ul class="nav nav-sidebar" data-nav-type="accordion">

                        <!-- Main -->
                        <li class="nav-item-header">
                                <div class="text-uppercase font-size-xs line-height-xs">Main</div> <i class="icon-menu"
                                        title="Main"></i>
                        </li>
                        <li class="nav-item">
                                <a href="{{ route('dashboard') }}"
                                        class="nav-link {{ request()->route()->uri() == 'dashboard' ? 'active' : '' }}">
                                        <i class="icon-home4"></i>
                                        <span>
                                                Dashboard
                                        </span>
                                </a>
                        </li>
                        <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-copy"></i> <span>Master</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Master">

                                        <li class="nav-item">
                                                <a href="{{route('jeniswisata.index')}}"
                                                        class="nav-link {{ request()->route()->uri() == 'jeniswisata' ? 'active' : '' }}">Jenis
                                                        Wisata</a>
                                        </li>

                                        <li class="nav-item"><a href="{{ route('gallery.index') }}"
                                                        class="nav-link {{ request()->route()->uri() == 'gallery' ? 'active' : '' }}">Gallery</a>
                                        </li>
                                        <li class="nav-item"><a href="{{ route('sliders.index') }}"
                                                        class="nav-link {{ request()->route()->uri() == 'sliders' ? 'active' : '' }}">Slider</a>
                                        </li>

                                </ul>
                        </li>
                        <li class="nav-item nav-item-submenu">
                                <a href="#" class="nav-link"><i class="icon-briefcase3"></i> <span>Wisata</span></a>

                                <ul class="nav nav-group-sub" data-submenu-title="Master">

                                        <li class="nav-item">
                                                <a href="{{route('wisata.index')}}"
                                                        class="nav-link {{ request()->route()->uri() == 'wisata' ? 'active' : '' }}">Wisata</a>
                                        </li>
                                        <li class="nav-item"><a href="{{route('paketwisata.index')}}"
                                                        class="nav-link {{ request()->route()->uri() == 'paketwisata' ? 'active' : '' }}">Paket</a>
                                        </li>
                                </ul>
                        </li>
                        <li class="nav-item">
                                <a href="{{ route('pemesanan.index') }}"
                                        class="nav-link {{ request()->route()->uri() == 'pemesanan' ? 'active' : '' }}">
                                        <i class="icon-cart"></i>
                                        <span>Pemesanan</span>

                                </a>
                        </li>
                        <li class="nav-item">
                                <a href="{{ route('pembayaran.index') }}" class="nav-link">
                                        <i class="
                                        icon-coins"></i>
                                        <span>Pembayaran</span>

                                </a>
                        </li>
                        <li class="nav-item">
                                <a href="{{ route('pengguna.index') }}" class="nav-link">
                                        <i class="icon-users4"></i>
                                        <span>Pengguna</span>

                                </a>
                        </li>
                        <!-- /main -->



                </ul>
        </div>
        <!-- /main navigation -->

</div>
<div class="success" data-request="{{Session::get('message')}}"></div>

<script>

</script>

<!-- /sidebar content -->