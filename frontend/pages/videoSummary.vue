<template>
  <div>
    <Nav />
    <div class="back-btn container-fluid">
      <router-link :to="{name:'videos'}">
        <h4>Back</h4>
      </router-link>
    </div>

    <div class="bv-example-row">
        <b-col>
          <div class="video-player">
              <h3>Video Player</h3>
              <video width="100%" controls>
                <!-- <source :src="video.video_id" type="video/mp4"/> -->
                <source src="https://cdn.bitdegree.org/learn/Pexels%20Videos%203373.mp4?raw=true" type="video/mp4"/>
              </video>
                <h4>{{video.title}}</h4>
                <p>{{video.description}} </p>
          </div>
        </b-col>
    </div>
  </div>
</template>

<script>
  import Nav from '../components/navBar.vue';
  import axios from 'axios';
  export default {
    components: {
      Nav
    },
    data: () => ({
      video: {},
      allVideos:[],
      videoId:{}
    }),
    methods: {
      async getVideo() {
        let vm = this;
        await axios.get('http://localhost:8080/videos')
       .then((res)=>{
         vm.allVideos = res.data.data
         vm.videoId =vm.$route.params
       })
       vm.allVideos.forEach(obj => {
         if (obj.id == vm.videoId.id ) {
           vm.video=Object.assign(obj)
         }
       });
      }
    },
    mounted() {
      this.getVideo()
    }
  }
</script>
