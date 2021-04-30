<template>
  <div>
    <LoginForm>
      <Nav />
      <div class="bg-main">
        <div class="container container-home" fluid>
          <div style="width: 450px; height: 400px">
            <b-card header="User Login" class="text-center login-wrap">
              <b-form @submit="onSubmit($event)">
                <b-form-group id="input-group-1" class="mt-30">
                  <b-form-input
                    id="input-1"
                    v-model="form.name"
                    required
                    placeholder="Enter User Name"
                    aria-describedby=" input-live-feedback"
                    :state="null"
                    class="username-input"
                    @keypress="validateInput()"
                  ></b-form-input>
                  <b-form-invalid-feedback id="input-live-feedback">
                    Enter at least 3 letters
                  </b-form-invalid-feedback>
                </b-form-group>
                <b-button
                  type="submit"
                  block
                  variant="primary"
                  :disabled="btnbDisable"
                  >Login</b-button
                >
              </b-form>
            </b-card>
          </div>
        </div>
      </div>
    </LoginForm>
  </div>
</template>

<script>
import Nav from ".././components/navBar.vue";
import { mapState, mapActions } from 'vuex'

export default {
  components: {
    Nav,
  },

  data() {
    return {
      form: {
        name: "",
      },
      disabled: true,
      allUsers: [],
      authenticatedUser: {},
    };
  },

  methods: {
     // persist to vuex store
    ...mapActions({
      setAuthUser: 'setAuthUser',
    }),
    onSubmit(event) {
      event.preventDefault();
      // let vm = this
      let inputUserName = this.form.name;
      let userValidate = false;
      this.allUsers.forEach((userList) => {
        userList.data.forEach((userDetail) => {
          if (userDetail.username == inputUserName) {
            userValidate = false;
            this.$store.dispatch("application/setAuthUser", userDetail);
            this.setAuthUser(userDetail);
            this.$router.push({ path: "/videos" });
            return userDetail.username;
          } else {
            userValidate = true;
          }
        });
      });
      if (userValidate) {
        alert("Sorry, that username is not found");
      }
    },

    validateInput() {
      // removal of special character
      this.form.name = this.form.name.replace(
        /[&\/\\#,+()$~%-@!'":^*?<>{}]/g,
        ""
      );
    },

    getUserData() {
      this.allUsers = this.$store.state.login.users;
      
    },

    getUsers() {
      this.$store.dispatch("login/getUsers");
    },
  },

  computed: {
    ...mapState({
      user: 'user',
    }),
    btnbDisable() {
      if (this.form.name.length < 4) {
        return true;
      }
      return false;
    },
  },

  created() {
    this.getUsers();
  },

  mounted() {
    const local = JSON.parse(window.localStorage.getItem('vuex'));
    if (local && local.application && local.application.user.username !== null) {
      this.$router.push('/videos');
    }
    else this.getUserData();
  },
};
</script>

