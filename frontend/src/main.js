
import { createApp } from "vue"
import { createPinia } from "pinia"

import App from "./App.vue"
import router from "./router"

// import './assets/main.css'
import "bootstrap/dist/css/bootstrap.min.css"
import "bootstrap/dist/js/bootstrap"
import { useMainStore } from "./stores/mainStore";

const pinia = createPinia()
const app = createApp(App)

app.use(pinia)
app.use(router)

router.beforeEach((to) => {
    // ✅ This will work make sure the correct store is used for the
    // current running app
    const main = useMainStore(pinia)
    // app.use(main)
    const token = localStorage.getItem('token')
    if(token){
        main.$patch({
            token,
            isLoggedIn: true,
        })
    }
    // main.isLoggedIn = false
    // if(token)
    //     main.isLoggedIn = true

    if (to.meta.requiresAuth && !main.isLoggedIn) return '/login'
})

app.mount('#app')
