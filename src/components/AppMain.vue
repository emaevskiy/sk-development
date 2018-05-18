<template>
  <main class="main">
    <h1 class="main-title">
      Все операции с коммерческой <br>
      недвижимостью в Перми
    </h1>
    <div class="container">
      <form action="#">
        <app-quiz v-if="!quizCompleted" @complete="completed"></app-quiz>
        <app-finish v-else :quiz="quizResult"></app-finish>
      </form>
    </div>
  </main>
</template>

<script>

import AppQuiz from '@/components/AppQuiz.vue'
import AppFinish from '@/components/AppFinish.vue'

export default {
  name: 'AppMain',
  components: {
    AppQuiz, AppFinish
  },
  data(){
    return {
      quizCompleted: false,
      quizResult: ''
    }
  },
  methods: {
    completed(data) {

      this.quizCompleted = true;
      this.quizResult = data;

    }

  }
}

</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>
