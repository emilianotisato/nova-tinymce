Nova.booting((Vue, router) => {
    Vue.component('index-Nova-TinyMCE', require('./components/IndexField'));
    Vue.component('detail-Nova-TinyMCE', require('./components/DetailField'));
    Vue.component('form-Nova-TinyMCE', require('./components/FormField'));
})
