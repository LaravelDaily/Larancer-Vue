function initialState() {
    return {
        item: {
            id: null,
            title: null,
            client: null,
            description: null,
            start_date: null,
            budget: null,
            project_status: null,
        },
        clientsAll: [],
        projectstatusesAll: [],
        
        loading: false,
    }
}

const getters = {
    item: state => state.item,
    loading: state => state.loading,
    clientsAll: state => state.clientsAll,
    projectstatusesAll: state => state.projectstatusesAll,
    
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

            if (_.isEmpty(state.item.client)) {
                params.set('client_id', '')
            } else {
                params.set('client_id', state.item.client.id)
            }
            if (_.isEmpty(state.item.project_status)) {
                params.set('project_status_id', '')
            } else {
                params.set('project_status_id', state.item.project_status.id)
            }

            axios.post('/api/v1/projects', params)
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

            if (_.isEmpty(state.item.client)) {
                params.set('client_id', '')
            } else {
                params.set('client_id', state.item.client.id)
            }
            if (_.isEmpty(state.item.project_status)) {
                params.set('project_status_id', '')
            } else {
                params.set('project_status_id', state.item.project_status.id)
            }

            axios.post('/api/v1/projects/' + state.item.id, params)
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
        axios.get('/api/v1/projects/' + id)
            .then(response => {
                commit('setItem', response.data.data)
            })

        dispatch('fetchClientsAll')
    dispatch('fetchProjectstatusesAll')
    },
    fetchClientsAll({ commit }) {
        axios.get('/api/v1/clients')
            .then(response => {
                commit('setClientsAll', response.data.data)
            })
    },
    fetchProjectstatusesAll({ commit }) {
        axios.get('/api/v1/project-statuses')
            .then(response => {
                commit('setProjectstatusesAll', response.data.data)
            })
    },
    setTitle({ commit }, value) {
        commit('setTitle', value)
    },
    setClient({ commit }, value) {
        commit('setClient', value)
    },
    setDescription({ commit }, value) {
        commit('setDescription', value)
    },
    setStart_date({ commit }, value) {
        commit('setStart_date', value)
    },
    setBudget({ commit }, value) {
        commit('setBudget', value)
    },
    setProject_status({ commit }, value) {
        commit('setProject_status', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setItem(state, item) {
        state.item = item
    },
    setTitle(state, value) {
        state.item.title = value
    },
    setClient(state, value) {
        state.item.client = value
    },
    setDescription(state, value) {
        state.item.description = value
    },
    setStart_date(state, value) {
        state.item.start_date = value
    },
    setBudget(state, value) {
        state.item.budget = value
    },
    setProject_status(state, value) {
        state.item.project_status = value
    },
    setClientsAll(state, value) {
        state.clientsAll = value
    },
    setProjectstatusesAll(state, value) {
        state.projectstatusesAll = value
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
