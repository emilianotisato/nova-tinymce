import IndexNovaTinyMCEField from './components/IndexField';
import DetailNovaTinyMCEField from './components/DetailField';
import FormNovaTinyMCEField from './components/FormField';

Nova.booting((app, store) => {
    app.component('index-Nova-TinyMCE', IndexNovaTinyMCEField);
    app.component('detail-Nova-TinyMCE', DetailNovaTinyMCEField);
    app.component('form-Nova-TinyMCE', FormNovaTinyMCEField);
})
