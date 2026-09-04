<script setup lang="ts">
import { onMounted } from "vue";
import axios from "axios";
import { useRouter } from "vue-router";
import { invoke } from "@tauri-apps/api/core";
import { useAuthStore } from "@/stores/auth";

const router = useRouter();

onMounted(async () => {
  try {
    const response = await axios.post("http://levelup_server.test/api/startplatform");

    const auth = useAuthStore()
    auth.logout();
    await invoke("set_window_mode", {
      role: 2,
    });

    if (response.data) {
      router.push("/login");
    } else {
      router.push("/setup");
    }
  } catch (error) {
    console.error(error);
  }
});
</script>

<template>
  <div class="loading">
    <h2>در حال راه‌اندازی...</h2>
  </div>
</template>

<style scoped>
.loading {
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  font-size: 24px;
}
h2 {
  color: aliceblue;
}
</style>
