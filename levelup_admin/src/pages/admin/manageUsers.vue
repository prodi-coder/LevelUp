<script setup lang="ts">
import { useRouter } from "vue-router";
import { ref, onMounted } from "vue";
import axios from "axios";

const router = useRouter();

type User = {
  id: number;
  username: string;
  role: number;
};
const users = ref<User[]>([]);

onMounted(async () => {
  try {
    const response = await axios.post("http://levelup_server.test/api/get_users");
    console.log(response.data)

    users.value = response.data
  } catch (error) {
    console.log(error)
  }
});
</script>

<template>
  <div class="users-container">
    <div class="users-card">
      <div class="header">
        <h1>Manage Users</h1>

        <button class="create-btn" @click="router.push('/admin/createuser')">+ Create User</button>
      </div>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Role</th>
            <th>Actions</th>
          </tr>
        </thead>

        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td>{{ user.id }}</td>

            <td>{{ user.username }}</td>

            <td>{{ user.role === 1 ? "ادمین" : "کاربر" }}</td>

            <td class="actions">
              <button class="edit-btn">Edit</button>

              <button class="delete-btn">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>

      <div class="footer">
        <button class="back-btn" @click="router.push('/login')">Back</button>
      </div>
    </div>
  </div>
</template>

<style scoped src="../../assets/css/admin/manage-users.css"></style>
