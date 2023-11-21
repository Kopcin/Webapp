<nav class="navbar navbar-expand-md navbar-light shadow-sm">
    <div class="container">
    <a href="{{ url('/') }}" class="logo d-flex align-items-center">
                    <img src="{{ asset('images/Hatchful/logo_transparent.png') }}" alt="logo" style="max-height:70px; width:auto; display: block; margin: 0 auto;">
                    <h4>Podróżnik<span>.</span></h4>
                </a>
        <a href="{{ url('/') }}"> Strona domowa </a>
        <!-- <a href="{{ route('comments') }}"> Komentarze </a>
        kontakt -->

        <!-- Authentication Links -->
        @guest
            <a href="{{ route('login') }}">Login</a>
        @endguest
    </div>
</nav>