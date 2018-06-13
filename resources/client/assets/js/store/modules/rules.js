function initialState() {
    return {
        rules: null,
    }
}

const getters = {
    rules: state => state.rules,
}

const actions = {
    fetchData({ commit }, rules) {
        return new Promise((resolve, reject) => {
            axios.get('/api/v1/rules')
            .then(response => {
                commit('setRules', response.data.data)
                resolve()
            })
            .catch(error => {
                message = error.response.data.message || error.message
                console.log(message)
                reject()
            })
        })
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setRules(state, rules) {
        state.rules = rules
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
