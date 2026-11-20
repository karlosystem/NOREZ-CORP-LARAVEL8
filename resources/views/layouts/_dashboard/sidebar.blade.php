<nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
    <div class="sb-sidenav-menu">
        <div class="nav">
            <a class="nav-link {{ set_active('dashboard.index') }}" href="{{ route('dashboard.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tachometer-alt"></i>
                </div>
                {{ trans('dashboard.link.dashboard') }}
            </a>

            {{-- Configuracion --}}
            <a class="nav-link" href="{{ route('profiles.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-ambulance"></i>
                </div>
                Configuration
            </a>

            {{-- Banners --}}
            <a class="nav-link {{ set_active(['sliders.index', 'sliders.create', 'sliders.edit', 'sliders.show']) }}"
                href="{{ route('sliders.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="far fa-image"></i>
                </div>
                Sliders
            </a>

             {{-- Contenidos --}}
            <a class="nav-link {{ set_active(['contenidos.index', 'contenidos.create', 'contenidos.edit', 'contenidos.show']) }}"
                href="{{ route('contenidos.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="far fa-image"></i>
                </div>
                Contenidos
            </a>


            {{-- album de fotos --}}

            <a class="nav-link {{ set_active(['albums.index', 'albums.create', 'albums.edit', 'albums.show']) }}"
                href="{{ route('albums.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-camera-retro"></i>
                </div>
                Fotos de Proyectos
            </a>

            {{-- videos youtube --}}
            <a class="nav-link {{ set_active(['videos.index', 'videos.create', 'videos.edit']) }}"
                href="{{ route('videos.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fab fa-youtube"></i>
                </div>
                Clientes y Testimonios
            </a>

            {{-- Noticias --}}
            <a class="nav-link {{ set_active(['noticias.index', 'noticias.create', 'noticias.edit', 'noticias.show']) }}"
                href="{{ route('noticias.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="far fa-newspaper"></i>
                </div>
                Noticias
            </a>

            {{-- Eventos --}}
            <a class="nav-link {{ set_active(['eventos.index', 'eventos.create', 'eventos.edit', 'eventos.show']) }}"
                href="{{ route('eventos.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                Proyectos
            </a>

             {{-- Servicios --}}
            <a class="nav-link {{ set_active(['servicios.index', 'servicios.create', 'servicios.edit', 'servicios.show']) }}"
                href="{{ route('servicios.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                Servicios
            </a>

            
            {{-- Articulos --}}
           <a class="nav-link {{ set_active(['articulos.index', 'articulos.create', 'articulos.edit', 'articulos.show']) }}"
                href="{{ route('articulos.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-chalkboard-teacher"></i>
                </div>
                Articulos
            </a>


            {{-- tags --}}
            <a class="nav-link {{ set_active(['tags.index', 'tags.create', 'tags.edit']) }}"
                href="{{ route('tags.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-tags"></i>
                </div>
                {{ trans('dashboard.link.tags') }}
            </a>

            {{-- contactenos --}}
            <a class="nav-link" href="{{ route('contactenos.lista') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-address-card"></i>
                </div>
                Contactenos
            </a>


            <div class="sb-sidenav-menu-heading">{{ trans('dashboard.menu.user_permission') }}</div>

            {{-- users --}}
            <a class="nav-link {{ set_active(['users.index', 'users.create', 'users.edit']) }}"
                href="{{ route('users.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-user"></i>
                </div>
                {{ trans('dashboard.link.users') }}
            </a>
            <a class="nav-link {{ set_active(['roles.index', 'roles.show', 'roles.create', 'roles.edit']) }}"
                href="{{ route('roles.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-user-shield"></i>
                </div>
                {{ trans('dashboard.link.roles') }}
            </a>
            <div class="sb-sidenav-menu-heading">{{ trans('dashboard.menu.setting') }}</div>
            <a class="nav-link {{ set_active(['filemanager.index']) }}" href="{{ route('filemanager.index') }}">
                <div class="sb-nav-link-icon">
                    <i class="fas fa-photo-video"></i>
                </div>
                {{ trans('dashboard.link.file_manager') }}
            </a>
        </div>
    </div>
    <div class="sb-sidenav-footer">
        <div class="small">{{ trans('dashboard.label.logged_in_as') }} </div>
        {{ Auth::user()->name }}
    </div>
</nav>
