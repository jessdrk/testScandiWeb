<template>
  <button class="home__button" :class="color">
    {{ text }}
  </button>
</template>

<script>
export default {
  props: {
    text: {
      type: String,
      required: true
    },
    color: {
      type : String,
      default: 'home__button__blue',
      validator(value) {
      return ['home__button__blue', 'home__button__green', 'home__button__red'].includes(value);
      }
    }
  }
}
</script>