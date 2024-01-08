<template>
  <div class="home">
    <header class="home__headerAdd">
      <div class="home__header__title">
        {{ title.headerAdd }}
      </div>
      <router-link to="/">
        <action-button 
          text="Cancel"
          color="home__button__blue"
        />
      </router-link>
    </header>
    <main class="home__mainAdd">
      <form
        id="product_form"
        class="home__mainAdd__form" 
        @submit.prevent="submitForm"
      >
        <div class="home__mainAdd__group">
          <label for="sku" class="home__mainAdd__label">
            {{ title.SKU }}
          </label>
          <input id="sku" v-model="product.SKU" type="text">
        </div>
        <div class="home__mainAdd__group">
          <label for="name" class="home__mainAdd__label">
            {{ title.name }}
          </label>
          <input id="name" v-model="product.name" type="text">
        </div>
        <div class="home__mainAdd__group">
          <label for="price" class="home__mainAdd__label">
            {{ title.price }}
          </label>
          <input 
            id="price" 
            v-model.number="product.price" 
            type="number"
            @input="validateInput(product.price)"
          >
        </div>
        <div class="home__mainAdd__group">
          <label for="productType" class="home__mainAdd__label">
            {{ title.switcher }}
          </label>
          <select id="productType" @change="onChangeMethod($event)">
            <option value="type switcher" selected disabled>
              {{ title.switcher }}
            </option>
            <option value="DVD" @click="isDVD = true">
              {{ title.DVD }}
            </option>
            <option value="Book" @click="isBook = true">
              {{ title.book }}
            </option>
            <option value="Furniture" @click="isFurniture = true">
              {{ title.furniture }}
            </option>
          </select>
        </div>
        <div v-if="isDVD" id="DVD" class="home__mainAdd__group">
          <label for="size" class="home__mainAdd__label">
            {{ title.size }}
          </label>
          <input 
            id="size" 
            v-model.number="product.size" 
            type="number" 
            @input="validateInput(product.size)"
          >
        </div>
        <div v-if="isDVD" class="home__mainAdd__label">
          {{ description.DVD }}
        </div>
        <div v-if="isBook" id="Book" class="home__mainAdd__group">
          <label for="weight" class="home__mainAdd__label">
            {{ title.weight }}
          </label>
          <input 
            id="weight" 
            v-model.number="product.weight" 
            type="number"
            @input="validateInput(product.weight)"
          >
        </div>
        <div v-if="isBook" class="home__mainAdd__label">
          {{ description.book }}
        </div>
        <div v-if="isFurniture" id="Furniture" class="home__mainAdd__form">
          <div class="home__mainAdd__group">
            <label for="height" class="home__mainAdd__label">
              {{ title.height }}
            </label>
            <input 
              id="height" 
              v-model.number="product.height" 
              type="number"
              @input="validateInput(product.height)"
            >
          </div>
          <div class="home__mainAdd__group">
            <label for="width" class="home__mainAdd__label">
              {{ title.width }}
            </label>
            <input 
              id="width" 
              v-model.number="product.width" 
              type="number"
              @input="validateInput(product.width)"
            >
          </div>
          <div class="home__mainAdd__group"> 
            <label for="length" class="home__mainAdd__label">
              {{ title.length }}
            </label>
            <input 
              id="length" 
              v-model.number="product.length" 
              type="number"
              @input="validateInput(product.length)"
            >
          </div>
          <div v-if="isFurniture" class="home__mainAdd__label">
            {{ description.furniture }}
          </div>
        </div>
        <span v-if="isInvalid" class="home__mainAdd__error">
          {{ title.errorType }}
        </span>
        <div v-if="error" class="home__mainAdd__error">
          {{ error }}
        </div>
        <action-button 
        text="Save"
        color="home__button__green"
        type="submit"
        form="product_form"
      />
      </form>
    </main>
    <footer class="home__footer">
      <div class="home__footer__title">
        {{ title.footer }}
      </div>
    </footer>
  </div>
</template>

<script>
import ActionButton from '@/components/ActionButton.vue';

export default {
  components: {ActionButton},
  data() {
    return {
      title: {
        headerAdd: 'Product Add',
        footer: 'Scandiweb Test assignment',
        SKU: 'SKU',
        name: 'Name',
        price: 'Price ($)',
        switcher: 'Type Switcher',
        DVD: 'DVD',
        book: 'Book',
        furniture: 'Furniture',
        size: 'Size (MB)',
        weight: 'Weight (KG)',
        height: 'Height (CM)',
        width: 'Width (CM)',
        length: 'Length (CM)',
        errorType: 'Please, provide the data of indicated type'
      },
      description: {
        DVD: 'Please, provide size',
        book: 'Please, provide weight',
        furniture: 'Please, provide dimensions'
      },
      product: {
        SKU: '',
        name: '',
        price: null,
        type: '',
        size: null,
        weight: null,
        height: null,
        width: null,
        length: null
      },
      isDVD: false,
      isBook: false,
      isFurniture: false,
      error: '',
      isInvalid: false,
      products: {}
    }
  },
  mounted() {
    this.fetchProducts();
  },
  methods:{
    async fetchProducts() {
    try {
      const response = await fetch('http://165.232.127.22:8080/?getAll=1');
      this.products = await response.json();
    } catch (error) {
      console.error(error);
    }
    },
    checkSKU(value) {
      let isNotTheSame = true;
      for (let key in this.products) {
        if ((String(this.products[key].sku)) === (String(value))) {
          isNotTheSame = false;
          this.error = 'Product with this SKU already exists';
          break;
          
        }
      }
      return isNotTheSame;
    },
    onChangeMethod(event) {
      if (event.target.value === 'DVD') {
        this.isDVD = true;
        this.isBook = false;
        this.isFurniture = false;
        this.product.type = event.target.value;
      } else if (event.target.value === 'Book') {
        this.isBook = true;
        this.isDVD = false;
        this.isFurniture = false;
        this.product.type = event.target.value;
      } else if (event.target.value === 'Furniture') {
        this.isFurniture = true;
        this.isDVD = false;
        this.isBook = false;
        this.product.type = event.target.value;
      }
    },
    validateInput(flag) {
      let numRegEx = /^[-+]?\d*\.?\d+$/;
    if (!numRegEx.test(flag)) {
        this.isInvalid = true;
      } else {
        this.isInvalid = false;
    }
    },
    validateForm() {
      let isValid = true;

      if (this.product.type === '') {
        isValid = false;
        this.error = 'Please, submit required data';
      }

      if (this.isDVD === true) {
        if (!this.product.SKU || !this.product.name || !this.product.price || !this.product.size) {
          isValid = false;
          this.error = 'Please, submit required data';
        }
      }

      if (this.isBook === true) {
        if (!this.product.SKU || !this.product.name || !this.product.price || !this.product.weight) {
          isValid = false;
          this.error = 'Please, submit required data';
        }
      }

      if (this.isFurniture === true) {
        if (!this.product.SKU || !this.product.name || !this.product.price || !this.product.height || !this.product.width || !this.product.length) {
          isValid = false;
          this.error = 'Please, submit required data';
        }
      }

      return isValid;
    },
    async submitForm() {
      if (!this.isInvalid && this.validateForm() && this.checkSKU(this.product.SKU)) {
        if (this.isDVD === true) {
          try {
            await fetch(`http://165.232.127.22:8080/?addDVD&sku=${this.product.SKU}&name=${this.product.name}&price=${this.product.price}&size=${this.product.size}`);
            setTimeout(() => {
                this.$router.push('/');
              }, 500);
          } catch (error) {
            console.error(error);
          }
        }
        if (this.isBook === true) {
          try {
            await fetch(`http://165.232.127.22:8080/?addBook&sku=${this.product.SKU}&name=${this.product.name}&price=${this.product.price}&weight=${this.product.weight}`);
            setTimeout(() => {
                this.$router.push('/');
              }, 500);
          } catch (error) {
            console.error(error);
          }
        }
        if (this.isFurniture === true) {
          try {
            await fetch(`http://165.232.127.22:8080/?addFurniture&sku=${this.product.SKU}&name=${this.product.name}&price=${this.product.price}&dimension=${this.product.height}x${this.product.width}x${this.product.length}`);
            setTimeout(() => {
                this.$router.push('/');
              }, 500);
          } catch (error) {
            console.error(error);
          }
        }
      }
    }
  }
}

</script>

<style lang="scss">
.home {
  &__headerAdd {
    border-bottom: 3px solid black;
    align-items: center;
    margin: 0 5vw 0 5vw;
    display: flex;
    justify-content: space-between;
  }
  &__mainAdd {
    flex-grow: 1;
    margin: 0 5vw 0 5vw;
    padding-top: 2vw;
    &__form {
      display: flex;
      flex-direction: column;
      width: 19vw;
      gap: 1vw;
      height: max-content;
      justify-content: space-between;
    }
    &__group {
      display: flex;
      flex-direction: row;
      justify-content: space-between;
    }
    &__label {
      font-family: 'Open Sans', sans-serif;
      font-weight: 400;
      font-size: 20px;
    }
    &__error {
      font-family: 'Open Sans', sans-serif;
      font-weight: 500;
      color: rgb(216, 61, 61);
      font-size: 20px;
    }
  }
}
.absolute {
  position: absolute;
  bottom: 0;
}
</style>