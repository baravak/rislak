const defaultTheme = require('tailwindcss/defaultTheme')
const colors = require('tailwindcss/colors')

module.exports = {
  purge: {
    content: process.env.BASE_NAME == 'public' ? ['./resources/views/welcome.blade.php'] : ['./resources/views/**/*.blade.php']
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    screens: {
      'xs': '475px',
      ...defaultTheme.screens,
    },
    extend: {
      fontSize: {
        'sx': '.625rem',
      },
      colors: {
        brand: {
          DEFAULT: '#007BA4',
          '50': '#8BE2FF',
          '100': '#71DCFF',
          '200': '#3ECFFF',
          '300': '#0BC2FF',
          '400': '#00A1D7',
          '500': '#007BA4',
          '600': '#005571',
          '700': '#002F3E',
          '800': '#00080B',
          '900': '#000000'
        },
        orange: colors.orange,
        lime: colors.lime,
        cyan: colors.cyan,
        blue: colors.lightBlue
      },
    },
  },
  variants: {
    extend: {
      backgroundColor: ['disabled'],
      opacity: ['disabled'],
      borderColor: ['disabled'],
      textColor: ['disabled'],
      borderWidth: ['last'],
      ringWidth: ['hover'],
      ringColor: ['hover'],
      ringOffsetWidth: ['hover'],
    },
  },
  plugins: [
    require('@tailwindcss/forms')
  ],
}
