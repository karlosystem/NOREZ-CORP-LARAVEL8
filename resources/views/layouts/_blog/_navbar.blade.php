   <div class="site-top-2">
       <header class="header nav-down" id="header-2">
           <div class="container">
               <div class="row">
                   <div class="logo-area clearfix">
                       <div class="logo col-lg-2 col-md-12">
                           <a href="{{ route('blog.home') }}">
                               <img src="{{ asset('vendor/my-blog/images/logo.png') }}" alt="">
                           </a>
                       </div>
                       <!-- logo end-->
                       <div class="col-lg-10 col-md-12 pull-right">
                           <ul class="top-info unstyled">
                               <li><span class="info-icon"><i class="icon icon-phone3"></i></span>
                                   <div class="info-wrapper">
                                       <p class="info-title">24/7 Atención en Linea</p>
                                       <p class="info-subtitle">{{ $profile->mobile ?? '' }}</p>
                                   </div>
                               </li>
                               <li><span class="info-icon"><i class="icon icon-envelope"></i></span>
                                   <div class="info-wrapper">
                                       <p class="info-title">email</p>
                                       <p class="info-subtitle">{{ $profile->email ?? '' }}</p>
                                   </div>
                               </li>

                           </ul>
                       </div>
                       <!-- Col End-->
                   </div>
                   <!-- Logo Area End-->
               </div>
           </div>
           <!-- Container end-->
           <div class="site-nav-inner site-navigation navigation navdown">
               <div class="container">
                   <nav class="navbar navbar-expand-lg ">
                       <button class="navbar-toggler" type="button" data-toggle="collapse"
                           data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                           aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"><i
                                   class="icon icon-menu"></i></span></button>
                       <!-- End of Navbar toggler-->
                       <div class="collapse navbar-collapse justify-content-start" id="navbarSupportedContent">
                           <ul class="navbar-nav">
                               <li class="nav-item active dropdown">
                                   <a href="{{ route('blog.home') }}">Inicio</a>
                               </li>
                               <!-- li end-->
                               <li class="nav-item dropdown"><a class="nav-link" href="#"
                                       data-toggle="dropdown">Acerca de<i class="fa fa-angle-down"></i></a>
                                   <ul class="dropdown-menu" role="menu">
                                       @forelse ($contenidos_menu as $menu_contenido)
                                           <li>
                                            <a href="{{ route('blog.paginas.contenidos', ['slug' => $menu_contenido->slug]) }}">{{ $menu_contenido->title }}                                                
                                            </a>
                                           </li>
                                       @empty
                                       @endforelse
                                   </ul>
                               </li>
                               <!-- li end-->
                               <li class="nav-item dropdown">
                                   <a href="{{ route('eventos.mostrar') }}">Proyectos</a>
                               </li>
                               <!-- li end-->
                               <li class="nav-item dropdown"><a class="nav-link" href="{{ route('servicios.mostrar') }}"
                                       data-toggle="dropdown">Servicios<i class="fa fa-angle-down"></i></a>
                                   <ul class="dropdown-menu" role="menu">
                                       @forelse ($servicios_menu as $menu_servicio)
                                           <li><a
                                                   href="{{ route('blog.articulos.categorias', ['slug' => $menu_servicio->slug]) }}">{{ $menu_servicio->title }}</a>
                                           </li>
                                       @empty
                                       @endforelse
                                   </ul>
                               </li>
                               <!-- li end-->
                               <li class="nav-item dropdown">
                                   <a href="{{ route('clientes.index') }}">Clientes</a>
                               </li>

                               <li class="nav-item dropdown">
                                   <a href="{{ route('formas.index') }}">Formas de Pago</a>
                               </li>

                               <!-- li end-->
                               <li class="nav-item dropdown">
                                   <a href="{{ route('album.mostrar') }}">Galeria</a>
                               </li>
                               <!-- li end-->
                               <li class="nav-item dropdown">
                                   <a href="{{ route('contacto.index') }}">Contácto</a>
                               </li>
                           </ul>
                           <!--Nav ul end-->
                       </div>
                       <a href="https://api.whatsapp.com/send?phone=51981296614&text=Hola%2C%20te%20escribo%20desde%20la%20pagina%20web%20de%20norez%20corp%2C%20necesito%20informacion%20de%20tus%20servicios%20y%20costos%2C%20gracias" class="btn btn-success top-right-btn"
                           style="background-color:#25D366; border-color:#25D366;">
                           <i class="fa fa-whatsapp" style="margin-right:8px; color:white;"></i>
                           Chat en Vivo
                       </a>
                       <!-- Top bar btn -->
                   </nav>
                   <!-- Collapse end-->
               </div>
           </div>
           <!-- Site nav inner end-->
       </header>
       <!-- Header end-->
   </div>
