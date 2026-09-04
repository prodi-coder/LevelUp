<script setup lang="ts">
import { ref, onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { invoke } from "@tauri-apps/api/core";
import { useAuthStore } from "@/stores/auth";

const passwordInput = ref<HTMLInputElement | null>(null);

const router = useRouter();

const username = ref("");
const password = ref("");
const warning = ref("");

onMounted(async () => {
  try {
    const response = await axios.post("http://levelup_server.test/api/startplatform");

    if (response.data) {
      router.push("/login");
    } else {
      router.push("/setup");
    }
  } catch (error) {
    console.error(error);
  }
});

async function login() {

  try {
    const response = await axios.post("http://levelup_server.test/api/login", {
      username: username.value,
      password: password.value,
    });
    
    const user = {
      id: response.data.id,
      role: response.data.role,
    };

    await invoke("set_window_mode", {
      role: user.role,
    });
    
    const auth = useAuthStore()
    auth.login(user)
    
    if (user.role == 1) {
      router.push("/admin/dashboard");
      console.log("1234")
    } else if (user.role == 2) {
      router.push("/user/dashboard");
    }
  } catch (error) {
    warning.value= "نام کاربری یا رمز عبور اشتباه است"
  }
}

async function chekform() {
  if (!username.value) {
    warning.value = "Enter the username.";
    return;
  }
  if (!password.value) {
    warning.value = "Enter the password.";
    return;
  }
  login();
}
</script>

<template>
  <div class="login-container">
    <div>
      <div class="dashboard-card">
        <h1>level up platform</h1>
        <p>{{ warning }}</p>
      </div>
        <form @submit.prevent="chekform" class="login-form">
          <div class="form-group">
            <label>User Name</label>

            <input
              v-model="username"
              type="text"
              placeholder="UserName"
              @keydown.enter.prevent="passwordInput?.focus()"
            />
          </div>

          <div class="form-group">
            <label>Password</label>

            <input
              ref="passwordInput"
              v-model="password"
              type="password"
              placeholder="Password"
            />
          </div>

          <div class="buttons">
            <button type="submit">login</button>
          </div>
        </form>
    </div>
  </div>
</template>

<style scoped src="../assets/css/global/login.css"></style>
