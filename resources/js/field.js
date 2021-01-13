import IndexNovaTinyMCEField from './components/IndexField';
import DetailNovaTinyMCEField from './components/DetailField';
import FormNovaTinyMCEField from './components/FormField';

Nova.booting((Vue, router) => {
    Vue.component('index-Nova-TinyMCE', IndexNovaTinyMCEField);
    Vue.component('detail-Nova-TinyMCE', DetailNovaTinyMCEField);
    Vue.component('form-Nova-TinyMCE', FormNovaTinyMCEField);
})
