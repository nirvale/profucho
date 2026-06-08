<footer class="bg-base-200 text-base-content p-4 lg:p-2 shadow-[0_-4px_6px_-1px_rgba(0,0,0,0.1)]">
    <div class="flex flex-col lg:flex-row justify-between items-center gap-6 lg:gap-12">
        <x-ui.social-links />

        <div class="flex flex-wrap gap-4 justify-center">
            <a class="link link-hover" href="#">About</a>
            <a class="link link-hover" href="#">Contact</a>
            <a class="link link-hover" href="#">Terms</a>
            <a class="link link-hover" href="#">Privacy Policy</a>
        </div>

        <div>
            <p>Copyright © {{ date('Y') }} - {{ config('app.name', 'Laravel') }}</p>
        </div>
    </div>
</footer>
