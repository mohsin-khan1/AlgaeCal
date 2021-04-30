export const state = () => ({
  user: null
})

const mutations = {
  set_user(state, obj) {
    state.user = obj;
  },
  get_user() {
    return state.user;
  }
}
export const getters = {
  get_user: function get_user() {
    return state.user

  }
}

export const actions = {
  setAuthUser({
    commit
  }, payload) {
    commit('set_user', payload)
  }
}

export default {
  state,
  mutations,
  actions
}
