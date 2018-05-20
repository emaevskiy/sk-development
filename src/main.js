import Vue from 'vue'
import App from './App.vue'
import VueGtm from 'vue-gtm'
import router from './router'
import store from './store'

Vue.use(VueGtm, {
  // debug: true, // Whether or not display console logs debugs (optional)
  vueRouter: router, // Pass the router instance to automatically sync with router (optional)
  // ignoredViews: ['homepage'], // If router, you can exclude some routes name (case insensitive) (optional)
})

Vue.config.productionTip = false

new Vue({
  router,
  store,
  render: h => h(App)
}).$mount('#app')
