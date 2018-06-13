function initialState() {
    return {
        item: {
            id: null,
            first_name: null,
            last_name: null,
            company_name: null,
            email: null,
            phone: null,
            website: null,
            skype: null,
            country: null,
            client_status: null,
        },
        clientstatusesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    clientstatusesAll: state => state.clientstatusesAll,
    
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

            if (_.isEmpty(state.item.client_status)) {
                params.set('client_status_id', '')
            } else {
                params.set('client_status_id', state.item.client_status.id)
            }

            axios.post('/api/v1/clients', params)
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

            if (_.isEmpty(state.item.client_status)) {
                params.set('client_status_id', '')
            } else {
                params.set('client_status_id', state.item.client_status.id)
            }

            axios.post('/api/v1/clients/' + state.item.id, params)
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
        axios.get('/api/v1/clients/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchClientstatusesAll')
    },
    fetchClientstatusesAll({ commit }) {
        axios.get('/api/v1/client-statuses')
            .then(response => {
                commit('setClientstatusesAll', response.data.data)
            })
    },
    setFirst_name({ commit }, value) {
        commit('setFirst_name', value)
    },
    setLast_name({ commit }, value) {
        commit('setLast_name', value)
    },
    setCompany_name({ commit }, value) {
        commit('setCompany_name', value)
    },
    setEmail({ commit }, value) {
        commit('setEmail', value)
    },
    setPhone({ commit }, value) {
        commit('setPhone', value)
    },
    setWebsite({ commit }, value) {
        commit('setWebsite', value)
    },
    setSkype({ commit }, value) {
        commit('setSkype', value)
    },
    setCountry({ commit }, value) {
        commit('setCountry', value)
    },
    setClient_status({ commit }, value) {
        commit('setClient_status', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setFirst_name(state, value) {
        state.item.first_name = value
    },
    setLast_name(state, value) {
        state.item.last_name = value
    },
    setCompany_name(state, value) {
        state.item.company_name = value
    },
    setEmail(state, value) {
        state.item.email = value
    },
    setPhone(state, value) {
        state.item.phone = value
    },
    setWebsite(state, value) {
        state.item.website = value
    },
    setSkype(state, value) {
        state.item.skype = value
    },
    setCountry(state, value) {
        state.item.country = value
    },
    setClient_status(state, value) {
        state.item.client_status = value
    },
    setClientstatusesAll(state, value) {
        state.clientstatusesAll = value
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
