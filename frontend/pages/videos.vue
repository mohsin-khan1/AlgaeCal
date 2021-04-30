<template>
  <div>
    <Nav />
    <div class="container-fluid">
      <div class="search-wrap">
        <div>
          <b-form-select
            v-model="selected"
            :options="allVidoes"
            class="mb-3"
            value-field="title"
            text-field="title"
            disabled-field="notEnabled"
          >
          </b-form-select>
        </div>
      </div>

      <div class="row justify-content-md-centers">
        <div class="col-md-4" v-for="video in allVidoes" :key="video.id">
          <video width="100%" height="240" controls class="" poster="/images/logos.PNG">
            <source :src="video.video_id" type="video/mp4" />
          </video>
          <router-link :to="{ path:`/videoSummary/${video.id}`}">
            <h3>{{ video.title }}</h3>
          </router-link>
          <p>{{ video.description }}</p>
        </div>
      </div>

      <div class="btn-more">
        <b-button class="morevid" @click="loadMore">Load More</b-button>
      </div>
    </div>
  </div>
</template>

<script>
import Nav from "../components/navBar.vue";
import axios from 'axios';
import { mapState } from 'vuex';
export default {
  components: {
    Nav,
  },
  data() {
    return {
      selected: "2",
      allVidoes: [],
      test: [],
      viewLimit: 6,
    };
  },
  computed: {
    ...mapState({user: 'application.user'})
  },
  methods: {
   async getVidoes () {
       const res = await axios.get('http://localhost:8080/videos')
         this.test = res.data.data

      if (this.viewLimit > this.test.length) this.viewLimit = this.test.length;
      this.updateVideos();
    },
    loadMore() {
      this.viewLimit = (this.viewLimit + 3) > this.test.length ? this.test.length : this.viewLimit + 3;
      this.updateVideos();
    },
    updateVideos() {
      this.allVidoes = this.test.slice(0, this.viewLimit);
    },
  },
  async mounted() {
    const local = JSON.parse(window.localStorage.getItem('vuex'));
    if (local && local.application.user.username) {
      await this.getVidoes();
    }
    else this.$router.push('/login');

    
  },
  watch: {
    selected(title) {
      this.allVidoes.forEach((obj) => {
        if (title == obj.title) {
          this.$router.push({ 
            path: `/videoSummary/${obj.id}`
          })
      }
    });
  },
  }
};
</script>
