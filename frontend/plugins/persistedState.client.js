import createPersistedState from 'vuex-persistedstate'

export default ({
  store
}) => {
  createPersistedState({
    key: "vuex",
    paths: ['application.user.username']
  })(store)
}
