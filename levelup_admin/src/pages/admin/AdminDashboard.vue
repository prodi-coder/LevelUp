<script setup lang="ts">
import { useRouter } from "vue-router";
import { invoke } from "@tauri-apps/api/core";
import { useAuthStore } from "@/stores/auth";

const router = useRouter();

function logout() {
    const auth = useAuthStore()
    auth.logout();
  router.replace("/login");
}

async function setwindow() {
  await invoke("set_window_mode", {
    role: 2,
  });
  logout()
}
</script>

<template>
  <div class="dashboard-container">
    <div class="dashboard-card">
      <h1>LEVEL UP PLATFORM</h1>

      <p>
        Welcome, Administrator
        <br />
        You are logged in as Admin.
      </p>

      <div class="buttons">
        <button @click="router.push('/admin/createuser')">Create User</button>

        <button @click="router.push('/admin/users')">Manage Users</button>

        <button @click="setwindow()">Logout</button>
      </div>

      <div class="version">Mini Level Up v0.1.0</div>
    </div>
  </div>
</template>

<style scoped src="@/assets/css/admin/admin-dashboard.css"></style>
