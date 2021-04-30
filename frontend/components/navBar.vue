
<template>
  <div class="container-fluid">
    <div class="bg-nav-wrap">
      <b-nav>
        <b-nav-text><img src="../assets/images/logo.png" /></b-nav-text>
        
        <router-link class="ml-auto" to="/videos" :disabled="btnbDisable">
            Videos
          </router-link>
        <b-nav-item href="/login" @click="clearUserData">Logout</b-nav-item>
      </b-nav>
    </div>
  </div>
</template>

<script>
export default {
  data: () => ({
    disabled: true,
    authenticatedUser: {},
  }),
  methods: {
    storeUserData() {
      this.authenticatedUser = this.$store.state.application.user;
    },
    clearUserData() {
      window.localStorage.removeItem('vuex')
    },
  },
  computed: {
    btnbDisable() {
      let vm = this;
      if (vm.authenticatedUser != null) {
        return false;
      } else {
        return true;
      }
    },
  },
  mounted() {
    this.storeUserData();
  },
};
</script>

<style>
@import "../assets/main.scss";
</style>