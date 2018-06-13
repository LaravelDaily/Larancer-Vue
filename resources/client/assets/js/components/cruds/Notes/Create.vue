<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Notes</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <form @submit.prevent="submitForm" novalidate>
                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Create</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="project">Project</label>
                                    <v-select
                                            name="project"
                                            label="title"
                                            @input="updateProject"
                                            :value="item.project"
                                            :options="projectsAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="note_text">Note text</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="note_text"
                                            placeholder="Enter Note text"
                                            :value="item.note_text"
                                            @input="updateNote_text"
                                            >
                                    </textarea>
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
        ...mapGetters('NotesSingle', ['item', 'loading', 'projectsAll'])
    },
    created() {
        this.fetchProjectsAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('NotesSingle', ['storeData', 'resetState', 'setProject', 'setNote_text', 'fetchProjectsAll']),
        updateProject(value) {
            this.setProject(value)
        },
        updateNote_text(e) {
            this.setNote_text(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'notes.index' })
                    this.$eventHub.$emit('create-success')
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
