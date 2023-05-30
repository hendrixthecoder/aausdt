import { space } from 'postcss/lib/list';

/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'my-ash': '#242424',
        'dull-orange': '#C76B4F',
        'my-silver': '#C3CDD0',
        'golden-yellow': '#EBAD40',
        'pale-blue': '#AADAEF',
        'pale-yellow': '#FFD608',
        'bright-purple': '#3B24BF',
        'deep-blue': '#1219AF',
        'deeper-blue': '#0F148C'
      },
      spacing: {
        '30' : '30px'
      }
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

