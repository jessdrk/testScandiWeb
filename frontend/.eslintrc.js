module.exports = {
  extends: [
    // add more generic rulesets here, such as:
    // 'eslint:recommended',
    'plugin:vue/vue3-recommended',
    // 'plugin:vue/recommended' // Use this if you are using Vue.js 2.x.
  ],
  rules: {
    // override/add rules settings here, such as:
  
    "vue/no-unused-components": 'off',
  
  
    "vue/max-attributes-per-line": ["error", {
      "singleline": {
          "max": 3
      },      
      "multiline": {
          "max": 3
      },
    }],
    "vue/multi-word-component-names": 0
  }
}