<div class="ban-top">
    <div class="container">
        <div class="agileits-navi_search">
            <form action="#" method="post">
                <select id="agileinfo-nav_search" name="agileinfo_search" required="">
                    <option value="">All Categories</option>
                    @foreach ($option as $name)
                        <option value="Kitchen">{{$name->name}}</option>
                    @endforeach

                </select>
            </form>
        </div>
        <div class="top_nav_left">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"
                            aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav menu__list">
                            <li class="active">
                                <a class="nav-stylehead" href="index">Home
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href={{route('about')}}>About Us</a>
                            </li>
                            <li class="dropdown">
                                <a href="{{route('product')}}" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Kitchen
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-4 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <a href="{{route('product')}}">Bakery</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Baking Supplies</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Coffee, Tea & Beverages</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Dried Fruits, Nuts</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Sweets, Chocolate</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Spices & Masalas</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Jams, Honey & Spreads</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <a href="{{route('product')}}">Pickles</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Pasta & Noodles</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Rice, Flour & Pulses</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Sauces & Cooking Pastes</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Snack Foods</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Oils, Vinegars</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product')}}">Meat, Poultry & Seafood</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-4 multi-gd-img">
                                            <img src="source/images/nav.png" alt="">
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li class="dropdown">
                            <a href="{{route('product2')}}" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Household
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu multi-column columns-3">
                                    <div class="agile_inner_drop_nav_info">
                                        <div class="col-sm-6 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <a href="{{route('product2')}}">Kitchen & Dining</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Detergents</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Utensil Cleaners</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Floor & Other Cleaners</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Disposables, Garbage Bag</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Repellents & Fresheners</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}"> Dishwash</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-sm-6 multi-gd-img">
                                            <ul class="multi-column-dropdown">
                                                <li>
                                                    <a href="{{route('product2')}}">Pet Care</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Cleaning Accessories</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Pooja Needs</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Crackers</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Festive Decoratives</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Plasticware</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('product2')}}">Home Care</a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </ul>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href={{route('faqs')}}>Faqs</a>
                            </li>
                            <li class="">
                                <a class="nav-stylehead" href={{route('contact')}}>Contact</a>
                            </li>

                            @if (Auth::check())
                                @if(Auth::user()->authority == 1)

                                    <li class="dropdown" style="background-color:#E33539">
                                        <a href="{{route('product')}}" class="dropdown-toggle nav-stylehead" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Function
                                            <span class="caret"></span>
                                        </a>
                                        <ul class="dropdown-menu multi-column columns-3">
                                            <div class="agile_inner_drop_nav_info">
                                                <div class="col-sm-4 multi-gd-img">
                                                    <ul class="multi-column-dropdown">
                                                        <li class="">
                                                            <a class="nav-stylehead"  href="{{route('addproduct')}}">Add a product</a>
                                                        </li>
                                                        <li class="">
                                                            <a class="nav-stylehead"  href="{{route('Bill')}}">Bill Manager</a>
                                                        </li>
                                                        <li class="">
                                                            <a class="nav-stylehead"  href="{{route('Customer-manager')}}">Customer Manager</a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="clearfix"></div>
                                            </div>
                                        </ul>
                                    </li>
                                @endif
                            @endif

                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>
</div>
