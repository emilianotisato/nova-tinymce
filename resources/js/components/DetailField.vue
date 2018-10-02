<template>
    <panel-item :field="field">
        <template slot="value">
            <excerpt>
            	<div v-html="field.value" />
            </excerpt>
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
