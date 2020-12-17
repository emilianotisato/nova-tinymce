let mix = require('laravel-mix')

mix.setPublicPath('dist')
   .js('resources/js/field.js', 'js')
   .js('resources/js/tinymce.js', 'js')
   .js('resources/js/icons/default/icons.js', 'js/icons/default/')
   .sass('resources/sass/field.scss', 'css');

mix.copyDirectory('node_modules/tinymce/skins', 'dist/tinymce/skins');
