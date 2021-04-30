import axios from 'axios'


export const state = () => ({
  users: []
})

export const mutations = {
  set_user: function set_user(state, arr) {
    state.users.push(arr)

  }
}
export const actions = {
  async getUsers({
    commit
  }) {
    const response = await axios.get('http://localhost:8080/users')
    const arr = JSON.parse(JSON.stringify(response.data));
    commit('set_user', arr)
  }
}
