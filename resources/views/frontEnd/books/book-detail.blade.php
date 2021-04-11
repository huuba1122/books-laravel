{{--<!DOCTYPE html>--}}
{{--<html lang="zxx">--}}

{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="description" content="Anime Template">--}}
{{--    <meta name="keywords" content="Anime, unica, creative, html">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <meta http-equiv="X-UA-Compatible" content="ie=edge">--}}
{{--    <title>Anime | Template</title>--}}

{{--    <!-- Google Font -->--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400;500;600;700&display=swap" rel="stylesheet">--}}
{{--    <link href="https://fonts.googleapis.com/css2?family=Mulish:wght@300;400;500;600;700;800;900&display=swap"--}}
{{--          rel="stylesheet">--}}

{{--    <!-- Css Styles -->--}}
{{--    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">--}}
{{--    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">--}}
{{--    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">--}}
{{--    <link rel="stylesheet" href="css/plyr.css" type="text/css">--}}
{{--    <link rel="stylesheet" href="css/nice-select.css" type="text/css">--}}
{{--    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">--}}
{{--    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">--}}
{{--    <link rel="stylesheet" href="css/style.css" type="text/css">--}}
{{--</head>--}}
@extends('frontEnd.master')

@section('title')
    Book detail
@endsection
@section('CSS')
@endsection
@section('search')
    <li class="col-5">
        <div class="row">

            <form action="{{route('home.search-books')}}" method="post">
                @csrf
                <div style="display: inline-flex; align-items: center">
                    <div>
                        <input type="text" style="width: 150px" required name="search_book" placeholder="search">
                    </div>
                    <div>
                        <button type="submit" style="font-size: 18px"><i class="fa fa-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </li>
@endsection
@section('content')
{{--    <body>--}}
{{--    <!-- Page Preloder -->--}}
{{--    <div id="preloder">--}}
{{--        <div class="loader"></div>--}}
{{--    </div>--}}

{{--    <!-- Header Section Begin -->--}}
{{--    <header class="header">--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-2">--}}
{{--                    <div class="header__logo">--}}
{{--                        <a href="./index.html">--}}
{{--                            <img src="img/logo.png" alt="">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-8">--}}
{{--                    <div class="header__nav">--}}
{{--                        <nav class="header__menu mobile-menu">--}}
{{--                            <ul>--}}
{{--                                <li class="active"><a href="./index.html">Homepage</a></li>--}}
{{--                                <li><a href="./categories.html">Categories <span class="arrow_carrot-down"></span></a>--}}
{{--                                    <ul class="dropdown">--}}
{{--                                        <li><a href="./categories.html">Categories</a></li>--}}
{{--                                        <li><a href="./anime-details.html">Anime Details</a></li>--}}
{{--                                        <li><a href="./anime-watching.html">Anime Watching</a></li>--}}
{{--                                        <li><a href="./blog-details.html">Blog Details</a></li>--}}
{{--                                        <li><a href="./signup.html">Sign Up</a></li>--}}
{{--                                        <li><a href="./login.html">Login</a></li>--}}
{{--                                    </ul>--}}
{{--                                </li>--}}
{{--                                <li><a href="./blog.html">Our Blog</a></li>--}}
{{--                                <li><a href="#">Contacts</a></li>--}}
{{--                            </ul>--}}
{{--                        </nav>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-2">--}}
{{--                    <div class="header__right">--}}
{{--                        <a href="#" class="search-switch"><span class="icon_search"></span></a>--}}
{{--                        <a href="./login.html"><span class="icon_profile"></span></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div id="mobile-menu-wrap"></div>--}}
{{--        </div>--}}
{{--    </header>--}}
{{--    <!-- Header End -->--}}

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <a href="./categories.html">Categories</a>
                        <span>Romance</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->

    <!-- Anime Section Begin -->
    <section class="anime-details spad">
        <div class="container">
            <div class="anime__details__content">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="anime__details__pic set-bg" data-setbg="{{asset('/storage/'.$book->image)}}">
                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="anime__details__text">
                            <div class="anime__details__title">
                                <h3>{{$book->name}}</h3>
                            </div>
                            <div class="anime__details__rating">
                                <div class="rating">
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star"></i></a>
                                    <a href="#"><i class="fa fa-star-half-o"></i></a>
                                </div>
                                <span>1.029 Votes</span>
                            </div>
{{--                            <p>Every human inhabiting the world of Alcia is branded by a “Count” or a number written on--}}
{{--                                their body. For Hina’s mother, her total drops to 0 and she’s pulled into the Abyss,--}}
{{--                                never to be seen again. But her mother’s last words send Hina on a quest to find a--}}
{{--                                legendary hero from the Waste War - the fabled Ace!</p>--}}
                            <div class="anime__details__widget">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6">
                                        <ul>
                                            <li><span>ISBN:</span> {{$book->isbn ?? ''}}</li>
                                            <li><span>Category:</span> {{$book->category->name}}</li>
                                            <li><span>Author:</span>
                                            @foreach($book->authors as $author)
                                                {{$author->name . ', '}}
                                                @endforeach
                                            </li>
                                            <li><span>Page:</span> {{$book->page_number ?? ''}}</li>
                                            <li><span>Height:</span> {{$book->height ?? ''}}</li>
                                            <li><span>Price</span>{{$book->price ?? ''}}</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="anime__details__btn">
                                <div class="comment" style="width: 300px; height: 50px; border-radius: 5px; align-items: center">
                                    <a  href="#" data-url="{{route('cart.add', $book->id)}}" class="btn btn-danger text-white add-to-cart"><i class="fa fa-shopping-cart"></i> Add to
                                        cart</a>
                                </div>
{{--                                <a href="#" class="watch-btn"><span>Watch Now</span> <i--}}
{{--                                        class="fa fa-angle-right"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="anime__details__form">
                        <div class="section-title">
                            <h5>Content</h5>
                        </div>

                        <form action="#" style="background-color: white">
                            <div style="color: white; z-index: 99; margin-left: 10px;">
                                {!! $book->des !!}
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4">
                    <div class="anime__details__sidebar">
                        <div class="section-title">
                            <h5>you might like...</h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="{{asset('/frontEnd/img/sidebar/tv-1.jpg')}}">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Boruto: Naruto next generations</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="{{asset('/frontEnd/img/sidebar/tv-2.jpg')}}">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="{{asset('/frontEnd/img/sidebar/tv-3.jpg')}}">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Sword art online alicization war of underworld</a></h5>
                        </div>
                        <div class="product__sidebar__view__item set-bg" data-setbg="{{asset('/frontEnd/img/sidebar/tv-4.jpg')}}">
                            <div class="ep">18 / ?</div>
                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                            <h5><a href="#">Fate/stay night: Heaven's Feel I. presage flower</a></h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Anime Section End -->

{{--    <!-- Footer Section Begin -->--}}
{{--    <footer class="footer">--}}
{{--        <div class="page-up">--}}
{{--            <a href="#" id="scrollToTopButton"><span class="arrow_carrot-up"></span></a>--}}
{{--        </div>--}}
{{--        <div class="container">--}}
{{--            <div class="row">--}}
{{--                <div class="col-lg-3">--}}
{{--                    <div class="footer__logo">--}}
{{--                        <a href="./index.html"><img src="img/logo.png" alt=""></a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-6">--}}
{{--                    <div class="footer__nav">--}}
{{--                        <ul>--}}
{{--                            <li class="active"><a href="./index.html">Homepage</a></li>--}}
{{--                            <li><a href="./categories.html">Categories</a></li>--}}
{{--                            <li><a href="./blog.html">Our Blog</a></li>--}}
{{--                            <li><a href="#">Contacts</a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="col-lg-3">--}}
{{--                    <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->--}}
{{--                        Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>--}}
{{--                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </footer>--}}
{{--    <!-- Footer Section End -->--}}

{{--    <!-- Js Plugins -->--}}
{{--    --}}{{--<script src="js/jquery-3.3.1.min.js"></script>--}}
{{--    --}}{{--<script src="js/bootstrap.min.js"></script>--}}
{{--    --}}{{--<script src="js/player.js"></script>--}}
{{--    --}}{{--<script src="js/jquery.nice-select.min.js"></script>--}}
{{--    --}}{{--<script src="js/mixitup.min.js"></script>--}}
{{--    --}}{{--<script src="js/jquery.slicknav.js"></script>--}}
{{--    --}}{{--<script src="js/owl.carousel.min.js"></script>--}}
{{--    --}}{{--<script src="js/main.js"></script>--}}

{{--    </body>--}}
@endsection

@section('js')
    <script>

        function addToCart(event){
            event.preventDefault();
            let url = $(this).data('url');
            // alert(url);
            $.ajax({
                type: "GET",
                url: url,
                dataType: 'JSON',
                success:function (data){
                    if (data.code === 200){
                        $('#total_quantity').html('(' + data.totalQuantity + ')');
                        alert('them san pham thanh cong');
                    }
                }
            });
        }

        $(document).ready(function (){
            $('.add-to-cart').on('click', addToCart);
        });
    </script>
@endsection



{{--</html>--}}
