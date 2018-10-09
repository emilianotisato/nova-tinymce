<template>
    <panel-item :field="field">
        <template slot="value">
            <div v-html="field.value" />
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
