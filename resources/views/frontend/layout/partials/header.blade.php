<header class="main-header">
    <nav class="navbar navbar-expand-xl navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="{{asset('fassets/images/yesamerica-logo.png')}}" alt="logo"
                    class="logo-img"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link menu-link {{Route::is('index') ? 'active':''}}" aria-current="page" href="{{route('index')}}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link menu-link {{Route::is('ourvision') ? 'active':''}}" href="{{route('ourvision')}}">Our Vision</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Programs
                        </a>
                        @php
                        use App\Models\Program;
                            $programs = Program::all();
                        @endphp
                        <ul class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                            @foreach($programs as $program)
                                <li><a class="dropdown-item" href="{{route('program',$program->slug)}}">{{$program->title}}</a></li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('ourteam') ? 'active':''}}" href="{{route('ourteam')}}">our team</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('ourvision')}}">events</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('store') ? 'active':''}}" href="{{route('store')}}">store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('enrollment') ? 'active':''}}" href="{{route('enrollment')}}">enrollment</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('membership') ? 'active':''}}" href="{{route('membership')}}">membership</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{Route::is('contactus') ? 'active':''}}" href="{{route('contactus')}}">contact us</a>
                    </li>
                </ul>
                <div class="nav-btn-div">
                    <a href="{{route('donate')}}" class="btn-orange-small nav-btn">donate</a>
                </div>
            </div>
        </div>
    </nav>
</header>