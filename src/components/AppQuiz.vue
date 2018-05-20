<template>
  <div class="quiz">
    <transition-group name="fade"
                      tag="div"
                      mode="in-out"
                      appear
    >
      <div class="quiz-step"
           v-for="(step, index, key) in activeBranch"
           v-if="quizIteration == index"
           :key="step"
      >
        <div class="row quiz-header">
          <div class="col-12">
            <h4 class="quiz-question">
              {{ step.question }}:
            </h4>
          </div>
        </div>
        <div class="row quiz-body">
          <div class="col-sm-5 col-md-5 col-lg-3 mb-4"
               v-for="(answer, index) in step.answers"
               :key="index"
          >
            <div class="quiz-answer"
                 @click="nextStep(index, step.question, answer.text, answer.branch)"
                 >
              <div class="quiz-img">
                <img :src="imgPath + answer.img">
              </div>
              <div class="quiz-btn">
                <span>{{ answer.text }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </transition-group>
  </div>
</template>

<script>
export default {
  name: 'AppQuiz',
  data(){
    return {
      imgPath: '../images/',

      quizResult: {}, // Результаты теста
      quizIteration: 0, // Итератор для построения DOM
      quizStep: 0, // Общее количество пройденных шагов
      stepsCount: 1,
      branch: 'main', // Начальная ветка теста

      test: {
        main: [ // Ветка
          {
            question: 'Выберите интересующий вид коммерческой недвижимости', // Текст вопроса
            answers: [ // Ответы на вопрос
              {
                img: 'img-1-1.jpg', // Указываем изображение прилагающееся к ответу
                text: 'Торговая недвижимость', // Текст ответа
                branch: 'trade' // Ветка, на которую поменяется текущая при выборе данного ответа (удалить "branch", если переключение ветки не требуется)
              },
              {
                img: 'img-1-2.jpg',
                text: 'Офисная недвижимость',
                branch: 'office'
              },
              {
                img: 'img-1-3.jpg',
                text: 'Промышленная недвижимость',
                branch: 'industrial'
              }
            ]
          }
        ],

        trade: [
          {
            question: 'Выберите интересующий вас вид операции с коммерческой недвижимостью',
            answers: [
              {
                img: 'rent-1.jpg',
                text: 'Аренда',
                branch: 'trade_rent'
              },
              {
                img: 'rent-2.jpg',
                text: 'Продажа',
                branch: 'trade_sell'
              }
            ]
          }
        ],

        trade_rent: [
          {
            question: 'Выберите район',
            answers: [
              {
                img: 'rent1-1.png',
                text: 'Свердловский район'
              },
              {
                img: 'rent1-2.png',
                text: 'Мотовилихинский район'
              },
              {
                img: 'rent1-3.png',
                text: 'Индустриальный район'
              },
              {
                img: 'rent1-4.png',
                text: 'Дзержинский район'
              },
              {
                img: 'rent1-5.png',
                text: 'Орджоникидзевский район'
              },
              {
                img: 'rent1-6.png',
                text: 'Кировский район'
              },
              {
                img: 'rent1-7.png',
                text: 'Ленинский район'
              }
            ]
          },
          {
            question: 'Выберите вид',
            answers: [
              {
                img: 'rent2-1.jpg',
                text: 'В торговом центре'
              },
              {
                img: 'rent2-2.jpg',
                text: 'Отдельно стоящее здание'
              },
              {
                img: 'rent2-3.jpg',
                text: 'Встроенное помещение'
              }
            ]
          },
          {
            question: 'Выберите расположение',
            answers: [
              {
                img: 'rent3-1new.jpg',
                text: 'Подвал'
              },
              {
                img: 'rent3-2new.jpg',
                text: 'Цокольный этаж'
              },
              {
                img: 'rent3-3new.jpg',
                text: '1 этаж'
              },
              {
                img: 'rent3-4new.jpg',
                text: 'Выше 1 этажа'
              }
            ]
          },
          {
            question: 'Выберите площадь',
            answers: [
              {
                img: 'rent4-1.jpg',
                text: 'До 100 кв.м.'
              },
              {
                img: 'rent4-2.jpg',
                text: 'До 200 кв.м.'
              },
              {
                img: 'rent4-3.jpg',
                text: 'До 300 кв.м.'
              },
              {
                img: 'rent4-4.jpg',
                text: 'Свыше 300 кв.м.'
              }
            ]
          },
          {
            question: 'Выберите бюджет',
            answers: [
              {
                img: 'rent5-1.jpg',
                text: '500 - 900 руб/кв.м.'
              },
              {
                img: 'rent5-2.jpg',
                text: '900 - 1200 руб/кв.м.'
              },
              {
                img: 'rent5-3.jpg',
                text: '1200 руб/кв.м. и выше'
              }
            ]
          }
        ],

        trade_sell: [
          {
            question: 'Выберите район',
            answers: [
              {
                img: 'rent1-1.png',
                text: 'Свердловский район'
              },
              {
                img: 'rent1-2.png',
                text: 'Мотовилихинский район'
              },
              {
                img: 'rent1-3.png',
                text: 'Индустриальный район'
              },
              {
                img: 'rent1-4.png',
                text: 'Дзержинский район'
              },
              {
                img: 'rent1-5.png',
                text: 'Орджоникидзевский район'
              },
              {
                img: 'rent1-6.png',
                text: 'Кировский район'
              },
              {
                img: 'rent1-7.png',
                text: 'Ленинский район'
              }
            ]
          },
          {
            question: 'Выберите вид',
            answers: [
              {
                img: 'rent2-1.jpg',
                text: 'В торговом центре'
              },
              {
                img: 'rent2-2.jpg',
                text: 'Отдельно стоящее здание'
              },
              {
                img: 'rent2-3.jpg',
                text: 'Встроенное помещение'
              }
            ]
          },
          {
            question: 'Выберите расположение',
            answers: [
              {
                img: 'rent3-1new.jpg',
                text: 'Подвал'
              },
              {
                img: 'rent3-2new.jpg',
                text: 'Цокольный этаж'
              },
              {
                img: 'rent3-3new.jpg',
                text: '1 этаж'
              },
              {
                img: 'rent3-4new.jpg',
                text: 'Выше 1 этажа'
              }
            ]
          },
          {
            question: 'Выберите площадь',
            answers: [
              {
                img: 'rent4-1.jpg',
                text: 'До 100 кв.м.'
              },
              {
                img: 'rent4-2.jpg',
                text: 'До 200 кв.м.'
              },
              {
                img: 'rent4-3.jpg',
                text: 'До 300 кв.м.'
              },
              {
                img: 'rent4-4.jpg',
                text: 'Свыше 300 кв.м.'
              }
            ]
          },
          {
            question: 'Выберите бюджет',
            answers: [
              {
                img: 'rent5-1.jpg',
                text: 'До 2 500 000 рублей'
              },
              {
                img: 'rent5-2.jpg',
                text: 'До 5 000 000 рублей'
              },
              {
                img: 'rent5-3.jpg',
                text: 'До 7 500 000 рублей'
              },
              {
                img: 'rent5-4.jpg',
                text: 'Свыше 7 500 000 рублей'
              }
            ]
          }
        ],

        office: [
          {
            question: 'Выберите интересующий вас вид операции с коммерческой недвижимостью',
            answers: [
              {
                img: 'rent-1.jpg',
                text: 'Аренда',
                branch: 'office_rent'
              },
              {
                img: 'rent-2.jpg',
                text: 'Продажа',
                branch: 'office_sell'
              }
            ]
          }
        ],

        office_rent: [
          {
            question: 'Выберите район',
            answers: [
              {
                img: 'rent1-1.png',
                text: 'Свердловский район'
              },
              {
                img: 'rent1-2.png',
                text: 'Мотовилихинский район'
              },
              {
                img: 'rent1-3.png',
                text: 'Индустриальный район'
              },
              {
                img: 'rent1-4.png',
                text: 'Дзержинский район'
              },
              {
                img: 'rent1-5.png',
                text: 'Орджоникидзевский район'
              },
              {
                img: 'rent1-6.png',
                text: 'Кировский район'
              },
              {
                img: 'rent1-7.png',
                text: 'Ленинский район'
              }
            ]
          },
          {
            question: 'Выберите вид',
            answers: [
              {
                img: 'rent2-1.jpg',
                text: 'В торговом центре'
              },
              {
                img: 'rent2-2.jpg',
                text: 'Отдельно стоящее здание'
              },
              {
                img: 'rent2-3.jpg',
                text: 'Встроенное помещение'
              }
            ]
          },
          {
            question: 'Выберите расположение',
            answers: [
              {
                img: 'rent3-1new.jpg',
                text: 'Подвал'
              },
              {
                img: 'rent3-2new.jpg',
                text: 'Цокольный этаж'
              },
              {
                img: 'rent3-3new.jpg',
                text: '1 этаж'
              },
              {
                img: 'rent3-4new.jpg',
                text: 'Выше 1 этажа'
              }
            ]
          },
          {
            question: 'Выберите площадь',
            answers: [
              {
                img: 'rent4-1.jpg',
                text: 'До 100 кв.м.'
              },
              {
                img: 'rent4-2.jpg',
                text: 'До 200 кв.м.'
              },
              {
                img: 'rent4-3.jpg',
                text: 'До 300 кв.м.'
              },
              {
                img: 'rent4-4.jpg',
                text: 'Свыше 300 кв.м.'
              }
            ]
          },
          {
            question: 'Выберите бюджет',
            answers: [
              {
                img: 'rent5-1.jpg',
                text: '250 - 500 руб/кв.м.'
              },
              {
                img: 'rent5-2.jpg',
                text: '500 - 900 руб/кв.м.'
              },
              {
                img: 'rent5-3.jpg',
                text: '900 руб/кв.м. и выше'
              }
            ]
          }
        ],

        office_sell: [
          {
            question: 'Выберите район',
            answers: [
              {
                img: 'rent1-1.png',
                text: 'Свердловский район'
              },
              {
                img: 'rent1-2.png',
                text: 'Мотовилихинский район'
              },
              {
                img: 'rent1-3.png',
                text: 'Индустриальный район'
              },
              {
                img: 'rent1-4.png',
                text: 'Дзержинский район'
              },
              {
                img: 'rent1-5.png',
                text: 'Орджоникидзевский район'
              },
              {
                img: 'rent1-6.png',
                text: 'Кировский район'
              },
              {
                img: 'rent1-7.png',
                text: 'Ленинский район'
              }
            ]
          },
          {
            question: 'Выберите вид',
            answers: [
              {
                img: 'rent2-1.jpg',
                text: 'В торговом центре'
              },
              {
                img: 'rent2-2.jpg',
                text: 'Отдельно стоящее здание'
              },
              {
                img: 'rent2-3.jpg',
                text: 'Встроенное помещение'
              }
            ]
          },
          {
            question: 'Выберите расположение',
            answers: [
              {
                img: 'rent3-1new.jpg',
                text: 'Подвал'
              },
              {
                img: 'rent3-2new.jpg',
                text: 'Цокольный этаж'
              },
              {
                img: 'rent3-3new.jpg',
                text: '1 этаж'
              },
              {
                img: 'rent3-4new.jpg',
                text: 'Выше 1 этажа'
              }
            ]
          },
          {
            question: 'Выберите площадь',
            answers: [
              {
                img: 'rent4-1.jpg',
                text: 'До 100 кв.м.'
              },
              {
                img: 'rent4-2.jpg',
                text: 'До 200 кв.м.'
              },
              {
                img: 'rent4-3.jpg',
                text: 'До 300 кв.м.'
              },
              {
                img: 'rent4-4.jpg',
                text: 'Свыше 300 кв.м.'
              }
            ]
          },
          {
            question: 'Выберите бюджет',
            answers: [
              {
                img: 'rent5-1.jpg',
                text: 'До 2 500 000 рублей'
              },
              {
                img: 'rent5-2.jpg',
                text: 'До 5 000 000 рублей'
              },
              {
                img: 'rent5-3.jpg',
                text: 'До 7 500 000 рублей'
              },
              {
                img: 'rent5-4.jpg',
                text: 'Свыше 7 500 000 рублей'
              }
            ]
          }
        ],

        industrial: [
          {
            question: 'Выберите интересующий вас вид операции с коммерческой недвижимостью',
            answers: [
              {
                img: 'rent-1.jpg',
                text: 'Аренда',
                branch: 'industrial_rent'
              },
              {
                img: 'rent-2.jpg',
                text: 'Продажа',
                branch: 'industrial_sell'
              }
            ]
          }
        ],

        industrial_rent: [
          {
            question: 'Выберите район',
            answers: [
              {
                img: 'rent1-1.png',
                text: 'Свердловский район'
              },
              {
                img: 'rent1-2.png',
                text: 'Мотовилихинский район'
              },
              {
                img: 'rent1-3.png',
                text: 'Индустриальный район'
              },
              {
                img: 'rent1-4.png',
                text: 'Дзержинский район'
              },
              {
                img: 'rent1-5.png',
                text: 'Орджоникидзевский район'
              },
              {
                img: 'rent1-6.png',
                text: 'Кировский район'
              },
              {
                img: 'rent1-7.png',
                text: 'Ленинский район'
              }
            ]
          },
          {
            question: 'Выберите вид',
            answers: [
              {
                img: 'int-2-1.jpg',
                text: 'В торговом центре'
              },
              {
                img: 'int-2-2.jpg',
                text: 'Отдельно стоящее здание'
              },
              {
                img: 'int-2-3.jpg',
                text: 'Встроенное помещение'
              }
            ]
          },
          {
            question: 'Выберите площадь',
            answers: [
              {
                img: 'int-4-1.jpg',
                text: 'До 1000 кв.м.'
              },
              {
                img: 'int-4-2.jpg',
                text: 'До 2000 кв.м.'
              },
              {
                img: 'int-4-3.jpg',
                text: 'Свыше 3000 кв.м.'
              }
            ]
          },
          {
            question: 'Выберите бюджет',
            answers: [
              {
                img: 'rent5-1.jpg',
                text: 'До 5 000 000 рублей'
              },
              {
                img: 'rent5-2.jpg',
                text: 'До 10 000 000 рублей'
              },
              {
                img: 'rent5-3.jpg',
                text: 'Свыше 10 000 000 рублей'
              }
            ]
          }
        ],

        industrial_sell: [
          {
            question: 'Выберите район',
            answers: [
              {
                img: 'rent1-1.png',
                text: 'Свердловский район'
              },
              {
                img: 'rent1-2.png',
                text: 'Мотовилихинский район'
              },
              {
                img: 'rent1-3.png',
                text: 'Индустриальный район'
              },
              {
                img: 'rent1-4.png',
                text: 'Дзержинский район'
              },
              {
                img: 'rent1-5.png',
                text: 'Орджоникидзевский район'
              },
              {
                img: 'rent1-6.png',
                text: 'Кировский район'
              },
              {
                img: 'rent1-7.png',
                text: 'Ленинский район'
              }
            ]
          },
          {
            question: 'Выберите вид',
            answers: [
              {
                img: 'int-2-1.jpg',
                text: 'В торговом центре'
              },
              {
                img: 'int-2-2.jpg',
                text: 'Отдельно стоящее здание'
              },
              {
                img: 'int-2-3.jpg',
                text: 'Встроенное помещение'
              }
            ]
          },
          {
            question: 'Выберите площадь',
            answers: [
              {
                img: 'int-4-1.jpg',
                text: 'До 1000 кв.м.'
              },
              {
                img: 'int-4-2.jpg',
                text: 'До 2000 кв.м.'
              },
              {
                img: 'int-4-3.jpg',
                text: 'Свыше 3000 кв.м.'
              }
            ]
          },
          {
            question: 'Выберите бюджет',
            answers: [
              {
                img: 'rent5-1.jpg',
                text: 'До 5 000 000 рублей'
              },
              {
                img: 'rent5-2.jpg',
                text: 'До 10 000 000 рублей'
              },
              {
                img: 'rent5-3.jpg',
                text: 'Свыше 10 000 000 рублей'
              }
            ]
          }
        ]
      }
    }
  },
  computed: {
    activeBranch(){
      return this.test[this.branch];
    }
  },
  methods: {
    nextStep(index, question, answer, branch){

      if (branch != undefined) { // Проверяем изменилась ли ветка

        this.quizIteration = 0; // Если ветка изменилась, то обнуляем итератор и строим DOM по данным из новой ветки
        this.branch = branch; // Обновляем текущую ветку

        this.stepsCount = this.stepsCount + this.activeBranch.length; // Расчитываем общее количество шагов, в зависимости от выбранной ветки

      } else {

        this.quizIteration++;

      }

      this.quizStep++;

      this.quizResult[question] = answer; // Записываем выбранный в тесте в результат


      if (this.quizStep == this.stepsCount) {

        this.$emit('complete', this.quizResult); // Передаем событие сообщающее о том, что тест пройден

      }

    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>

<style>


  .fade-enter-active {
    transition: opacity .8s;
  }

  .fade-enter {
    opacity: 0;
  }

  .fade-leave-active {
    transition: opacity .8s;
  }

  .fade-leave-to {
    opacity: 0;
  }



  .slide-enter {

  }

  .slide-enter-active {
    animation: slideIn 0.5s;
    transition-delay: .5s;
  }

  .slide-enter-to {

  }

  .slide-leave {

  }

  .slide-leave-active {
    animation: slideOut 0.5s;
  }

  .slide-leave-to {

  }

  @keyframes slideIn{
    from{transform: translateX(100vw); opacity: 0;}
    to{transform: translateX(0px); opacity: 1;}
  }

  @keyframes slideOut{
    from{transform: translateX(0px); opacity: 1;}
    to{transform: translateX(-100vw); opacity: 0;}
  }

</style>
