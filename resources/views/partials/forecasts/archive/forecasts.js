import './forecasts.scss';

import Vue from 'vue';
import VueResource from 'vue-resource';

Vue.use(VueResource);

Vue.config.debug = true;


/* weslint-disable */

//if (window.location.pathname === '/forecasts/') {

//const data = document.getElementById("data").value;
//const json_data = JSON.parse(data);
//const posts = json_data.posts;
//console.log(posts);

const config = {
  api: 'http://vangasport.loc/wp-json/wp/v2/forecasts?_embed',
  nonce: 'hiroy',
};


new Vue({
  el: '#app',
  data: function () {
    return {
      posts: [],
    }
  },
  mounted: function () {
    this.getPosts();
  },
  methods: {
    getPosts: function () {
      const self = this;
      $.get(config.api, function (r) {
        self.$set(self, 'posts', r);
      });
    },
  },
});


//}

// http://www.vuescript.com/simple-events-calendar-vue2/