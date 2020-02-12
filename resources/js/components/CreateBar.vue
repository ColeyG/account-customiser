<template>
  <div class="create-bar">
    <form action method="post">
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
      console.log("submit");
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
