import { mande } from "mande"
import { defineStore } from "pinia"
import config from "../config"
import router from "../router";
import { useMainStore } from "./mainStore";

const api = mande(config.API_URL)
api.options.headers.Accept = "application/json"


export const useAuthStore = defineStore("auth",{
    state: () => ({
        registerData: {
            first_name: null,
            last_name: null,
            tel: null,
            email: null,
            password: null,
            password_confirmation: null,
            code: null
        },
        loginData: {
            email: null,
            password: null,
            app_name: config.APP_NAME
        },
        success: false,
        errors: [],
    }),
    actions: {
        async registerUser(){
            this.errors = null
            try {
                await api.post('register', {...this.registerData}).then(() => {
                    this.success = true
                });
            } catch (error) {
                if(JSON.stringify(error) == '{}'){
                    alert("Sunucuya erişilemiyor");
                }else{
                    this.success = false
                    this.errors = error.body.errors
                }
            }
        },
        async loginUser(){
            this.errors = null
            try {
                const response = await api.post('login', {...this.loginData})
                localStorage.setItem('token', response.token)
                const main = useMainStore()
                main.$patch({
                    token: response.token,
                    isLoggedIn: true
                })
                router.push('panel')
            } catch (error) {
                if(JSON.stringify(error) == '{}'){
                    alert("Sunucuya erişilemiyor");
                }else{
                    this.success = false
                    this.errors = error.body.errors
                }
            }
        },
        async logoutUser(){
            this.errors = null
            try {
                api.options.headers.Authorization = 'Bearer ' + localStorage.getItem('token');
                await api.post('logout')
                localStorage.removeItem('token')
                const main = useMainStore()
                main.$patch({
                    token: null,
                    isLoggedIn: false
                })
                router.push('/login')
            } catch (error) {
                if(JSON.stringify(error) == '{}'){
                    alert("Sunucuya erişilemiyor");
                }else{
                    this.success = false
                    this.errors = error.body.errors
                }
            }
        }
    }
})