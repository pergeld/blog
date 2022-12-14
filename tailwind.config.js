const defaultTheme = require('tailwindcss/defaultTheme')

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    {
        pattern: /bg-(gray|zinc|neutral|red|orange|amber|yellow|lime|green|emerald|teal|cyan|sky|blue|indigo|violet|purple|fuchsia|pink|rose)-(100|200|300|400|500|600|700|800|900)/,
        variants: ['hover']
    },
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
        aspectRatio: {
            auto: 'auto',
            square: '1 / 1',
            video: '16 / 9',
            1: '1',
            2: '2',
            3: '3',
            4: '4',
            5: '5',
            6: '6',
            7: '7',
            8: '8',
            9: '9',
            10: '10',
            11: '11',
            12: '12',
            13: '13',
            14: '14',
            15: '15',
            16: '16',
          },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/aspect-ratio'),
  ],
}
