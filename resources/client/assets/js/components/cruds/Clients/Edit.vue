<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Clients</h1>
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
                                    <label for="first_name">First name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="first_name"
                                            placeholder="Enter First name"
                                            :value="item.first_name"
                                            @input="updateFirst_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="last_name"
                                            placeholder="Enter Last name"
                                            :value="item.last_name"
                                            @input="updateLast_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="company_name">Company name</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="company_name"
                                            placeholder="Enter Company name"
                                            :value="item.company_name"
                                            @input="updateCompany_name"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            placeholder="Enter Email"
                                            :value="item.email"
                                            @input="updateEmail"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="phone">Phone</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="phone"
                                            placeholder="Enter Phone"
                                            :value="item.phone"
                                            @input="updatePhone"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="website">Website</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="website"
                                            placeholder="Enter Website"
                                            :value="item.website"
                                            @input="updateWebsite"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="skype">Skype</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="skype"
                                            placeholder="Enter Skype"
                                            :value="item.skype"
                                            @input="updateSkype"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="country">Country</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="country"
                                            placeholder="Enter Country"
                                            :value="item.country"
                                            @input="updateCountry"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="client_status">Client status</label>
                                    <v-select
                                            name="client_status"
                                            label="title"
                                            @input="updateClient_status"
                                            :value="item.client_status"
                                            :options="clientstatusesAll"
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
        ...mapGetters('ClientsSingle', ['item', 'loading', 'clientstatusesAll']),
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
        ...mapActions('ClientsSingle', ['fetchData', 'updateData', 'resetState', 'setFirst_name', 'setLast_name', 'setCompany_name', 'setEmail', 'setPhone', 'setWebsite', 'setSkype', 'setCountry', 'setClient_status']),
        updateFirst_name(e) {
            this.setFirst_name(e.target.value)
        },
        updateLast_name(e) {
            this.setLast_name(e.target.value)
        },
        updateCompany_name(e) {
            this.setCompany_name(e.target.value)
        },
        updateEmail(e) {
            this.setEmail(e.target.value)
        },
        updatePhone(e) {
            this.setPhone(e.target.value)
        },
        updateWebsite(e) {
            this.setWebsite(e.target.value)
        },
        updateSkype(e) {
            this.setSkype(e.target.value)
        },
        updateCountry(e) {
            this.setCountry(e.target.value)
        },
        updateClient_status(value) {
            this.setClient_status(value)
        },
        submitForm() {
            this.updateData()
                .then(() => {
                    this.$router.push({ name: 'clients.index' })
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
