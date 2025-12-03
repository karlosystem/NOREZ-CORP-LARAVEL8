@extends('layouts.folklore')

@section('title')
    Artistas
@endsection

@section('content')
    <!-- start page-title-s2 -->
    <section class="page-title-s2">
        <div class="container-1310">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="inner">
                        <h2>Artistas</h2>
                    </div>
                </div>
            </div>
        </div> <!-- end container-1310 -->
    </section>
    <!-- end page-title-s2 -->

    <!-- start shop-main-section -->
    <section class="shop-main-section">
        <div class="container-1310">
            <div class="row">
                <div class="col col-xs-12">
                    <div class="main-inner">


                        <div class="woocommerce-toolbar-top clearfix">
                            <p class="woocommerce-result-count">Showing 1–12 of 70 results</p>
                            <form class="woocommerce-ordering" method="get">
                                <select name="orderby" class="orderby">
                                    <option value="menu_order" selected='selected'>Default sorting</option>
                                    <option value="popularity">Sort by popularity</option>
                                    <option value="rating">Sort by average rating</option>
                                    <option value="date">Sort by newness</option>
                                    <option value="price">Sort by price: low to high</option>
                                    <option value="price-desc">Sort by price: high to low</option>
                                </select>
                                <input type="hidden" name="post_type" value="product" />
                            </form>

                        </div>
                        <div class="shop-grids">
                            @forelse ($artistas as $artista)
                                <div class="grid">
                                    <div class="img-cart">
                                        <div class="img-holder">
                                            @if (file_exists(public_path($artista->thumbnail)))
                                                <img src="{{ asset($artista->thumbnail) }}">
                                            @endif
                                        </div>
                                        <div class="cart-details">
                                            <ul>
                                                <li><a href="#"><i class="ti-eye"></i></a></li>
                                                <li><a href="#"><i class="ti-shopping-cart"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="details">
                                        <h4><a href="shop-single.html">{{ $artista->title }}</a></h4>
                                        {{-- <del>$100</del>
                                        <span class="price">$256</span> --}}
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        </div>
                        <div class="pagination-wrapper pagination-wrapper-left">
                            <ul class="pg-pagination">
                                <li>
                                    <a href="#" aria-label="Previous">
                                        <i class="fi ti-angle-left"></i>
                                    </a>
                                </li>
                                <li class="active"><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li>
                                    <a href="#" aria-label="Next">
                                        <i class="fi ti-angle-right"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div> <!-- end main-inner -->
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div> <!-- end container-1310 -->
    </section>
    <!-- end shop-main-section -->
@endsection
