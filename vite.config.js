import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { bunny } from 'laravel-vite-plugin/fonts';
import tailwindcss from '@tailwindcss/vite';
import mkcert from 'vite-plugin-mkcert';


export default defineConfig({
    plugins: [
        laravel({
            input: [
              'resources/css/app.css',
              'resources/js/app.js',
              'resources/js/hero.js',
              'resources/js/powergrid.js',
              'resources/js/gambit.js'
            ],
            refresh: true,
            fonts: [
                bunny('Instrument Sans', {
                    weights: [400, 500, 600],
                }),
            ],
        }),
        tailwindcss(),
        mkcert(),
    ],
    server: {
        watch: {
            ignored: ['**/storage/framework/views/**'],
        },
        host: 'profucho.danaemx.com',
        https: true,
        headers: {
          'Access-Control-Allow-Origin': '*',
          // 'Access-Control-Allow-Credentials': 'true'
        }
    },
});
