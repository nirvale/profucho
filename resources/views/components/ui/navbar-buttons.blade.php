<!-- Botones Desktop -->
<div class="hidden lg:block">
    <div class="flex gap-2">
        <x-ui.theme-switcher />

        {{-- @if (Route::has('login'))
            @auth
              <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'menu-active' : '' }}">Dashboard</a></li>
              <livewire:auth.user-menu/>
            @else
                <a href="{{ route('login') }}" class="btn btn-ghost btn-sm">
                    Log in
                </a>
                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="btn btn-outline btn-sm">
                        Register
                    </a>
                @endif
            @endauth
        @endif --}}
        <ul class="menu menu-horizontal items-center">
          <!-- Navbar menu content here -->
          <li><a href="{{ route('welcome') }}" >Home</a></li>
          {{-- <li><a href="{{ route('welcome') }}" class="{{ request()->routeIs('welcome') ? 'menu-active' : '' }}" >SARE</a></li> --}}
          {{-- <li><a>Navbar Item 2</a></li> --}}
          @if (Route::has('login'))
                  @auth
                      <li><a href="{{ route('dashboard') }}" class="{{ request()->routeIs('dashboard') ? 'menu-active' : '' }}">Dashboard</a></li>
                      <livewire:auth.user-menu/>
                  @else
                      <li><a href="{{ route('login') }}" class="{{ request()->routeIs('login') ? 'menu-active' : '' }}">Log In</a></li>
                      @if (Route::has('register'))
                          <li><a href="{{ route('register') }}" class="{{ request()->routeIs('register') ? 'menu-active' : '' }}">Register</a></li>
                      @endif
                  @endauth
          @endif
          {{-- <li>
            <details>
              <summary>Parent</summary>
              <ul class="bg-base-300 rounded-t-none p-2">
                <li><a>Link 1</a></li>
                <li><a>Link 2</a></li>
              </ul>
            </details>
          </li> --}}
        </ul>
    </div>
</div>
