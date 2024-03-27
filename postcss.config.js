export default {
  plugins: {
    tailwindcss: {},
    autoprefixer: {},
    'postcss-import': {},
    'postcss-prefix-selector': {
      prefix: '.bootstrapped ',
      transform: function (prefix, selector, prefixedSelector) {
        return prefixedSelector
      }
    }
  }
}
