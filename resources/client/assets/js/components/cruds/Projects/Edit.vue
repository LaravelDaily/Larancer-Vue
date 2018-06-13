<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Projects</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Edit</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="title">Title</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="title"
                                            placeholder="Enter Title"
                                            :value="item.title"
                                            @input="updateTitle"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="client">Client *</label>
                                    <v-select
                                            name="client"
                                            label="first_name"
                                            @input="updateClient"
                                            :value="item.client"
                                            :options="clientsAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="description"
                                            placeholder="Enter Description"
                                            :value="item.description"
                                            @input="updateDescription"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="start_date">Start date</label>
                                    <date-picker
                                            :value="item.start_date"
                                            :config="$root.dpconfigDate"
                                            name="start_date"
                                            placeholder="Enter Start date"
                                            @dp-change="updateStart_date"
                                            >
                                    </date-picker>
                                </div>
                                <div class="form-group">
                                    <label for="budget">Budget</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="budget"
                                            placeholder="Enter Budget"
                                            :value="item.budget"
                                            @input="updateBudget"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="project_status">Project status</label>
                                    <v-select
                                            name="project_status"
                                            label="title"
                                            @input="updateProject_status"
                                            :value="item.project_status"
                                            :options="projectstatusesAll"
                                            />
                                </div>
                            </div>

                            <div class="box-footer">
                                <vue-button-spinner
                                        class="btn btn-primary btn-sm"
                                        :isLoading="loading"
                                        :disabled="loading"
                                        >
                                    Save
                                </vue-button-spinner>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </section>
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
        ...mapGetters('ProjectsSingle', ['item', 'loading', 'clientsAll', 'projectstatusesAll']),
    },
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('ProjectsSingle', ['fetchData', 'updateData', 'resetState', 'setTitle', 'setClient', 'setDescription', 'setStart_date', 'setBudget', 'setProject_status']),
        updateTitle(e) {
            this.setTitle(e.target.value)
        },
        updateClient(value) {
            this.setClient(value)
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        updateStart_date(e) {
            this.setStart_date(e.target.value)
        },
        updateBudget(e) {
            this.setBudget(e.target.value)
        },
        updateProject_status(value) {
            this.setProject_status(value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'projects.index' })
                    this.$eventHub.$emit('update-success')
                })
                .catch((error) => {
                    console.error(error)
                })
        }
    }
}
</script>


<style scoped>

</style>
