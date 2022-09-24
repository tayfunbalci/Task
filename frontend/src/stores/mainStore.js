import { defineStore } from "pinia"
import { useAuthStore } from "./authStore.js";
import { useStudentStore } from "./studentStore";
import { useParentStore } from "./parentStore";




export const useMainStore = defineStore('main',{
    state: () => ({
        token: "",
        isLoggedIn: false,
    }),
    getters: {
        isAuthenticated(state){
            return state.isLoggedIn
        },
        getToken(state){
            return state.token
        }
    },
    actions: {
        logout(){
            const authStore = useAuthStore()
            authStore.logoutUser()
            authStore.$reset()
            const parentStore = useParentStore()
            parentStore.$reset()
            const studentSore = useStudentStore()
            studentSore.$reset()
        }
    }
})