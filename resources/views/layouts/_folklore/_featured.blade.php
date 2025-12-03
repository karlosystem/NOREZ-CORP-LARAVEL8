<!-- start featured-articles -->
<section class="featured-articles section-padding">
    <div class="container-1310">
        <div class="row">
            <div class="col col-xs-12">
                <div class="section-title">
                    <span>Presentaciones de interes</span>
                    <h2>Eventos</h2>
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
            <div class="col col-lg-8">
                <div class="posts">
                    @forelse ($eventos as $evento)
                        <div class="post">
                            <div class="entry-media">
                                @if (file_exists(public_path($evento->cover_image)))
                                    <img src="{{ asset($evento->cover_image) }}">
                                @endif
                            </div>
                            <div class="entry-details">
                                <div class="author">Por: <a href="blog.html">Farnando</a></div>
                                <h4><a href="blog-single.html">{{ $evento->name }}</a></h4>
                                <ul>
                                    <li><a href="blog.html">5 Mins Read</a></li>
                                    <li><a href="blog.html">{{ $evento->created_at->format('j F, Y') }}</a></li>
                                </ul>
                                <p>{!! Str::limit($evento->description, 80, ' ...') !!}</p>
                                <a href="#" class="read-more">Leer mas</a>
                            </div>
                        </div>
                    @empty
                    @endforelse
                </div>
            </div>

            <div class="col col-lg-4">
                <div class="blog-sidebar">
                    <div class="widget about-widget">
                        <div class="img-holder">
                            <img src="{{ asset('vendor/my-folklore/images/blog/about-widget.jpg') }}">
                        </div>
                        <h4>Soraya Blanca Melendez</h4>
                        <span>Blogger</span>
                        <p>Hello, I am in his into a horrible vermin his armour-like back</p>
                        <img src="{{ asset('vendor/my-folklore/images/blog/signature.png') }}">
                    </div>
                    <div class="widget recent-post-widget">
                        <h3>Recent post</h3>
                        <div class="posts">
                            <div class="post">
                                <div class="img-holder">
                                    <img src="{{ asset('vendor/my-folklore/images/recent-posts/img-1.jpg') }}">
                                </div>
                                <div class="details">
                                    <span class="date">29 Apr 2022</span>
                                    <h4><a href="blog-single.html">Magazine and housed in a nice, gilded frame.
                                        </a></h4>
                                </div>
                            </div>
                            <div class="post">
                                <div class="img-holder">
                                    <img src="{{ asset('vendor/my-folklore/images/recent-posts/img-2.jpg') }}">
                                </div>
                                <div class="details">
                                    <span class="date">29 Apr 2022</span>
                                    <h4><a href="#">Transformed in his bed into a horrible
                                            vermin</a></h4>
                                </div>
                            </div>
                            <div class="post">
                                <div class="img-holder">
                                    <img src="{{ asset('vendor/my-folklore/images/recent-posts/img-3.jpg') }}">
                                </div>
                                <div class="details">
                                    <span class="date">29 Apr 2022</span>
                                    <h4><a href="#">Slightly domed & divided Por arches human</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget add-widget">
                        <div>
                            <a href="#">
                                <div class="img-holder">
                                    <img src="{{ asset('vendor/my-folklore/images/blog/sidebar-add-bg.jpg') }}">
                                </div>
                                <div class="details">
                                    {{-- <h4>Slightly domed and divided Por arches into stiff sections</h4> --}}
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="widget tag-widget">
                        <h3>Tags</h3>
                        <ul>
                            <li><a href="#">Personal</a></li>
                            <li><a href="#">Travel agency</a></li>
                            <li><a href="#">Posts</a></li>
                            <li><a href="#">Life style</a></li>
                            <li><a href="#">Beauty</a></li>
                            <li><a href="#">Fashion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end container -->
</section>
<!-- end featured-articles -->
