<template>
  <transition name="fade" appear>
    <div class="finish">
      <div class="row finish-header">
        <div class="col-sm-5 col-md-5 col-lg-3 mb-4"
             v-for="(result, index) in results"
        >
          <div class="finish-result">
            <div class="finish-img">
              <img :src="imgPath + result.img" />
            </div>
            <div class="finish-btn">
              <span>
                {{ result.type }}, {{ result.size }} м²
                <div> {{ result.price }} ₽</div>
              </span>
            </div>
          </div>
        </div>
      </div>
      <div class="row finish-body">
        <div class="col-12">
          <h4 class="finish-title">
            ЗАПОЛНИТЕ ФОРМУ НИЖЕ, ЧТОБЫ <br>ПОЛУЧИТЬ ДОСТУП К ПОЛНОЙ БАЗЕ <br>ЭКСКЛЮЗИВНОЙ НЕДВИЖИМОСТИ:
          </h4>
        </div>
        <div class="col-sm-12 col-md-7 col-lg-7">
          <div class="form-control"
               v-for="(item, index) in userData"
          >
            <label :for="item.name + index"> {{ item.label }} </label>
            <input type="text"
                   :class="item.errors.length ? 'error' : ''"
                   :id="item.name + '-' + index"
                   :value="item.value"
                   :placeholder="item.placeholder"
                   @change="validate(index, $event.target.value)"
            />
            <ul class="form-control-messages"
                v-if="item.errors.length"
            >
              <li v-for="error in item.errors">{{ error }}</li>
            </ul>
          </div>
          <button type="button"
                  class="button button-primary button-block"
                  @click="submit(userData)"
          >ПОЛУЧИТЬ ДОСТУП</button>
        </div>
      </div>
    </div>
  </transition>
</template>

<script>

import axios from 'axios';

export default {
  name: 'AppFinish',
  props: {
    quiz: Array
  },
  data(){
    return {
      imgPath: '../images/',

      results: [
        {
          img:'rent6-1.jpg',
          type: 'Помещение свободного назначения',
          size: '59',
          price: '5 725 000'
        },
        {
          img:'rent6-2.jpg',
          type: 'Помещение свободного назначения',
          size: '118',
          price: '19 500 000'
        },
        {
          img:'rent6-3.jpg',
          type: 'Помещение свободного назначения',
          size: '800',
          price: '48 000 000'
        }
      ],

      userData: [
        {
          name: 'name',
          label: 'Имя Отчество',
          placeholder: 'Например, Олег Иванович',
          value: '',
          errors: [],
          pattern: /^[a-zA-Zа-яА-Я ]{3,30}$/,
          required: false
        },
        {
          name: 'phone',
          label: 'Телефон',
          placeholder: '+7 (xxx) xxx-xx-xx',
          value: '',
          errors: [],
          pattern: /^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$/,
          required: true
        }
      ]

    }
  },
  methods: {
    validate(index, value){ //Валидация полей фомы

      let item = this.userData[index];

      item.value = value.replace(/[^a-zA-Zа-яА-Я0-9()-_ ]/g, "").trim();

      let valid = item.pattern.test(item.value);

      if (!item.value && item.required) {
        item.errors.length = 0;
        item.errors.push('Поле обязательно для заполнения');
        return false
      } else if (item.value && !valid) {
        item.errors.length = 0;
        item.errors.push('Поле заполнено неверно');
        return false
      } else {
        item.errors.length = 0;
        return true;
      }

    },
    submit(data){

      let sendData = {};

      let validData;

      for (let i = 0; i < data.length; i++) {

        let name = data[i].name;
        let value = data[i].value;

        validData = this.validate(i, value);

        if (validData == false) {
          return;
        }

        sendData[name] = value;

      }

      sendData.answers = this.quiz;

      sendData = JSON.stringify(sendData);

      // console.log(sendData);

      axios.post('/send.php', sendData)
      .then((response) => {
        console.log(response.data);
        this.$router.push('/thank');
      })
      .catch((error) => {
        console.log(error);
      });

    }

  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>