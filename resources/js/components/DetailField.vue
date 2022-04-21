<template>
    <PanelItem :index="index" :field="field" />
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
