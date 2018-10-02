# Laravel Nova TinyMCE editor (with images upload capabilities!)

This Nova package allow you to use [TinyMCE editor](https://tiny.cloud) for text areas. You can customize the editor options and... you can **upload images to your server** and put them rigth there on the text without leaving the text editor!!

## Installation

```shell
composer require emilianotisato/nova-tinymce
```

In order to work with this editor you need to [create a free account](https://apps.tiny.cloud/signup/) to get the editor API_KEY. Once you have don this, create this key inside your `config/nova.php` file

```
    'tinymce_api_key' => env('TINYMCE_API_KEY'),
```

and add the `TINYMCE_API_KEY` to your .env file with the key from tiny.cloud website.

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

By default, the editor comes with default options and the image without the filemanager.
You can use custome options like this:

```php
NovaTinyMCE::make('body')->options([
                'plugins' => [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak'
                ],
                'toolbar' => 'insertfile undo redo | styleselect | bold italic'
            ]),
```

### Using the upload images feature

Now if you need to upload images from the text editor, we need to install [UniSharp Laravel Filemanager](https://unisharp.github.io/laravel-filemanager/installation), and pass the `use_lfm` key to your options array:

```php
// with the defaoult options
NovaTinyMCE::make('body')->options(['use_lfm' => true]),

// or with other options
NovaTinyMCE::make('body')->options([
                'plugins' => [
                    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                    'searchreplace wordcount visualblocks visualchars code fullscreen',
                    'insertdatetime media nonbreaking save table contextmenu directionality',
                    'emoticons template paste textcolor colorpicker textpattern'
                ],
                'toolbar' => 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media',
                'use_lfm' => true
                ]),

```