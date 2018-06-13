<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Change Password</h1>
        </section>

        <section class="content">
            <div class="row">
                <form @submit.prevent="submitForm">


                    <div class="col-xs-12">
                        <div class="box">
                            <div class="box-header with-border box-success">
                                <h3 class="box-title">Change Password</h3>
                            </div>

                            <div class="box-body">
                                <back-buttton></back-buttton>
                            </div>

                            <bootstrap-alert />

                            <div class="box-body">
                                <div class="form-group">
                                    <label for="current_password">Current password</label>
                                    <input
                                            type="password"
                                            class="form-control"
                                            name="current_password"
                                            :value="current_password"
                                            @input="updateCurrentPassword"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="new_password">New password</label>
                                    <input
                                            type="password"
                                            class="form-control"
                                            name="new_password"
                                            :value="new_password"
                                            @input="updateNewPassword"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="new_password_confirmation">Confirm new password</label>
                                    <input
                                            type="password"
                                            class="form-control"
                                            name="new_password_confirmation"
                                            :value="new_password_confirmation"
                                            @input="updateNewPasswordConfirmation"
                                            >
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
                    </div>


                </form>


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
        ...mapGetters('ChangePassword', ['current_password', 'new_password', 'new_password_confirmation', 'loading'])
    },
    created() {
        // Code...
    },
    destroyed() {
        this.resetState();
    },
    methods: {
        ...mapActions('ChangePassword', ['storeData', 'resetState', 'setCurrentPassword', 'setNewPassword', 'setNewPasswordConfirmation']),
        updateCurrentPassword(e) {
            this.setCurrentPassword(e.target.value)
        },
        updateNewPassword(e) {
            this.setNewPassword(e.target.value)
        },
        updateNewPasswordConfirmation(e) {
            this.setNewPasswordConfirmation(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
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
