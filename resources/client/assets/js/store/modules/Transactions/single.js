function initialState() {
    return {
        item: {
            id: null,
            project: null,
            transaction_type: null,
            income_source: null,
            title: null,
            description: null,
            amount: null,
            currency: null,
            transaction_date: null,
        },
        projectsAll: [],
        transactiontypesAll: [],
        incomesourcesAll: [],
        currenciesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    projectsAll: state => state.projectsAll,
    transactiontypesAll: state => state.transactiontypesAll,
    incomesourcesAll: state => state.incomesourcesAll,
    currenciesAll: state => state.currenciesAll,
    
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.project)) {
                params.set('project_id', '')
            } else {
                params.set('project_id', state.item.project.id)
            }
            if (_.isEmpty(state.item.transaction_type)) {
                params.set('transaction_type_id', '')
            } else {
                params.set('transaction_type_id', state.item.transaction_type.id)
            }
            if (_.isEmpty(state.item.income_source)) {
                params.set('income_source_id', '')
            } else {
                params.set('income_source_id', state.item.income_source.id)
            }
            if (_.isEmpty(state.item.currency)) {
                params.set('currency_id', '')
            } else {
                params.set('currency_id', state.item.currency.id)
            }

            axios.post('/api/v1/transactions', params)
                .then(response => {
                    commit('resetState')
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    updateData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = new FormData();
            params.set('_method', 'PUT')

            for (let fieldName in state.item) {
                let fieldValue = state.item[fieldName];
                if (typeof fieldValue !== 'object') {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== 'object') {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(fieldName + '[' + index + ']', fieldValue[index]);
                        }
                    }
                }
            }

            if (_.isEmpty(state.item.project)) {
                params.set('project_id', '')
            } else {
                params.set('project_id', state.item.project.id)
            }
            if (_.isEmpty(state.item.transaction_type)) {
                params.set('transaction_type_id', '')
            } else {
                params.set('transaction_type_id', state.item.transaction_type.id)
            }
            if (_.isEmpty(state.item.income_source)) {
                params.set('income_source_id', '')
            } else {
                params.set('income_source_id', state.item.income_source.id)
            }
            if (_.isEmpty(state.item.currency)) {
                params.set('currency_id', '')
            } else {
                params.set('currency_id', state.item.currency.id)
            }

            axios.post('/api/v1/transactions/' + state.item.id, params)
                .then(response => {
                    commit('setItem', response.data.data)
                    resolve()
                })
                .catch(error => {
                    let message = error.response.data.message || error.message
                    let errors  = error.response.data.errors

                    dispatch(
                        'Alert/setAlert',
                        { message: message, errors: errors, color: 'danger' },
                        { root: true })

                    reject(error)
                })
                .finally(() => {
                    commit('setLoading', false)
                })
        })
    },
    fetchData({ commit, dispatch }, id) {
        axios.get('/api/v1/transactions/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchProjectsAll')
    dispatch('fetchTransactiontypesAll')
    dispatch('fetchIncomesourcesAll')
    dispatch('fetchCurrenciesAll')
    },
    fetchProjectsAll({ commit }) {
        axios.get('/api/v1/projects')
            .then(response => {
                commit('setProjectsAll', response.data.data)
            })
    },
    fetchTransactiontypesAll({ commit }) {
        axios.get('/api/v1/transaction-types')
            .then(response => {
                commit('setTransactiontypesAll', response.data.data)
            })
    },
    fetchIncomesourcesAll({ commit }) {
        axios.get('/api/v1/income-sources')
            .then(response => {
                commit('setIncomesourcesAll', response.data.data)
            })
    },
    fetchCurrenciesAll({ commit }) {
        axios.get('/api/v1/currencies')
            .then(response => {
                commit('setCurrenciesAll', response.data.data)
            })
    },
    setProject({ commit }, value) {
        commit('setProject', value)
    },
    setTransaction_type({ commit }, value) {
        commit('setTransaction_type', value)
    },
    setIncome_source({ commit }, value) {
        commit('setIncome_source', value)
    },
    setTitle({ commit }, value) {
        commit('setTitle', value)
    },
    setDescription({ commit }, value) {
        commit('setDescription', value)
    },
    setAmount({ commit }, value) {
        commit('setAmount', value)
    },
    setCurrency({ commit }, value) {
        commit('setCurrency', value)
    },
    setTransaction_date({ commit }, value) {
        commit('setTransaction_date', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setProject(state, value) {
        state.item.project = value
    },
    setTransaction_type(state, value) {
        state.item.transaction_type = value
    },
    setIncome_source(state, value) {
        state.item.income_source = value
    },
    setTitle(state, value) {
        state.item.title = value
    },
    setDescription(state, value) {
        state.item.description = value
    },
    setAmount(state, value) {
        state.item.amount = value
    },
    setCurrency(state, value) {
        state.item.currency = value
    },
    setTransaction_date(state, value) {
        state.item.transaction_date = value
    },
    setProjectsAll(state, value) {
        state.projectsAll = value
    },
    setTransactiontypesAll(state, value) {
        state.transactiontypesAll = value
    },
    setIncomesourcesAll(state, value) {
        state.incomesourcesAll = value
    },
    setCurrenciesAll(state, value) {
        state.currenciesAll = value
    },
    
    setLoading(state, loading) {
        state.loading = loading
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
