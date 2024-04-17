/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}","./node_modules/flowbite/**/*.js"],
  theme: {
    extend: {
      fontFamily: {
        Vazirmatn: ['Vazirmatn'],
      },
    },
  },

  theme: {
    extend: {
      backgroundImage: {
        'background': "url('../images/back.jpg')",
      }
    },
  },
  
  plugins: [
    require('flowbite/plugin')
]
}