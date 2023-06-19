<template>
  <div class="home">
    <header class="home__header">
      <div class="home__header__title">
        {{ title.header }}
      </div>
      <router-link to="/addproduct">
        <action-button 
          text="ADD"
          color="home__button__green"
        />
      </router-link>
      <action-button
        id="delete-product-btn"
        text="MASS DELETE"
        color="home__button__red"
        @click="deleteProduct"
      />
    </header>
    <main class="home__main">
      <action-card
        v-for="product in products"
        :id="product.id"
        :key="product.id"
        :sku="product.sku"
        :name="product.name"
        :price="product.price"
        :type="product.product_attribute_type"
        :value-product="product.product_attribute_value"
        :checked="checked.includes(product.id)"
        @checked="updateChecked"
      />
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
import ActionCard from '@/components/ActionCard.vue';

export default {
  components: {ActionButton, ActionCard},
  data() {
    return {
      title: {
        header: 'Product List',
        footer: 'Scandiweb Test assignment'
      },
      products: {},
      checked: []      
    }
  },
  mounted() {
    this.fetchProducts();
  },
  methods: {
    async fetchProducts() {
    try {
      const response = await fetch('http://localhost:8080/?getAll=1');
      this.products = await response.json();
    } catch (error) {
      console.error(error);
    }
    },
    updateChecked(id, isChecked) {
      if (isChecked) {
        this.checked.push(id)
      } else {
        this.checked = this.checked.filter((item) => item !== id)
      }
    },
    async deleteProduct() {
    try {
      for (let i = 0; i < this.checked.length; i++) {
        const id = this.checked[i];
        await fetch(`http://localhost:8080/?deleteProduct&id=${id}`);
      }
      await this.fetchProducts();
    } catch (error) {
      console.error(error);
    }
    }
  }
}
</script>

<style lang="scss">
.home {
  margin: 0 auto;
  &__header {
    border-bottom: 3px solid black;
    align-items: center;
    margin: 0 5vw 0 5vw;
    display: grid;
    grid-template-columns: 83% 6% 5%;
    &__title {
      font-size: 44px;
      font-family: 'Open Sans', sans-serif;
      font-weight: 400;
    }
  }

  &__button {
    width: max-content;
    height: max-content;
    font-size: 20px;
    padding: 0.2vw 0.5vw;
    cursor: pointer;
    border-radius: 10%;
    font-family: 'Open Sans', sans-serif;
    font-weight: 400;
    &__blue {
      background-color: rgb(103, 166, 238);
    }
    &__red {
      background-color: rgb(231, 103, 103);
    }
    &__green {
      background-color: rgb(70, 199, 70);
    }
  }
  &__button:hover {
    opacity: 70%;
  }

  &__main {
    margin: 0 5vw 0 5.7vw;
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    gap: 0.4vw;
  }

  &__footer {
    margin: 2vw 5vw 0.5vw 5vw;
    border-top: 3px solid black;
    padding-top: 1vw;
    display: flex;
    justify-content: center;
    width: -webkit-fill-available;
    &__title {
      font-size: 20px;
      font-family: 'Open Sans', sans-serif;
      font-weight: 500;
    }
  }
}

</style>