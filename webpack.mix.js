let mix = require('laravel-mix')
let path = require('path')

require('./nova.mix')

mix
  .setPublicPath('dist')
  .js('resources/js/tinymce.js', 'js')
  .js('resources/js/field.js', 'js')
  .sass('resources/sass/field.scss', 'css')
  .copyDirectory('node_modules/tinymce/skins', 'dist/tinymce/skins')
  .vue({ version: 3 })
  .webpackConfig({
    externals: {
      vue: 'Vue',
        'laravel-nova': 'LaravelNova',
      }
    })
    .nova('emilianotisato/nova-tinymce')
