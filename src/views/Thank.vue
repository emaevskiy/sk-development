<template>
  <div class="thank">
    <app-header></app-header>
    <app-thank></app-thank>
    <app-footer></app-footer>
  </div>
</template>

<script>

import AppHeader from '@/components/AppHeader.vue'
import AppThank from '@/components/AppThank.vue'
import AppFooter from '@/components/AppFooter.vue'

export default {
  name: 'thank',
  components: {
    AppHeader, AppThank, AppFooter
  }
}

</script>

<style scoped lang="scss">

</style>
