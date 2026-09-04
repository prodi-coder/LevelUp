import { defineStore } from "pinia";
import { ref } from "vue";

export const useAuthStore = defineStore("auth", () => {

    interface User {
        id: number;
        role: number;
    }
    const user = ref<User | null>(null);
    const isLogin = ref(false);
    
    function login(userData : User){
        user.value = userData
        isLogin.value = true
    }

    function logout(){
        user.value = null;
        isLogin.value = false;
    }


    function clear(){

    }

    return {
        user,
        isLogin,
        login,
        logout,
        clear,
    };
});