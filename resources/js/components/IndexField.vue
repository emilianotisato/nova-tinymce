<template>
    <span>{{ cleanValue }}</span>
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    computed: {
    	cleanValue () {
    		return this._stripHTML(this.field.value)
    	},
    },

    methods: {
    	_stripHTML (html) {
    		var tmp = document.createElement("DIV");
   			tmp.innerHTML = html;
   			return tmp.textContent || tmp.innerText || "";
    	}
    }
}
</script>
