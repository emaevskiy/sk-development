<template>
  <div class="home">
    <the-header></the-header>
    <the-main></the-main>
    <the-footer></the-footer>
  </div>
</template>

<script>

import TheHeader from '@/components/TheHeader.vue'
import TheMain from '@/components/TheMain.vue'
import TheFooter from '@/components/TheFooter.vue'

export default {
  name: 'home',
  components: {
    TheHeader, TheMain, TheFooter
  }
}

</script>

<style scoped lang="scss">

</style>
