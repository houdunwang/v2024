import { createApp } from 'vue'
import App from './App.vue'
import '@renderer/assets/tailwind.css'
import '@renderer/assets/global.scss'

//element ui
import ElementPlus from 'element-plus'
import 'element-plus/dist/index.css'
//router
import router from '@renderer/router'

const app = createApp(App)
app.use(ElementPlus)
app.use(router)

app.mount('#app')

//前端脚手架
