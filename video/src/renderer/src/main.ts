import { createApp } from 'vue'
import App from './App.vue'
import '@renderer/assets/tailwind.css'
import '@renderer/assets/global.scss'

//element ui
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
import zhCn from 'element-plus/dist/locale/zh-cn.mjs'
//router
import router from '@renderer/router'

//pinia
import { createPinia } from 'pinia'
import piniaPluginPersistedstate from 'pinia-plugin-persistedstate'
const app = createApp(App)
const pinia = createPinia()
pinia.use(piniaPluginPersistedstate)

app.use(pinia)
app.use(ElementPlus, { locale: zhCn })
app.use(router)

app.mount('#app')

//前端脚手架
