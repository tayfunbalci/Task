import { mande } from "mande"
import { defineStore } from "pinia"
import config from "../config";
import { useMainStore } from "./mainStore";

const api = mande(config.API_URL)

api.options.headers.Accept = "application/json"

export const useParentStore = defineStore("parent", {
    state: () => ({
        auth_user: null,
        form_data: {
           first_name: null,
            last_name: null,
            tel: null,
            email: null,
            password: null,
            password_confirmation: null
        },
        update_success: null,
        errors: null
    }),
    getters: {
        getUser(state){
            return state.auth_user
        }
    },
    actions: {
        async getAuthUser(){
            this.update_success = null
            this.errors = null
            try {
                const mainStore = useMainStore();
                api.options.headers.Authorization = 'Bearer ' + mainStore.getToken;
                await api.get('auth_user').then(res => {
                    this.auth_user = res.data
                    this.form_data = res.data
                })
            }catch (error){
                if(JSON.stringify(error) == '{}'){
                    alert("Sunucuya erişilemiyor");
                }else{
                    this.errors = error.body.errors
                }
            }
        },
        async updateAuthUser(){
            this.update_success = null
            this.errors = null
            try {
                const mainStore = useMainStore();
                api.options.headers.Authorization = 'Bearer ' + mainStore.getToken;
                await api.post('auth_user_edit', {...this.form_data}).then(res => {
                    this.update_success = true
                    this.auth_user = res.data
                })
            }catch (error) {
                if(JSON.stringify(error) == '{}'){
                    alert("Sunucuya erişilemiyor");
                }else{
                    this.errors = error.body.errors
                }
            }
        }
    }
})