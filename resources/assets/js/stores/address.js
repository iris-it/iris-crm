/**
 * Created by monkey_C on 08-Nov-16.
 */


const state = {
    saveState: "",
    copyState: ""
}

const mutations = {
    SAVE (state, srcId) {
        state.saveState = srcId;
    },
    COPY (state, destId) {
        state.copyState = destId;
    },
    SAVE_RESET (state) {
        state.saveState = "";
    },
    COPY_RESET (state) {
        state.copyState = "";
    }
}

const actions = {
    save: ({ commit }) => commit('SAVE'),
    copy: ({ commit }) => commit('COPY'),
    reset: ({ commit }) => commit('RESET'),
}

const getters = {
    saveState: state => state.saveState,
    copyState: state => state.copyState
}

export default {
    state,
    getters,
    actions,
    mutations
}

