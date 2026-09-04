<script setup lang="ts">
import { useRouter } from "vue-router";
import { useAuthStore } from "@/stores/auth";

const router = useRouter();

function logout() {
  
  const auth = useAuthStore()
  auth.logout()
  
  router.push("/login");
}
</script>

<template>
  <div class="user-dashboard">

    <div class="dashboard-card">

      <h1>Welcome</h1>

      <p class="subtitle">
        Level Up Platform
      </p>

      <div class="menu">

        <button @click="router.push('/admin/createuser')">
          🎮 My Profile
        </button>

        <button>
          💰 My Wallet
        </button>

        <button>
          ⭐ My Level
        </button>

        <button>
          🏆 Achievements
        </button>

        <button>
          📜 Activity
        </button>

      </div>

      <button
        class="logout-btn"
        @click="logout"
      >
        Logout
      </button>

    </div>

  </div>
</template>

<style scoped src="../../assets/css/user/user-dashboard.css"></style>