@if (Route::has('login'))
    <nav class="bg-white border-b border-grey-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 ">
                <h1>
                    {{ __('Dashboard') }}
                </h1>
                @auth
                    <a href="{{ url('/home') }}" class="text-sm text-grey-700 dark:text-grey-500 underline"> Home </a>
                    <a href="{{ route('logout') }}" class="text-sm text-grey-700 dark:text-grey-500 py-4 underline"> Logout </a>
                @else
                <a href="{{ route('login') }}" class="text-sm text-grey-700 dark:text-grey-500 py-4 underline"> Login </a>
                
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-grey-700 dark:text-grey-500 py-4 underline"> Regiter </a>
                @endif  
                @endauth
            </div>
        </div>
    </nav>
@endif


{{-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/home') }}">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @if (Route::has('login'))
                    @auth
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false"> {{ Auth::user()->name }} </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenuLink">
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"> Logout </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                        </li>
                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            </li>
                        @endif
                    @endauth
                @endif
            </ul>
        </div>
    </div>
</nav> --}}