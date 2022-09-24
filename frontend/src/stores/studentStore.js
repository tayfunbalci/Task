import { mande } from 'mande'
import { defineStore } from "pinia"
import config from "../config"
import { useMainStore } from "./mainStore";

const api = mande(config.API_URL)
api.options.headers.Accept = "application/json"

export const useStudentStore = defineStore('student',{
    state: () => ({
        students: null,
        selectClass: "all",
        classes: {
            "1": "1. Sınıf",
            "2": "2. Sınıf",
            "3": "3. Sınıf",
            "4": "4. Sınıf",
            "5": "5. Sınıf",
        }
    }),
    getters: {
        getStudents(state){
            if(state.selectClass != "all"){
                return state.students.filter((student) => student.classroom == state.selectClass)
            }else{
                return state.students
            }
        }
    },
    actions: {
        async initStudent(){
            try {
                const mainStore = useMainStore();
                api.options.headers.Authorization = 'Bearer ' + mainStore.getToken;
                await api.get('student').then(res => {
                    this.students = res.data
                })
            }catch (error){
                if(JSON.stringify(error) == '{}'){
                    alert("Sunucuya erişilemiyor");
                }else{
                    this.errors = error.body.errors
                }
            }
        }
    }
})