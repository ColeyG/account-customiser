<template>
  <div class="wrapper">
    <Header />
    <TopBar />
  </div>
</template>

<script>
import Header from "./Header.vue";
import TopBar from "./TopBar.vue";

export default {
  name: "app",
  props: {},
  data() {
    return {
      showSidebar: true
    };
  },
  components: {
    Header,
    TopBar
  }
};
</script>

<style lang="scss" scoped>
</style>
