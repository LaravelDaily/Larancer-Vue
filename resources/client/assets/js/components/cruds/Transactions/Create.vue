<template>
    <section class="content-wrapper" style="min-height: 960px;">
        <section class="content-header">
            <h1>Transactions</h1>
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
                                    <label for="transaction_type">Transaction type</label>
                                    <v-select
                                            name="transaction_type"
                                            label="title"
                                            @input="updateTransaction_type"
                                            :value="item.transaction_type"
                                            :options="transactiontypesAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="income_source">Income source</label>
                                    <v-select
                                            name="income_source"
                                            label="title"
                                            @input="updateIncome_source"
                                            :value="item.income_source"
                                            :options="incomesourcesAll"
                                            />
                                </div>
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
                                    <label for="description">Description</label>
                                    <textarea
                                            rows="3"
                                            class="form-control"
                                            name="description"
                                            placeholder="Enter Description"
                                            :value="item.description"
                                            @input="updateDescription"
                                            >
                                    </textarea>
                                </div>
                                <div class="form-group">
                                    <label for="amount">Amount</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="amount"
                                            placeholder="Enter Amount"
                                            :value="item.amount"
                                            @input="updateAmount"
                                            >
                                </div>
                                <div class="form-group">
                                    <label for="currency">Currency</label>
                                    <v-select
                                            name="currency"
                                            label="title"
                                            @input="updateCurrency"
                                            :value="item.currency"
                                            :options="currenciesAll"
                                            />
                                </div>
                                <div class="form-group">
                                    <label for="transaction_date">Transaction date</label>
                                    <date-picker
                                            :value="item.transaction_date"
                                            :config="$root.dpconfigDate"
                                            name="transaction_date"
                                            placeholder="Enter Transaction date"
                                            @dp-change="updateTransaction_date"
                                            >
                                    </date-picker>
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
        ...mapGetters('TransactionsSingle', ['item', 'loading', 'projectsAll', 'transactiontypesAll', 'incomesourcesAll', 'currenciesAll'])
    },
    created() {
        this.fetchProjectsAll(),
        this.fetchTransactiontypesAll(),
        this.fetchIncomesourcesAll(),
        this.fetchCurrenciesAll()
    },
    destroyed() {
        this.resetState()
    },
    methods: {
        ...mapActions('TransactionsSingle', ['storeData', 'resetState', 'setProject', 'setTransaction_type', 'setIncome_source', 'setTitle', 'setDescription', 'setAmount', 'setCurrency', 'setTransaction_date', 'fetchProjectsAll', 'fetchTransactiontypesAll', 'fetchIncomesourcesAll', 'fetchCurrenciesAll']),
        updateProject(value) {
            this.setProject(value)
        },
        updateTransaction_type(value) {
            this.setTransaction_type(value)
        },
        updateIncome_source(value) {
            this.setIncome_source(value)
        },
        updateTitle(e) {
            this.setTitle(e.target.value)
        },
        updateDescription(e) {
            this.setDescription(e.target.value)
        },
        updateAmount(e) {
            this.setAmount(e.target.value)
        },
        updateCurrency(value) {
            this.setCurrency(value)
        },
        updateTransaction_date(e) {
            this.setTransaction_date(e.target.value)
        },
        submitForm() {
            this.storeData()
                .then(() => {
                    this.$router.push({ name: 'transactions.index' })
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
