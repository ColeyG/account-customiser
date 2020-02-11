import Vue from 'vue';
import Vuex from 'vuex';

import app from './components/App.vue';
import router from './router';

Vue.use(Vuex);

const store = new Vuex.Store({
  state: {
    user: null,
  },
  mutations: {
    user(state, payload) {
      state.user = payload;
    },
  },
  actions: {

  },
  getters: {

  },
});

new Vue({
  el: '#app',
  router,
  store,
  components: { app },
});
