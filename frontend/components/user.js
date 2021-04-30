import createPersistedState from 'vuex-persistedstate'

export default ({ store }) => {
  new createPersistedState({
    key: 'vue--x',
    paths: ['user'],
  })(store)
}