<!-- Navbar Fija -->
<div class="navbar bg-primary text-base-100 sticky top-0 z-10 px-4 lg:px-20 shadow-md shadow-neutral/50">
    <div class="flex justify-between items-center w-full">
        <!-- Logo/Brand -->
        <div class="flex items-center gap-2">
            <div class="flex-none lg:hidden">
                <label for="my-drawer-2" aria-label="open sidebar" class="btn btn-square btn-ghost">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" class="inline-block h-6 w-6 stroke-current">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                </label>
            </div>
            <a class="text-xl font-bold" href="/">
                <x-ui.logo-secondary />
            </a>
        </div>

        <x-ui.navbar-buttons />
    </div>
</div>
