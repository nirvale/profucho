<div class="flex items-center justify-center w-full transition-opacity opacity-100 duration-700 lg:grow starting:opacity-0 px-4 lg:px-20 py-6 lg:py-8">
    <main class="flex max-w-[400px] w-full flex-col-reverse lg:max-w-4xl lg:flex-row bg-base-100 rounded-lg shadow-lg shadow-neutral/50">
        <!-- Left Column: Text Content -->
        <div class="card w-full">
            <div class="card-body p-6 pb-6 lg:p-20 lg:pb-10 items-center">
                <h1 class="font-medium text-lg mb-1">Let's get started</h1>
                <p class="text-base-content/70 mb-2">
                    With so many options available to you,<br /> we suggest you start with the following:
                </p>

                <x-welcome.feature-list />

                <ul class="flex gap-3 text-sm leading-normal">
                    <li>
                        <a href="https://cloud.laravel.com" target="_blank" class="btn btn-neutral btn-sm">
                            Deploy now
                        </a>
                    </li>
                </ul>

                <p class="mt-6 lg:mt-10 text-base-content/70">
                    {{ app()->version() }}
                    <a href="https://github.com/laravel/framework/blob/13.x/CHANGELOG.md" target="_blank" class="inline-flex items-center gap-1 font-medium underline underline-offset-4 text-primary ml-1">
                        <span>View changelog</span>
                        <svg width="10" height="11" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-2.5 h-2.5">
                            <path d="M7.70833 6.95834V2.79167H3.54167M2.5 8L7.5 3.00001" stroke="currentColor" stroke-linecap="square"/>
                        </svg>
                    </a>
                </p>
            </div>
        </div>

        <x-welcome.logo-graphics />
    </main>
</div>
