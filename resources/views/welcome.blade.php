@extends('layout-client.layout')
@section('title', 'Trang chủ')
@section('content')
    <div class="row container" id="wrapper">
        <div class="halim-panel-filter">
            <div id="ajax-filter" class="panel-collapse collapse" aria-expanded="true" role="menu">
                <div class="ajax"></div>
            </div>
        </div>
        {{-- <div class="col-xs-12 carausel-sliderWidget">
            <section id="halim-advanced-widget-4">
                <div class="section-heading">
                    <a href="danhmuc.php" title="Phim Chiếu Rạp">
                        <span class="h-text">Phim Chiếu Rạp</span>
                    </a>
                    <ul class="heading-nav pull-right hidden-xs">
                        <li class="section-btn halim_ajax_get_post" data-catid="4" data-showpost="12"
                            data-widgetid="halim-advanced-widget-4" data-layout="6col"><span data-text="Chiếu Rạp"></span>
                        </li>
                    </ul>
                </div>
                <div id="halim-advanced-widget-4-ajax-box" class="halim_box">

                    <article class="col-md-2 col-sm-4 col-xs-6 thumb grid-item post-38424">
                        <div class="halim-item">
                            <a class="halim-thumb" href="chitiet.php" title="GÓA PHỤ ĐEN">
                                <figure><img class="lazy img-responsive"
                                        src="https://lumiere-a.akamaihd.net/v1/images/p_blackwidow_disneyplus_21043-1_63f71aa0.jpeg"
                                        alt="GÓA PHỤ ĐEN" title="GÓA PHỤ ĐEN"></figure>
                                <span class="status">HD</span><span class="episode"><i class="fa fa-play"
                                        aria-hidden="true"></i>Vietsub</span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">GÓA PHỤ ĐEN</p>
                                        <p class="original_title">Black Widow</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>


                </div>
            </section>
            <div class="clearfix"></div>
        </div> --}}
        <div id="halim_related_movies-2xx" class="wrap-slider">
            <div class="section-bar clearfix">
                <h3 class="section-title"><span>Hot Movies</span></h3>
            </div>
            <div id="halim_related_movies-2" class="owl-carousel owl-theme related-film">
                @foreach ($movies_feature as $feature)
                    <article class="thumb grid-item post-38498">
                        <div class="halim-item">
                            <a class="halim-thumb" href="{{ route('movie.detail',$feature->slug) }}" title="Đại Thánh Vô Song">
                                <figure><img class="lazy img-responsive"
                                        src="{{ $feature->image }}" alt="{{ $feature->title }}"
                                       title="{{ $feature->title }}"></figure>
                                <span class="status">{{ $feature->subtitles }}</span><span class="episode"><i class="fa fa-play"
                                        aria-hidden="true"></i>{{ $feature->definition }}</span>
                                <div class="icon_overlay"></div>
                                <div class="halim-post-title-box">
                                    <div class="halim-post-title ">
                                        <p class="entry-title">{{ $feature->title }}</p>
                                        <p class="original_title">{{ $feature->title_eng }}</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </article>
                @endforeach
            </div>
            <script>
                $(document).ready(function($) {
                    var owl = $('#halim_related_movies-2');
                    owl.owlCarousel({
                        loop: true,
                        margin: 4,
                        autoplay: true,
                        autoplayTimeout: 4000,
                        autoplayHoverPause: true,
                        nav: true,
                        navText: ['<i class="hl-down-open rotate-left"></i>',
                            '<i class="hl-down-open rotate-right"></i>'
                        ],
                        responsiveClass: true,
                        responsive: {
                            0: {
                                items: 2
                            },
                            480: {
                                items: 3
                            },
                            600: {
                                items: 4
                            },
                            1000: {
                                items: 5
                            }
                        }
                    })
                });
            </script>
        </div>
        <main id="main-contents" class="col-xs-12 col-sm-12 col-md-8">
            @foreach ($categories as $category)
                <section id="halim-advanced-widget-2">
                    <div class="section-heading">
                        <a href="{{ route('category', $category->slug) }}" title="Phim Bộ">
                            <span class="h-text">{{ $category->title }}</span>
                        </a>
                        {{-- detail --}}
                    </div>
                    <div id="halim-advanced-widget-2-ajax-box" class="halim_box">
                        @foreach ($category->movies as $movie)
                            <article class="col-md-3 col-sm-3 col-xs-6 thumb grid-item post-37606">
                                <div class="halim-item">
                                    <a class="halim-thumb" href="{{ route('movie.detail', $movie->slug) }}">
                                        <figure><img class="lazy img-responsive" src="{{ url($movie->image) }}"
                                                alt="{{ $movie->title }}" title="{{ $movie->title }}">
                                        </figure>
                                        <span class="status">TẬP 15</span><span class="episode"><i class="fa fa-play"
                                                aria-hidden="true"></i>{{ $movie->subtitles }}</span>
                                        <div class="icon_overlay"></div>
                                        <div class="halim-post-title-box">
                                            <div class="halim-post-title ">
                                                <p class="entry-title">{{ $movie->title }}</p>
                                                <p class="original_title">
                                                    {{ $movie->title_eng }}
                                                </p>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </section>
            @endforeach
            <div class="text-center">
                {{-- <ul class='page-numbers'>
                    <li><span aria-current="page" class="page-numbers current">1</span></li>
                    <li><a class="page-numbers" href="">2</a></li>
                    <li><a class="page-numbers" href="">3</a></li>
                    <li><span class="page-numbers dots">&hellip;</span></li>
                    <li><a class="page-numbers" href="">55</a></li>
                    <li><a class="next page-numbers" href=""><i class="hl-down-open rotate-right"></i></a></li>
                </ul> --}}
            </div>
            <div class="clearfix"></div>
        </main>
        <aside id="sidebar" class="col-xs-12 col-sm-12 col-md-4">
            <div id="halim_tab_popular_videos-widget-7" class="widget halim_tab_popular_videos-widget">
                <div class="section-bar clearfix">
                    <div class="section-title">
                        <span>Top Views</span>
                        <ul class="halim-popular-tab" role="tablist">
                            <li role="presentation" class="active">
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                    data-type="today">Day</a>
                            </li>
                            <li role="presentation">
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                    data-type="week">Week</a>
                            </li>
                            <li role="presentation">
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                    data-type="month">Month</a>
                            </li>
                            <li role="presentation">
                                <a class="ajax-tab" role="tab" data-toggle="tab" data-showpost="10"
                                    data-type="all">All</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <section class="tab-content">
                    <div role="tabpanel" class="tab-pane active halim-ajax-popular-post">
                        <div class="halim-ajax-popular-post-loading hidden"></div>
                        <div id="halim-ajax-popular-post" class="popular-post">
                            <div class="item post-37176">
                                <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                            class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                            title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                        <span class="is_trailer">Trailer</span>
                                    </div>
                                    <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="item post-37176">
                                <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                            class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                            title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                        <span class="is_trailer">Trailer</span>
                                    </div>
                                    <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="item post-37176">
                                <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                            class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                            title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                        <span class="is_trailer">Trailer</span>
                                    </div>
                                    <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="item post-37176">
                                <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                            class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                            title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                        <span class="is_trailer">Trailer</span>
                                    </div>
                                    <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="item post-37176">
                                <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                            class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                            title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                        <span class="is_trailer">Trailer</span>
                                    </div>
                                    <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="item post-37176">
                                <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                            class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                            title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                        <span class="is_trailer">Trailer</span>
                                    </div>
                                    <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="item post-37176">
                                <a href="chitiet.php" title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ">
                                    <div class="item-link">
                                        <img src="https://ghienphim.org/uploads/GPax0JpZbqvIVyfkmDwhRCKATNtLloFQ.jpeg?v=1624801798"
                                            class="lazy post-thumb" alt="CHỊ MƯỜI BA: BA NGÀY SINH TỬ"
                                            title="CHỊ MƯỜI BA: BA NGÀY SINH TỬ" />
                                        <span class="is_trailer">Trailer</span>
                                    </div>
                                    <p class="title">CHỊ MƯỜI BA: BA NGÀY SINH TỬ</p>
                                </a>
                                <div class="viewsCount" style="color: #9d9d9d;">3.2K lượt xem</div>
                                <div style="float: left;">
                                    <span class="user-rate-image post-large-rate stars-large-vang"
                                        style="display: block;/* width: 100%; */">
                                        <span style="width: 0%"></span>
                                    </span>
                                </div>
                            </div>


                        </div>
                    </div>
                </section>
                <div class="clearfix"></div>
            </div>
        </aside>
    </div>
@endsection
