const mix = require('laravel-mix');
require('laravel-mix-esbuild');

mix.js('resources/js/app.js', 'public/js')
   .react() // Voeg deze regel toe om React te ondersteunen
   .esbuild({
       loader: { '.js': 'jsx' }
   })
   .sass('resources/sass/app.scss', 'public/css');