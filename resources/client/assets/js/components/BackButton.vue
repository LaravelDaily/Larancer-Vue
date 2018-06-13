<template>
    <button type="button" class="btn btn-default btn-sm" @click="routerBack">
        <span class="glyphicon glyphicon-chevron-left"></span> Back
    </button>
</template>


<script>
export default {
    data() {
        return {
            // Code...
        }
    },
    created() {
        // Code...
    },
    methods: {
        routerBack() {
            this.$router.go(-1)
        }
    }
}
</script>


<style scoped>

</style>
