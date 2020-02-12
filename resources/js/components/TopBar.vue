<template>
  <div>
    <div class="top-bar"></div>
    <div class="profile-pic" v-on:click="editImage">
      <img class="user-photo" v-bind:src="image" alt />
    </div>
  </div>
</template>

<script>
export default {
  data: function() {
    return {
      image: "images/account.svg"
    };
  },
  methods: {
    editImage: function(e) {
      var self = this;

      alert("Click an Image on Your Account!");
      const imageSelects = document.querySelectorAll(".page-image");
      imageSelects.forEach(image => {
        image.addEventListener("click", self.imageSelect);
      });
    },
    imageSelect: function(e) {
      var self = this;
      self.image = e.target.src;
      fetch("http://localhost:8000/imageset?title=" + e.target.src.split("/"))
        .then(resp => {
          return resp.text();
        })
        .then(resp => {
          console.log(resp);
        });
    }
  },
  created: function() {
    var self = this;

    fetch("http://localhost:8000/uimageget")
      .then(resp => {
        return resp.json();
      })
      .then(resp => {
        if (resp !== "no image") {
          self.image = resp.title;
        }
      });
  }
};
</script>

<style lang="scss" scoped>
</style>
