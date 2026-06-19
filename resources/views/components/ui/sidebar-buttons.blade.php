    <div class="menu bg-base-200 min-h-full w-80 p-4">
        {{-- @if (Route::has('login'))
            @auth
                <div class="mb-4">
                    <a href="{{ url('/dashboard') }}" class="btn btn-outline w-full">
                        Dashboard
                    </a>
                </div>
            @else
                <div class="mb-3">
                    <a href="{{ route('login') }}" class="btn btn-ghost w-full">
                        Log in
                    </a>
                </div>
                @if (Route::has('register'))
                    <div>
                        <a href="{{ route('register') }}" class="btn btn-outline w-full">
                            Register
                        </a>
                    </div>
                @endif
            @endauth
        @endif --}}

        <!-- Sidebar content here -->
        @auth ('')
          <livewire:auth.user-menu/>
        @endauth
        <li><a href="{{ route('welcome') }}" >Home</a></li>
        <li><a href="{{ route('instructions') }}" >{{__('Instructions')}}</a></li>
        {{-- <li><a href="{{ route('welcome') }}" >SARE</a></li> --}}
        {{-- <li><a>Sidebar Item 2</a></li> --}}
        @if (Route::has('login'))
                @auth
                    <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('fases.grupos') }}" class="{{ request()->routeIs('fases.grupos') ? 'menu-active' : '' }}">{{__('1 Stage')}}</a></li>
                @else
                    <li><a href="{{ route('login') }}">Log In</a></li>
                    @if (Route::has('register'))
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                @endauth
        @endif
    </div>
