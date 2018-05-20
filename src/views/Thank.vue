<template>
  <div class="thank">
    <the-header></the-header>
    <app-thank></app-thank>
    <the-footer></the-footer>
  </div>
</template>

<script>

import TheHeader from '@/components/TheHeader.vue'
import AppThank from '@/components/AppThank.vue'
import TheFooter from '@/components/TheFooter.vue'

export default {
  name: 'thank',
  components: {
    TheHeader, AppThank, TheFooter
  }
}

</script>

<style scoped lang="scss">

</style>
