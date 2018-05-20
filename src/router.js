import Vue from 'vue'
import Router from 'vue-router'

import Home from './views/Home.vue'
import Thank from './views/Thank.vue'
import E404 from './views/E404.vue'

Vue.use(Router)

export default new Router({
  routes: [
    {
      path: '/',
      name: 'home',
      component: Home
    },
    {
      path: '/thank',
      name: 'thank',
      component: Thank
    },
    {
      path: '*',
      component: E404
    }
  ],
  mode: 'history'
})
