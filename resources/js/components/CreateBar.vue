<template>
  <div class="create-bar">
    <form class="postForm" action method="post" enctype="multipart/form-data">
      <h2>New Post</h2>
      <input type="file" id="image" name="image" accept="image/png, image/jpeg, image/jpg" />
      <button type="button" v-on:click="submit">Create</button>
    </form>
  </div>
</template>

<script>
export default {
  props: {},
  methods: {
    submit: function(e) {
      let token = document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content");
      let formData = new FormData(document.querySelector(".postForm"));
      fetch("http://localhost:8000/imagesubmit", {
        headers: {
          "X-Requested-With": "XMLHttpRequest",
          "X-CSRF-TOKEN": token
        },
        method: "post",
        data: formData
      })
        .then(resp => {
          return resp.text();
        })
        .then(myJson => {
          console.log(myJson);
        });
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
