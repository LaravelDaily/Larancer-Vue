<template>
    <div class="row row-alert" v-if="message">
        <div class="col-xs-6">
            <div class="alert" :class="'alert-' + color">
                <h4>
                    <i class="icon fa fa-check" v-if="color == 'success'"></i>
                    <i class="icon fa fa-ban" v-if="color == 'danger'"></i>
                    {{ message }}
                </h4>
                <ul v-if="errors">
                    <li v-for="(value, key) in errors">
                        {{ value[0] }}
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>


<script>
import { mapGetters, mapActions } from 'vuex'

export default {
    data() {
        return {
            // Code...
        }
    },
    computed: {
        ...mapGetters('Alert', ['message', 'errors', 'color'])
    },
    created() {
        // Code...
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
        }
    },
    methods: {
        ...mapActions('Alert', ['resetState'])
    }
}
</script>


<style scoped>
.row-alert {
    padding: 10px;
}
</style>
