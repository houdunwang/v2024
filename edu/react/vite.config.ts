import { defineConfig } from 'vite'
import react from '@vitejs/plugin-react-swc'
import path from "path"
// import viteReact from '@vitejs/plugin-react'
import { TanStackRouterVite } from '@tanstack/router-plugin/vite'

// https://vite.dev/config/
export default defineConfig({
  plugins: [react(), TanStackRouterVite()],
  resolve: {
    alias: {
      "@": path.resolve(__dirname, "./src"),
    },
  },
  server: {
    // open: true,
    proxy: {
      '/hd': {
        target: 'http://laravel.test',
        changeOrigin: true,
      },
      '/sanctum': {
        target: 'http://laravel.test',
        changeOrigin: true,
      },
    },
  },
})
