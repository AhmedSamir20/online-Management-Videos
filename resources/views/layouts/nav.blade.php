
<nav class="navbar navbar-expand-lg fixed-top bg-danger " >
{{--<nav class="navbar navbar-expand-lg fixed-top navbar-transparent " color-on-scroll="0">--}}
    <div class="container">
        <div class="navbar-translate">
            <a class="navbar-brand" href="{{route("home.page")}}" rel="tooltip" title="Coded by Creative Tim" data-placement="bottom">
                Videos.Com
            </a>
            <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse justify-content-end" id="navigation">
            <ul class="navbar-nav">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Categories
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($categories as $category)
                            <a class="dropdown-item" href="{{ route('front.category' , ['id' => $category->id ]) }}">{{ $category->name }}</a>
                        @endforeach
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Skills
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach($skills as $skill)
                            <a class="dropdown-item" href="{{ route('front.skill' , ['id' => $skill->id ]) }}">{{ $skill->name }}</a>
                        @endforeach
                    </div>
                </li>
                @guest
                <li class="nav-item">
                    <!-- Example single danger button -->

                    <a href="{{url('/login')}}" class="nav-link">login</a>

                </li>

                <li class="nav-item">
                    <a href="{{url('/register')}}" class="nav-link">Register</a>

                </li>

                @else

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

                            <a href="{{route('front.profile',['id'=>auth()->user()->id])}}" class="dropdown-item">Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                @endguest

            </ul>
            <form action="{{route('home')}}">
            <div class="search__box">
                <input class="search__field" name="search" type="text" placeholder="Search"/>
                <button class="search__btn"><i class="fa fa-search"></i></button>
            </div>
            </form>
        </div>
    </div>
</nav>
