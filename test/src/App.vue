<template>
  <div class="home">
    <header class="home__header">
      <div class="home__header__title">
        {{ titleHeader }}
      </div>
      <action-button 
        text="ADD"
        color="home__button__green"
      />
      <action-button 
        id="delete-product-btn"
        text="MASS DELETE"
        color="home__button__red"
      />
    </header>
    <main class="home__main">
      <action-card
        sku="JVC200123"
        name="Acme DISC"
        price="1.00"
        size="700"
        is-size="true"
      /><action-card
        sku="JVC200123"
        name="Acme DISC"
        price="1.00"
        size="700"
        is-size="true"
      />
      <action-card
        sku="JVC200123"
        name="Acme DISC"
        price="1.00"
        size="700"
        is-size="true"
      />
      <action-card
        sku="JVC200123"
        name="Acme DISC"
        price="1.00"
        size="700"
        is-size="true"
      />
      <action-card
        sku="GGWP0007"
        name="War and Peace"
        price="20.00"
        weight="2"
        is-weight="true"
      />
      <action-card
        sku="GGWP0007"
        name="War and Peace"
        price="20.00"
        weight="2"
        is-weight="true"
      />
      <action-card
        sku="GGWP0007"
        name="War and Peace"
        price="20.00"
        weight="2"
        is-weight="true"
      />
      <action-card
        sku="GGWP0007"
        name="War and Peace"
        price="20.00"
        weight="2"
        is-weight="true"
      />
      <action-card
        sku="TR120555"
        name="Chair"
        price="40.00"
        dimension="24x45x15"
        is-dimension="true"
      />
      <action-card
        sku="TR120555"
        name="Chair"
        price="40.00"
        dimension="24x45x15"
        is-dimension="true"
      />
      <action-card
        sku="TR120555"
        name="Chair"
        price="40.00"
        dimension="24x45x15"
        is-dimension="true"
      />
      <action-card
        sku="TR120555"
        name="Chair"
        price="40.00"
        dimension="24x45x15"
        is-dimension="true"
      />
    </main>
    <footer class="home__footer">
      <div class="home__footer__title">
        {{ titleFooter }}
      </div>
    </footer>
  </div>
</template>

<script>
import ActionButton from './components/ActionButton.vue';
import ActionCard from './components/ActionCard.vue';

export default {
  components: {ActionButton, ActionCard},
  data() {
    return {
      titleHeader: 'Product List',
      titleFooter: 'Scandiweb Test assignment'
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
    grid-template-columns: 85% 5% 5%;
    &__title {
      font-size: 50px;
    }
  }

  &__button {
    width: max-content;
    height: max-content;
    font-size: 20px;
    padding: 0.2vw 0.5vw;
    &__blue {
      background-color: blue;
    }
    &__red {
      background-color: red;
    }
    &__green {
      background-color: green;
    }
  }

  &__main {
    margin: 0 5vw 0 5vw;
    display: grid;
    grid-template-columns: 25% 25% 25% 25%;
    gap: 1vw;
  }

  &__footer {
    margin: 2vw 5vw 0 5vw;
    border-top: 3px solid black;
    padding-top: 1vw;
    display: flex;
    justify-content: center;
    &__title {
      font-size: 20px;
    }
  }
}

</style>