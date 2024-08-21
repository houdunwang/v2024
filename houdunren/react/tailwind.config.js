/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    container: {
      center: true,
      padding: '10px',
      screens: {
        "2xl": "1550px"
      }
    },
    extend: {},
  },
  plugins: [],
}

