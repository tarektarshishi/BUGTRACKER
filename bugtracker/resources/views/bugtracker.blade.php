<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Home - BUGTRACKER</title>
    <link rel="stylesheet" href="{{ asset('css/asset/bootstrap.min.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/fontawesome5-overrides.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/simple-line-icons.min.css') }}">
   
</head>

<body>
    <nav class="navbar navbar-light navbar-expand bg-light navigation-clean">
        <div class="container">
            <div><i class="fas fa-bug"></i><a class="navbar-brand" href="#">BUGTRACKER</a></div><button data-bs-toggle="collapse" class="navbar-toggler" data-bs-target="#navcol-1"></button>
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    @endauth
                </div>
            @endif        
            </div>
    </nav>
    <header class="text-center text-white masthead" style="background: url(&quot;{{asset('img/bg-masthead.png')}}&quot;) right / contain no-repeat;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto position-relative">
                    <h1 class="mb-5"><strong>One app to</strong><br><strong>replace them all.</strong><br></h1>
                    <h5 class="mb-5">All your work in one place<br></h5>
                </div>
            </div>
        </div>
    </header>
    <section class="text-center bg-light features-icons">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="icon-screen-desktop m-auto text-primary" data-bss-hover-animate="pulse"></i></div>
                        <h3><strong>You’ll know what everyone is working on.</strong><br></h3>
                        <p class="lead mb-0">View other people's profiles to see what they are working on.&nbsp;<br></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="fa fa-users m-auto text-primary" data-bss-hover-animate="pulse"></i></div>
                        <h3><strong>All teams can work together, finally.</strong><br></h3>
                        <p class="lead mb-0">teams can work together simultaneously.&nbsp;<br></p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="mx-auto features-icons-item mb-5 mb-lg-0 mb-lg-3">
                        <div class="d-flex features-icons-icon"><i class="fa fa-tasks m-auto text-primary" data-bss-hover-animate="pulse"></i></div>
                        <h3><strong>Everyone knows what to do next.</strong><br></h3>
                        <p class="lead mb-0">Use tickets to see what you have to work on next.<br></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="text-center text-white call-to-action" style="background:url(&quot;{{asset('img/bg-masthead.jpg')}}&quot;) no-repeat center center;background-size:cover;">
        <div class="overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-xl-9 mx-auto position-relative">
                    <h2 class="mb-4">Ready to get started? Sign up now!</h2>
                </div>
                <div class="col-md-10 col-lg-8 col-xl-7 mx-auto position-relative">
                    <form>
                        <div class="row">
                            <div class="col-12 col-md-9 mb-2 mb-md-0"><input class="form-control form-control-lg" type="email" placeholder="Enter your email..."></div>
                            <div class="col-12 col-md-3"><button class="btn btn-primary btn-lg" type="submit">Sign up!</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <footer class="bg-light footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 text-center text-lg-start my-auto h-100">
                    <ul class="list-inline mb-2">
                        <li class="list-inline-item"><a href="#">About</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Contact</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Terms of &nbsp;Use</a></li>
                        <li class="list-inline-item"><span>⋅</span></li>
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                    </ul>
                    <p class="text-muted small mb-4 mb-lg-0">© BUGTRACKER 2021. All Rights Reserved.</p>
                </div>
                <div class="col-lg-6 text-center text-lg-end my-auto h-100">
                    <ul class="list-inline mb-0">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook fa-2x fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter fa-2x fa-fw"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-instagram fa-2x fa-fw"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <script src="{{ asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/bs-init.js')}}"></script>
</body>

</html>