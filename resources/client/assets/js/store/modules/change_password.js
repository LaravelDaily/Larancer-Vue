function initialState() {
    return {
        current_password: null,
        new_password: null,
        new_password_confirmation: null,
        loading: false
    }
}

const getters = {
    current_password: state => state.current_password,
    new_password: state => state.new_password,
    new_password_confirmation: state => state.new_password_confirmation,
    loading: state => state.loading
}

const actions = {
    storeData({ commit, state, dispatch }) {
        commit('setLoading', true)
        dispatch('Alert/resetState', null, { root: true })

        return new Promise((resolve, reject) => {
            let params = {
                current_password: state.current_password,
                new_password: state.new_password,
                new_password_confirmation: state.new_password_confirmation
            }

            axios.post('/api/v1/change-password', params)
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
    setCurrentPassword({ commit }, value) {
        commit('setCurrentPassword', value)
    },
    setNewPassword({ commit }, value) {
        commit('setNewPassword', value)
    },
    setNewPasswordConfirmation({ commit }, value) {
        commit('setNewPasswordConfirmation', value)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setCurrentPassword(state, value) {
        state.current_password = value
    },
    setNewPassword(state, value) {
        state.new_password = value
    },
    setNewPasswordConfirmation(state, value) {
        state.new_password_confirmation = value
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
