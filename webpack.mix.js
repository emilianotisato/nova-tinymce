let mix = require('laravel-mix')

mix.setPublicPath('dist')
   .js('resources/js/field.js', 'js')
   .js('resources/js/tinymce.js', 'js')
   .sass('resources/sass/field.scss', 'css');

mix.copyDirectory('node_modules/tinymce/skins', 'dist/tinymce/skins');
