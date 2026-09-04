<script setup lang="ts">
import { ref } from "vue";
import { useRouter } from "vue-router";
import  axios  from "axios";

const router = useRouter();

const username = ref("");
const password = ref("");
const repeatPassword = ref("");
const role = ref(2);

const warning = ref("");

async function createUser() {
    try{
        const response = await axios.post("http://levelup_server.test/api/createuser",{
            username: username.value,
            password: password.value,
            role: role.value
        })
        router.push('/admin/users')
    }catch{

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
  if (repeatPassword.value != password.value) {
    warning.value = "Passwords do not match.";
    return;
  }
  if (!role) {
    warning.value = "Enter the role."
    return
  }
  createUser();
}

function goBack() {
  router.back();
}
</script>

<template>
  <div class="create-user-container">
    <div class="create-user-card">
      <h1>Create User</h1>
      <p class="warning">
        {{ warning }}
      </p>
      <form @submit.prevent="chekform">
        <div class="form-group">
          <label>Username</label>
          <input v-model="username" type="text" placeholder="Enter username" />
        </div>
        <div class="form-group">
          <label>Password</label>
          <input v-model="password" type="password" placeholder="Enter password" />
        </div>
        <div class="form-group">
          <label>Repeat Password</label>
          <input v-model="repeatPassword" type="password" placeholder="Repeat password" />
        </div>
        <div class="form-group">
          <label>Role</label>
          <select v-model="role">
            <option :value="2">User</option>
            <option :value="1">Administrator</option>
          </select>
        </div>
        <div class="buttons">
          <button type="button" class="cancel-btn" @click="goBack()">
            Cancel
          </button>
          <button type="submit" class="create-btn">Create User</button>
        </div>
      </form>
    </div>
  </div>
</template>

<style scoped src="../../assets/css/admin/create-user.css"></style>
