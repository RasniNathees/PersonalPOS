/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{vue,js,ts,}'],
  theme: {
    extend: {
      backgroundImage: {
        loginBackround: "url('/src/assets/login-background.jpeg')"
      }
    }
  },
  plugins: []
}
