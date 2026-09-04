<script setup lang="ts">
import { ref , onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";

const router = useRouter();

const username = ref("");
const password = ref("");
const confirmPassword = ref("");
const error = ref("");

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

async function pushlogin() {
  try {
    const response = await axios.post("http://levelup_server.test/api/createAdmin", {
      username: username.value,
      password: password.value,
    });
    router.push("/login")
    
  } catch (error) {
        if (axios.isAxiosError(error)) {
        console.log(error.response?.data);
        alert("ادمین ساخته نشد")
    } else{
        console.log(error);
        
    }
  }
}
async function createAdmin() {
  if (!username.value) {
    error.value = "Enter the username.";
    return;
  }
  if (!password.value) {
    error.value = "Enter the password.";
    return;
  }

  if (password.value !== confirmPassword.value) {
    error.value = "Passwords do not match";
    return;
  }
  pushlogin()
}
</script>

<template>
  <div class="login-container">
    <div class="dashboard-card">
      <div class="welcom-tex">
        <h2>خوش آمدید!</h2>
        <h4>
          این نخستین باری است که Level Up اجرا می‌شود. برای ادامه، اولین حساب کاربری مدیر را ایجاد
          کنید.
        </h4>
      </div>
      <div class="eror"> <p>{{ error }}</p></div>
      <form @submit.prevent="createAdmin" class="login-form">
        <div class="form-group">
          <label>Administrator Username</label>
          <input v-model="username" type="text" placeholder="UserName" />
        </div>
        <div class="form-group">
          <label>Administrator Password</label>
          <input v-model="password" type="password" placeholder="Password" />
        </div>
        <div class="form-group">
          <label>Confirm Password</label>
          <input v-model="confirmPassword" type="text" placeholder="Confirm Password" />
        </div>
        <div class="buttons"><button type="submit">Create Administrator</button></div>
      </form>
      <div class="coment"><h4>پس از ایجاد حساب کاربری مدیر، صفحه ورود نمایش داده خواهد شد.</h4></div>
    </div>
  </div>
</template>

<style scoped src="../assets/css/global/login.css"></style>
