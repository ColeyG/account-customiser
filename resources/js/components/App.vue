<template>
  <div class="wrapper">
    <Header />
    <TopBar />
    <Body />
  </div>
</template>

<script>
import Header from "./Header.vue";
import TopBar from "./TopBar.vue";
import Body from "./Body.vue";

export default {
  name: "app",
  props: {},
  components: {
    Header,
    TopBar,
    Body
  }
};
</script>

<style lang="scss" scoped>
</style>
