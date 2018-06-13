function initialState() {
    return {
        message: null,
        errors: null,
        color: 'success'
    }
}

const getters = {
    message: state => state.message,
    errors: state => state.errors,
    color: state => state.color
}

const actions = {
    setMessage({ commit }, message) {
        commit('setMessage', message)
    },
    setErrors({ commit }, errors) {
        commit('setErrors', errors)
    },
    setColor({ commit }, color) {
        commit('setColor', color)
    },
    setAlert({ commit }, data) {
        commit('setMessage', data.message || null)
        commit('setErrors', data.errors || null)
        commit('setColor', data.color || null)
    },
    resetState({ commit }) {
        commit('resetState')
    }
}

const mutations = {
    setMessage(state, message) {
        state.message = message
    },
    setErrors(state, errors) {
        state.errors = errors
    },
    setColor(state, color) {
        state.color = color || 'success'
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
