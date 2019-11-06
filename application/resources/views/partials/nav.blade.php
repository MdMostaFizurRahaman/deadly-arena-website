
<!-- Navbar -->
<nav class="navbar-youplay navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="off-canvas" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="{{route('welcome')}}">
                <img  src="{{asset('application/public')}}/{{getSettings()->game_logo}}" alt="">
            </a>
            
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            
                <ul class="nav navbar-nav">
                    
                <li class=" dropdown dropdown-hover {{Request::is('store') || Request::is('store/*') ? 'active' : ''}}">
                    <a href="{{route('store')}}" class="dropdown-toggle">
                                Store
                        
                        <span class="label">assets</span>
                    </a>
        
                </li>
        <li class=" dropdown dropdown-hover {{Request::is('blog') || Request::is('blog/*') ? 'active' : ''}}">
            <a href="{{route('blog')}}" class="dropdown-toggle">
                Blog
                <span class="label">news</span>
            </a>
        </li>
                </ul>
            

            
            <ul class="nav navbar-nav navbar-right">
                    
                @auth
                    <li class=" dropdown dropdown-hover {{Request::is('home') ? 'active' : ''}}">
                    <a style="text-transform:none; font-size:1.5rem;" href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{Auth::user()->player_displayname}}
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">       
                            <li>
                                <a href="{{route('home')}}">
                                    Profile  
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                </form>
                            </li>
                        </ul>
                    </div>
                </li>

                @else
                <li class="dropdown dropdown-hover dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="true">
                        <i class="fa fa-user"></i>
                        <span class="caret"></span>
                    </a>
                    <div class="dropdown-menu">
                        <ul role="menu">       
                            <li>
                                <a href="{{route('login')}}">
                                    Login
                                </a>
                            </li>
                            <li>
                                <a href="{{route('register')}}">
                                    Register
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>
                @endauth
            </ul>
            
        </div>
    </div>
</nav>
<!-- /Navbar -->
