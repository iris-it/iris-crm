/**
 * Created by monkey_C on 08-Nov-16.
 */


const state = {
    queue: []
}

const mutations = {

    COPY (state, destId) {
        state.queue.push(destId);
    },
    FLUSH (state, updatedId) {
        var index = state.queue.indexOf(updatedId);
        if (index > -1) {
            state.queue.splice(index, 1);
        }
    }
}

const actions = {
    copy: ({ commit }) => commit('COPY'),
    flush: ({ commit }) => commit('FLUSH'),
}

const getters = {

    queue: state => state.queue
}

export default {
    state,
    getters,
    actions,
    mutations
}

