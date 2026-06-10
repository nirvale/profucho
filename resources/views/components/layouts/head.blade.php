@props(['title','js'=>[],'powergrid'])
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') . ' | ' . $title }}</title>
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');

            if (savedTheme) {
                document.documentElement.setAttribute('data-theme', savedTheme);
                // console.log(savedTheme);
            }
        })();
    </script>
    <!-- Styles / Scripts -->
    @fonts
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
      @if ($powergrid)
        @vite(array_merge( ['resources/css/app.css','resources/js/app.js','resources/js/powergrid.js'],$js))
      @elseif (!$powergrid)
        @vite(array_merge( ['resources/css/app.css','resources/js/app.js'],$js))
      @endif
    @endif
</head>
