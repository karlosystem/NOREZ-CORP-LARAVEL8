 <!-- start trending-articles-section -->
 <section class="trending-articles-section section-padding">
     <div class="container-1310">
         <div class="row">
             <div class="col col-xs-12">
                 <div class="section-title">
                     <span>Folklore peruano</span>
                     <h2>noticias</h2>
                     <a href="blog.html" class="theme-btn">
                         Ver más
                         <svg xmlns="http://www.w3.org/2000/svg" width="33" height="13" viewBox="0 0 33 13">
                             <g transform="translate(-1585 -1152)">
                                 <g data-name="Polygon 2" transform="translate(1618 1152) rotate(90)" fill="none">
                                     <path d="M6.5,0,13,11H0Z" stroke="none" />
                                     <path
                                         d="M 6.5 1.965688705444336 L 1.75245189666748 10 L 11.24754810333252 10 L 6.5 1.965688705444336 M 6.5 9.5367431640625e-07 L 13 11 L 0 11 L 6.5 9.5367431640625e-07 Z"
                                         stroke="none" fill="#18171C" />
                                 </g>
                                 <rect data-name="Rectangle 46" width="22" height="1"
                                     transform="translate(1585 1158)" fill="#18171C" />
                             </g>
                         </svg>
                     </a>
                 </div>
             </div>
         </div>

         <div class="row">
             <div class="col col-xs-12">
                 <div class="trending-articles-grids clearfix">
                     @forelse ($noticias as $noticia)
                         <div class="grid">
                             <div class="entry-media">
                                 @if (file_exists(public_path($noticia->cover_image)))
                                     <img src="{{ asset($noticia->cover_image) }}">
                                 @endif
                                 <button>Liftstyle</button>
                             </div>
                             <div class="entry-details">
                                 <div class="author">Por: <a href="blog.html">Soraya</a></div>
                                 <h4><a href="#">
                                         {{ $noticia->name }}
                                     </a>
                                 </h4>
                                 <ul>
                                     <li><a href="blog-single.html">3 Mins Read</a></li>
                                     <li><a href="blog-single.html"> {{ $noticia->created_at->format('j F, Y') }}</a>
                                     </li>
                                 </ul>
                             </div>
                         </div>
                     @empty
                     @endforelse
                 </div>
             </div>
         </div>
     </div> <!-- end container -->
 </section>
 <!-- end trending-articles-section -->
