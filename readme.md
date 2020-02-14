# Laravel Nova TinyMCE editor (with images upload capabilities!)

This Nova package allow you to use [TinyMCE editor](https://tiny.cloud) for text areas. You can customize the editor options and... you can **upload images to your server** and put them right there on the text without leaving the text editor!!

## Installation

```shell
composer require emilianotisato/nova-tinymce
```
Run the command bellow, to publish TinyMCE JavaScript and CSS assets.
```shell
php artisan vendor:publish --provider="Emilianotisato\NovaTinyMCE\FieldServiceProvider"
```

## Usage

In your Nova resource add the use declaration and use the NovaTinyMCE field:

```php
use Emilianotisato\NovaTinyMCE\NovaTinyMCE;

// ...

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),

            NovaTinyMCE::make('body'),
        ];
    }
```

By default, the editor comes with some basic options and the image management without the filemanager (inserted just as links).

You can use custome options like this:

```php
NovaTinyMCE::make('body')->options([
                'plugins' => [
                    'lists preview hr anchor pagebreak image wordcount fullscreen directionality paste textpattern'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | bullist numlist outdent indent | link'
            ]),
```

### Using the upload images feature

Now if you need to upload images from the text editor, we need to install [UniSharp Laravel Filemanager](https://unisharp.github.io/laravel-filemanager/installation), and pass the `use_lfm` key to your options array:

```php
NovaTinyMCE::make('body')->options([
                'plugins' => [
                    'lists preview hr anchor pagebreak image wordcount fullscreen directionality paste textpattern'
                ],
                'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | bullist numlist outdent indent | link',
                'use_lfm' => true
            ]),
```

The last step is to run this command to fix some Filemanager files: `php artisan nova-tinymcs:suport-lfm`

*IMPORTANT:* if you are in laravel 6 you will need to import the helper lib cos Filemanager need them: `composer require laravel/helpers`.

Optional, in case you change the `laravel-filemanager` URL in the package config file, you need to pass that info to this nova field with the `lfm_url` key in the options array.

```php
// ...
    'use_lfm' => true,
    'lfm_url' => 'laravel-filemanager'
// ...
```

### Extra configuration and plugin customization

You can virtually pass any configuration option for the javascript SDK to the array in the `options()` method.

For example, you like to have increased the height of the text area:

```php
            NovaTinyMCE::make('body')->options([
                'height' => '980'
                ]),
```

You can see the full list of parameters in the docs:
[https://www.tiny.cloud/docs/configure/](https://www.tiny.cloud/docs/configure/)

### Using JSON syntax on attribute property

If you use JSON syntax on attribute name, TinyMCE won't initialize because the default id will be an invalid HTML id attribute. 
To solve this you can define a custom id. For example:

```php
    NovaTinyMCE::make('Value', 'text->en')->id('custom-id');
```
 