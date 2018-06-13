<template>
    <div v-html="row.file_link"></div>
</template>


<script>
    export default {
        props: ['row'],
    }
</script>
