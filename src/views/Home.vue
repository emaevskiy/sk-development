<template>
  <div class="home">
    <app-header></app-header>
    <app-main></app-main>
    <app-footer></app-footer>
  </div>
</template>

<script>

import AppHeader from '@/components/AppHeader.vue'
import AppMain from '@/components/AppMain.vue'
import AppFooter from '@/components/AppFooter.vue'

export default {
  name: 'home',
  components: {
    AppHeader, AppMain, AppFooter
  }
}

</script>

<style scoped lang="scss">

</style>
