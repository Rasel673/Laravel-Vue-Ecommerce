<div class="header-top-two">
    <div class="container text-center">
        <div class="row">
            <div class="col-sm-12">
                <div class="middel-top">
                    <div class="left floatleft">
                        <p><i class="mdi mdi-clock"></i> Mon-Fri : 09:00-19:00</p>
                    </div>
                </div>


                <div class="middel-top clearfix">
                    @if (Route::has('login'))
                    <ul class="clearfix right floatright">

                        <li>
                            <a href="#"><i class="mdi mdi-account"></i></a>
                            <ul>
                            
                                @auth
                                <li><a href="{{ url('/home') }}">My account</a></li>
                                @else
                                <li><a href="{{ route('login') }}">Login</a></li>

                                @if (Route::has('register'))
                                <li><a href="{{ route('register') }}">Registar</a></li>
                                @endif
                                
                                @endauth
                                
                            </ul>
                            @endif
                        </li>
                        <li>
                            <a href="#"><i class="mdi mdi-settings"></i></a>
                            <ul>
                                <li><a href="my-account.html">My account</a></li>
                                <li><a href="cart.html">My cart</a></li>
                                <li><a href="wishlist.html">My wishlist</a></li>
                                <li><a href="checkout.html">Check out</a></li>
                            </ul>
                        </li>
                    </ul>
                    <div class="right floatright">
                        <form action="#" method="get">
                            <button type="submit"><i class="mdi mdi-magnify"></i></button>
                            <input type="text" placeholder="Search within these results..." />
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>