@extends('frontEnd.master')

@section('title')
    home
@endsection
@section('CSS')
@endsection
@section('search')
    <li class="col-5">
        <div class="row">

            <form action="" >
                <div style="display: inline-flex; align-items: center">
                    <div>
                        <input type="text" style="width: 150px">
                    </div>
                    <div>
                        <a style="font-size: 18px"><i class="fa fa-search"></i></a>
                    </div>
                </div>
            </form>
        </div>
    </li>
@endsection
@section('slider')
    <section class="hero">
        <div class="container">
            <div class="hero__slider owl-carousel">
                <div class="hero__items set-bg" data-setbg="{{asset('/frontEnd/img/hero/hero-1.jpg')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                {{--                            <div class="label">Adventure</div>--}}
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                {{--                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{asset('/frontEnd/img/hero/hero-1.jpg')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                {{--                            <div class="label">Adventure</div>--}}
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                {{--                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="hero__items set-bg" data-setbg="{{asset('/frontEnd/img/hero/hero-1.jpg')}}">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="hero__text">
                                {{--                            <div class="label">Adventure</div>--}}
                                <h2>Fate / Stay Night: Unlimited Blade Works</h2>
                                <p>After 30 days of travel across the world...</p>
                                {{--                            <a href="#"><span>Watch Now</span> <i class="fa fa-angle-right"></i></a>--}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('content')
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="popular__product">
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-8">
                                <div class="section-title">
                                    <h4>Popular Shows</h4>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-4">
                                <div class="btn__all">
                                    <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach($books as $book)
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('/storage/'. $book->image)}}">
                                            {{--                            <div class="ep">18 / 18</div>--}}
                                            <div class="view"
                                                 style="height: 35px; font-size: 18px">{{number_format($book->price)}}</div>
                                        </div>
                                        <div class="product__item__text" style="text-align: center">
                                            <h5 class="mb-3"><a href="#">{{$book->name}}</a></h5>
                                            <ul>
                                                <li>
                                                    <div class="comment" style="height: 35px; font-size: 18px; align-items: center">
                                                        <div>
                                                            <a href="#" data-url="{{route('cart.add', $book->id)}}" class="text-white add-to-cart"><i class="fa fa-shopping-cart"></i> Add to
                                                                cart</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="recent__product">
                            <div class="row">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="section-title">
                                        <h4>Recently Added Shows</h4>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-4">
                                    <div class="btn__all">
                                        <a href="#" class="primary-btn">View All <span class="arrow_right"></span></a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('/frontEnd/img/recent/recent-1.jpg')}}">
                                            <div class="ep">18 / 18</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a href="#">Great Teacher Onizuka</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('/frontEnd/img/recent/recent-2.jpg')}}">
                                            <div class="ep">18 / 18</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a href="#">Fate/stay night Movie: Heaven's Feel - II. Lost</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('/frontEnd/img/recent/recent-3.jpg')}}">
                                            <div class="ep">18 / 18</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a href="#">Mushishi Zoku Shou: Suzu no Shizuku</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('/frontEnd/img/recent/recent-4.jpg')}}">
                                            <div class="ep">18 / 18</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a href="#">Fate/Zero 2nd Season</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('/frontEnd/img/recent/recent-5.jpg')}}">
                                            <div class="ep">18 / 18</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a href="#">Kizumonogatari II: Nekket su-hen</a></h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-6 col-sm-6">
                                    <div class="product__item">
                                        <div class="product__item__pic set-bg" data-setbg="{{asset('/frontEnd/img/recent/recent-6.jpg')}}">
                                            <div class="ep">18 / 18</div>
                                            <div class="comment"><i class="fa fa-comments"></i> 11</div>
                                            <div class="view"><i class="fa fa-eye"></i> 9141</div>
                                        </div>
                                        <div class="product__item__text">
                                            <ul>
                                                <li>Active</li>
                                                <li>Movie</li>
                                            </ul>
                                            <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-8">
                    <div class="product__sidebar">
                        <div class="product__sidebar__comment">
                            <div class="section-title">
                                <h5>New Comment</h5>
                            </div>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    <img src="{{asset('/frontEnd/img/sidebar/comment-1.jpg')}}" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">The Seven Deadly Sins: Wrath of the Gods</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    <img src="{{asset('/frontEnd/img/sidebar/comment-2.jpg')}}" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Shirogane Tamashii hen Kouhan sen</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    <img src="{{asset('/frontEnd/img/sidebar/comment-3.jpg')}}" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Kizumonogatari III: Reiket su-hen</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                            <div class="product__sidebar__comment__item">
                                <div class="product__sidebar__comment__item__pic">
                                    <img src="{{asset('/frontEnd/img/sidebar/comment-4.jpg')}}" alt="">
                                </div>
                                <div class="product__sidebar__comment__item__text">
                                    <ul>
                                        <li>Active</li>
                                        <li>Movie</li>
                                    </ul>
                                    <h5><a href="#">Monogatari Series: Second Season</a></h5>
                                    <span><i class="fa fa-eye"></i> 19.141 Viewes</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
