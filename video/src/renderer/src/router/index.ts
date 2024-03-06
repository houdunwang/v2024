import { createRouter, createWebHistory } from 'vue-router'
import Home from '@renderer/views/Home.vue'
import Setting from '@renderer/views/Setting.vue'

const routes = [
  { name: 'home', path: '/:any(.*)*', component: Home },
  { name: 'setting', path: '/setting', component: Setting }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
