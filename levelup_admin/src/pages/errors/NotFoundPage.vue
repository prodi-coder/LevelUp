<script setup lang="ts">
import { useRouter } from "vue-router";

import { useAuthStore } from "@/stores/auth";

const router = useRouter();
const auth = useAuthStore()

function goHome() {
  
  if (!auth.isLogin || !auth.user) {
    router.replace("/login");
    return;
  }

  if (auth.user.role === 1) {
    router.replace("/admin/dashboard");
  } else if(auth.user.role === 2) {
    router.replace("/user/dashboard");
  }
}
</script>

<template>
  <div class="notfound-container">
    <div class="notfound-card">

      <h1 class="error-code">404</h1>

      <h2>Page Not Found</h2>

      <p>
        The page you are looking for doesn't exist
        or has been moved.
      </p>

      <button @click="goHome">
        Back to Dashboard
      </button>

    </div>
  </div>
</template>

<style scoped src="../../assets/css/global/not-found.css"></style>