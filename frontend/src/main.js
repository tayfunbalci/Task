
import { createApp } from "vue"
import { createPinia } from "pinia"

import App from "./App.vue"
import router from "./router"

import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap"

import { useMainStore } from "./stores/mainStore";

const pinia = createPinia()
const app = createApp(App)

app.use(pinia)
app.use(router)

router.beforeEach((to) => {

    const main = useMainStore(pinia)
    const token = localStorage.getItem('token')
    if(token){
        main.$patch({
            token,
            isLoggedIn: true,
        })
    }

    if (to.meta.requiresAuth && !main.isLoggedIn) return '/login'
})

app.mount('#app')
