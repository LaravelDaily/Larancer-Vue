<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Transactions</h1>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">View</h3>
                        </div>

                        <div class="box-body">
                            <back-buttton></back-buttton>
                        </div>

                        <div class="box-body">
                            <div class="row">
                                <div class="col-xs-6">
                                    <table class="table table-bordered table-striped">
                                        <tbody>
                                        <tr>
                                            <th>#</th>
                                            <td>{{ item.id }}</td>
                                        </tr>
                                        <tr>
                                            <th>Project</th>
                                            <td>
                                                <span class="label label-info" v-if="item.project !== null">
                                                    {{ item.project.title }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Transaction type</th>
                                            <td>
                                                <span class="label label-info" v-if="item.transaction_type !== null">
                                                    {{ item.transaction_type.title }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Income source</th>
                                            <td>
                                                <span class="label label-info" v-if="item.income_source !== null">
                                                    {{ item.income_source.title }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ item.title }}</td>
                                            </tr>
                                        <tr>
                                            <th>Description</th>
                                            <td>{{ item.description }}</td>
                                            </tr>
                                        <tr>
                                            <th>Amount</th>
                                            <td>{{ item.amount }}</td>
                                            </tr>
                                        <tr>
                                            <th>Currency</th>
                                            <td>
                                                <span class="label label-info" v-if="item.currency !== null">
                                                    {{ item.currency.title }}
                                                </span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Transaction date</th>
                                            <td>{{ item.transaction_date }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
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
    created() {
        this.fetchData(this.$route.params.id)
    },
    destroyed() {
        this.resetState()
    },
    computed: {
        ...mapGetters('TransactionsSingle', ['item'])
    },
    watch: {
        "$route.params.id": function() {
            this.resetState()
            this.fetchData(this.$route.params.id)
        }
    },
    methods: {
        ...mapActions('TransactionsSingle', ['fetchData', 'resetState'])
    }
}
</script>


<style scoped>

</style>
