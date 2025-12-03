  <!-- start recent-videos-section -->
  <section class="recent-videos-section section-padding">
      <div class="container-1310">
          <div class="row">
              <div class="col col-xs-12">
                  <div class="section-title">
                      <span>videos de interes</span>
                      <h2>videos destacados</h2>

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
              <div class="col col-lg-7">
                  <div class="left-post">
                      <div class="post">
                          <div class="entry-media">
                              <img src="{{ asset($videoPortada->cover_image) }}">
                              <button>Liftstyle</button>
                              <a href="https://www.youtube.com/embed/B6Y1AxsQJZ0" class="video-btn video-btn-s1"
                                  data-type="iframe" tabindex="0">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70"
                                      viewBox="0 0 70 70">
                                      <g transform="translate(-619 -1700)">
                                          <circle data-name="Ellipse 11" cx="35" cy="35" r="35"
                                              transform="translate(619 1700)" fill="#fff" />
                                          <path data-name="Polygon 3" d="M9,0l9,15H0Z"
                                              transform="translate(664.5 1725.5) rotate(90)" />
                                      </g>
                                  </svg>
                              </a>
                          </div>
                          <div class="entry-details">
                              <div class="author">Por: <a href="blog.html">Soraya</a></div>
                              <h4><a href="#">{{ $videoPortada->name }}</a></h4>
                              <ul>
                                  <li><a href="blog.html">5 Mins Read</a></li>
                                  <li><a href="blog.html">{{ $videoPortada->created_at->format('j F, Y') }}</a></li>
                              </ul>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col col-lg-5">
                  <div class="right-post">
                      @forelse ($videoPortadaListado as $listado)
                          <div class="post">
                              <div class="entry-media">
                                  <img src="{{ asset($listado->cover_image) }}">
                                  <a href="{{ $listado->link }}" class="video-btn video-btn-s1" data-type="iframe"
                                      tabindex="0">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="70"
                                          viewBox="0 0 70 70">
                                          <g transform="translate(-619 -1700)">
                                              <circle data-name="Ellipse 11" cx="35" cy="35"
                                                  r="35" transform="translate(619 1700)" fill="#fff" />
                                              <path data-name="Polygon 3" d="M9,0l9,15H0Z"
                                                  transform="translate(664.5 1725.5) rotate(90)" />
                                          </g>
                                      </svg>
                                  </a>
                              </div>
                              <div class="entry-details">
                                  <div class="author">Por: <a href="#">Farnando</a></div>
                                  <h4><a href="blog-single.html">{{ $listado->name }} </a></h4>
                                  <ul>
                                      <li><a href="blog.html">5 Mins Read</a></li>
                                      <li><a href="blog.html">{{ $listado->created_at->format('j F, Y') }}</a></li>
                                  </ul>
                              </div>
                          </div>
                      @empty
                      @endforelse
                  </div>
              </div>
          </div>
      </div> <!-- end container-1310 -->
  </section>
  <!-- end recent-videos-section -->
