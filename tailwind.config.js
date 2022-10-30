const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily: {
            'sans': ['Poppins', ...defaultTheme.fontFamily.sans],
        },
        colors: {
            'body': '#17171F',
            'selected-text': '#E3242B',
            'theme': '#A91B0D',
            'theme-hover': '#800D09',
            'nav': '#404053',
            'secondary': '#3F3F51',
            'input-border': '#565666',
            'input': '#2A2A35'
        },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
