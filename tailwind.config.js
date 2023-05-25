/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
  ],
  theme: {
    extend: {
      colors: {
        'my-ash': '#242424',
        'dull-orange': '#C76B4F',
        'my-silver': '#C3CDD0',
        'golden-yellow': '#EBAD40',
        'pale-blue': '#AADAEF',
        'pale-yellow': '#FFD608'
      }
    },
  },
  plugins: [],
}

