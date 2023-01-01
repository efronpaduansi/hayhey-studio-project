<header class="main_menu home_menu">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <a class="navbar-brand" href="{{ url('/') }}"> 
                            <!-- <img src="{{ asset('pages/img/logo.png')}}" alt="logo">  -->
                            HAYDEY MOMENT
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ url('/') }}">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#about">about</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/terms-and-condition">Terms & Condition</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/gallery">Gallery</a>
                                </li>
                                @auth
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/admin/dashboard') }}"> <i class="bi bi-house-door-fill"></i> Home</a>
                                    </li>
                                    @else
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ url('/account-login') }}"> <i class="bi bi-box-arrow-in-right"></i> Login</a>
                                    </li>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>