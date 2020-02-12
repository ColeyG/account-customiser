<template>
  <div class="body">
    <CreateBar />
    <div class="page">
      <div class="page-image" v-for="(image, index) in images" v-bind:key="index">
        <img v-bind:src="'storage/' + image.image" />
      </div>
    </div>
  </div>
</template>

<script>
import CreateBar from "./CreateBar";

export default {
  components: {
    CreateBar
  },
  data: function() {
    return {
      images: []
    };
  },
  created: function() {
    var self = this;
    fetch("http://localhost:8000/imageget")
      .then(resp => {
        return resp.json();
      })
      .then(resp => {
        self.images = resp;
      });
  },
  updated: function() {
    var self = this;
    fetch("http://localhost:8000/imageget")
      .then(resp => {
        return resp.json();
      })
      .then(resp => {
        self.images = resp;
      });
  }
};
</script>

<style lang="scss" scoped>
</style>
