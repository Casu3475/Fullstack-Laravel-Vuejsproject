import { createApp } from 'vue'
import App from './App.vue'
import router from './router'

import './style.css'

import swal from 'sweetalert';


const app = createApp(App)

app.use(router)

app.mount('#app')
