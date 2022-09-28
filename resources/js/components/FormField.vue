<template>
    <DefaultField :field="field" :full-width-content="true" :show-help-text="showHelpText">
        <template #field>
            <editor :id="field.id"
                    v-model="value"
                    :class="errorClasses"
                    :placeholder="field.name"
                    :init="options"
            ></editor>

            <p v-if="hasError" class="my-2 text-danger">
                {{ firstError }}
            </p>
        </template>
    </DefaultField>
</template>

<script>
import { DependentFormField, HandlesValidationErrors } from 'laravel-nova'
import Editor from '@tinymce/tinymce-vue'

export default {
    components: { Editor },

    mixins: [DependentFormField, HandlesValidationErrors],

    props: ['resourceName', 'resourceId', 'field'],

    computed: {
        options() {
            let options = this.field.options

            if (options.use_lfm) {
                options['file_picker_callback'] = this.filePicker
            }

            if (options.use_dark && options.content_css_dark && options.skin_url_dark) {
                if (document.documentElement.classList.contains('dark')) {
                    options['content_css'] = options['content_css_dark']
                    options['skin_url'] = options['skin_url_dark']
                }
            }

            return options
        }
    },

    methods: {
        /*
         * Set the initial, internal value for the field.
         */
        setInitialValue() {
          this.value = this.field.value || ''
        },

        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
          formData.append(this.field.attribute, this.value || '')
        },

        /**
         * Update the field's internal value.
         */
        handleChange(value) {
          this.value = value
        },

        filePicker: function (callback, value, meta) {
            let x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
            let y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

            let type = 'image' === meta.filetype ? 'Images' : 'Files';
            let url  = this.options.path_absolute + this.options.lfm_url + '?editor=tinymce5&type=' + type;

            tinymce.activeEditor.windowManager.openUrl({
                url : url,
                title : 'File manager',
                width : x * 0.8,
                height : y * 0.8,
                onMessage: (api, message) => {
                    callback(message.content);
                }
            });
        }
    }
}
</script>
