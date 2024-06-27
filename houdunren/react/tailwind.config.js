/** @type {import('tailwindcss').Config} */
export default {
  darkMode: 'selector',
  content: [
    "./index.html",
    "./src/**/*.{js,ts,jsx,tsx}",
  ],
  theme: {
    container: {
      center: true,
      padding: '1rem',
      screens: {
        '2xl': '1450px'
      }

    },
    extend: {
      colors: {
        'hd-background': 'var(--hd-background)',
        'hd-primary': 'var(--hd-primary)',
        'hd-foreground': 'var(--hd-foreground)',
        'hd-border': 'var(--hd-border)',
      },
    },
  },
  plugins: [],
}

