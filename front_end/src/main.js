import { createApp } from 'vue'
import './style.css'
import router from './router'
import App from './App.vue'
import Toaster from "@meforma/vue-toaster"

const app = createApp(App)

app.use(router)
app.use(Toaster, {
  position: "top-right"
});
app.mount('#app')
