/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: 'Poppins'
      },
      backgroundImage: {
        loginBackground: "url(/img/background-v3.webp)",
      },
      colors: {
        blueSlim: "background: linear-gradient(145deg, #eef7fb, #fff;"
      }
    }
  },
  plugins: [],
}