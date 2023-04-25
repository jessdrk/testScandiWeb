<template>
  <div class="home__card">
    <input class="home__card__input" type="checkbox">
    <div class="home__card__group">
      <h1 class="home__card__titles">
        {{ sku }}
      </h1>
      <h1 class="home__card__titles">
        {{ name }}
      </h1>
      <h1 class="home__card__titles">
        {{ price }} {{ priceIn }}
      </h1>
      <h1 v-if="isSize" class="home__card__titles">
        {{ titleSize }} {{ size }} {{ sizeIn }}
      </h1>
      <h1 v-if="isWeight" class="home__card__titles">
        {{ titleWeight }} {{ weight }} {{ weightIn }}
      </h1>
      <h1 v-if="isDimension" class="home__card__titles">
        {{ titleDimension }} {{ dimension }}
      </h1>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    sku: {
      type: String,
      required: true
    },
    name: {
      type: String,
      required: true
    },
    price: {
      type: String,
      required: true
    },
    size: {
      type: String,
      required: true
    },
    weight: {
      type: String,
      required: true
    },
    dimension: {
      type: String,
      required: true
    },
    isSize: {
      type: Boolean
    },
    isWeight: {
      type: Boolean
    },
    isDimension: {
      type: Boolean
    }
  },
  data() {
    return {
      priceIn: '$',
      titleSize: 'Size:',
      titleWeight: 'Weight:',
      titleDimension: 'Dimension:',
      sizeIn: 'MB',
      weightIn: 'KG'
    }
  }
}
</script>

<style lang="scss">
.home__card {
  width: 19vw;
  height: 11vw;
  border: 1px solid black;
  margin-top: 2vw;
  &__input {
    margin: 1.5vw 0 0 1.5vw;
    width: 1.2vw;
    height: 1.2vw;

  }
  &__group {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
  }
  &__titles {
    font-size: 24px;
    margin: 0.1vw;
  }
  
}
</style>