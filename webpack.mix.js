let mix = require('laravel-mix')
let path = require('path')

require('./mix')

mix
    .setPublicPath('dist')
    .js('resources/js/tinymce.js', 'js')
    .js('resources/js/field.js', 'js')
    .sass('resources/sass/field.scss', 'css')
    .alias({
        'laravel-nova': path.join(
            __dirname,
            './vendor/laravel/nova/resources/js/mixins/packages.js'
        )
    })
    .copyDirectory('node_modules/tinymce/skins', 'dist/tinymce/skins')
    .vue({ version: 3 })
    .nova('emilianotisato/nova-tinymce')
    .webpackConfig({
        externals: {
            'laravel-nova': 'LaravelNova',
        }
    });
