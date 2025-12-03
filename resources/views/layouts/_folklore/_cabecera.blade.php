<header id="header" class="site-header header-style-1">
    <div class="topbar">
        <div class="container-full">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="inner clearfix">
                        <div class="left-link">
                            <ul>
                                @auth
                                    <li>{{ auth()->user()->name }}</li>
                                    <li><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();document.getElementById('logout-form').submit();">Salir</a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @else
                                    <li><a href="{{ route('login') }}">Login</a></li>
                                @endauth
                            </ul>
                        </div>
                        <div class="social-link">
                            <ul>
                                <li><a href="#"><i class="ti ti-facebook"></i></a></li>
                                <li><a href="#"><i class="ti ti-twitter-alt"></i></a></li>
                                <li><a href="#"><i class="ti ti-pinterest-alt"></i></a></li>
                                <li><a href="#"><i class="ti ti-vimeo-alt"></i></a></li>
                                <li><a href="#"><i class="ti ti-flickr-alt"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end container-1310 -->
    </div>

    <!-- Navigation:start -->
    @include('layouts._folklore._navbar')
    <!-- Navigation:end -->

</header>
