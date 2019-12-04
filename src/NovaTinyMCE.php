<?php

namespace Emilianotisato\NovaTinyMCE;

use Laravel\Nova\Fields\Field;
use Laravel\Nova\Fields\Expandable;

class NovaTinyMCE extends Field
{
    use Expandable;

    public $showOnIndex = false;

    /**
     * The field's component.
     *
     * @var string
     */
    public $component = 'Nova-TinyMCE';

    public function __construct(string $name, ?string $attribute = null, ?mixed $resolveCallback = null)
    {
        parent::__construct($name, $attribute, $resolveCallback);

        $this->withMeta([
                'options' => [
                    'content_css' => '/vendor/tinymce/skins/ui/oxide/content.min.css',
                    'skin_url' => '/vendor/tinymce/skins/ui/oxide',
                    'path_absolute' => '/',
                    'plugins' => [
                        'lists preview hr anchor pagebreak image wordcount fullscreen directionality paste textpattern'
                    ],
                    'toolbar' => 'undo redo | styleselect | bold italic forecolor backcolor | alignleft aligncenter alignright alignjustify | image | bullist numlist outdent indent | link',
                    'relative_urls' => false,
                    'use_lfm' => false,
                    'lfm_url' => 'laravel-filemanager'
                ]
            ]);
    }

    /**
     * Allow to pass any existing TinyMCE option to the editor.
     * Consult the TinyMCE documentation [https://github.com/tinymce/tinymce-vue]
     * to view the list of all the available options.
     *
     * @param  array $options
     * @return self
     */
    public function options(array $options)
    {
        $currentOptions = $this->meta['options'];

        return $this->withMeta(
            [
            'options' => array_merge($currentOptions, $options)
            ]
        );
    }

    /**
     * Set the field id html attribute.
     *
     * @return $this
     */
    public function id($id)
    {
        $this->withMeta(['id' => $id]);

        return $this;
    }

    /**
     * Prepare the element for JSON serialization.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        return array_merge(parent::jsonSerialize(), [
            'shouldShow' => $this->shouldBeExpanded(),
        ]);
    }
}
