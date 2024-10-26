<header name="header">
    <div class="hedArea">
        <div class="hedLogoBox">
            <h1>LOGO</h1>
        </div>
        @if (Route::has('login'))
            <div class="flex">
                @auth
                    <div class="hedBtnBox">
                        <a href="{{ url('/dashboard') }}" class="">Dashboard</a>
                    </div>
                    @else
                    <div class="hedBtnBox">
                        <a href="{{ route('login') }}" class="hedLink">Log in</a>
                    </div>
                    @if (Route::has('register'))
                    <div class="hedBtnBox">
                        <a href="{{ route('register') }}" class="hedLink">Register</a>
                    </div>
                    @endif
                @endauth
            </div>
        @endif
    </div>
</header>
