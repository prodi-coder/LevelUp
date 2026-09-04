import { createRouter, createWebHistory } from "vue-router";

import { useAuthStore } from "@/stores/auth";

import LoginPage from "@/pages/LoginPage.vue";
import Startplatform from "@/pages/startplatform.vue";
import SetupPage from "@/pages/SetupPage.vue";

import NotFoundPage from "@/pages/errors/NotFoundPage.vue";

import AdminDashboard from "@/pages/admin/AdminDashboard.vue";
import AdminUsers from "@/pages/admin/manageUsers.vue";
import createuser from "@/pages/admin/createuser.vue";

import UserDashboard from "@/pages/user/UesrDashboard.vue";

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),

  routes: [
    {
      path: "/",
      name: "start",
      component: Startplatform,
    },
    {
      path: "/setup",
      name: "setup.page",
      component: SetupPage,
    },
    {
      path: "/login",
      name: "login",
      component: LoginPage,
    },
    {
      path: "/admin/dashboard",
      name: "admin.dashboard",
      meta: {
        requiresAuth: true,
        role: 1,
      },
      component: AdminDashboard,
    },
    {
      path: "/user/dashboard",
      name: "user.dashboard",
      meta: {
        requiresAuth: true,
        role: 2,
      },
      component: UserDashboard,
    },
    {
      path: "/admin/users",
      name: "users",
      meta: {
        requiresAuth: true,
        role: 1,
      },
      component: AdminUsers,
    },
    {
      path: "/admin/createuser",
      name: "createuser",
      meta: {
        requiresAuth: true,
        role: 1,
      },
      component: createuser,
    },
    {
      path: "/:pathMatch(.*)*",
      name: "not-found",
      component: NotFoundPage,
    },
  ],
});

router.beforeEach((to, from) => {
  const auth = useAuthStore();

  if (to.path === "/") {
    return true;
  }

  if (to.path === "/setup") {
    return true;
  }

  // اگر کاربر وارد /login شد
  if (to.path === "/login") {
    if (auth.user?.role === 1) {
      return "/admin/dashboard";
    }

    if (auth.user?.role === 2) {
      return "/user/dashboard";
    }

    return true;
  }

  // صفحات نیازمند احراز هویت
  if (to.meta.requiresAuth) {
    if (!auth.isLogin) {
      return "/login";
    }

    // بررسی Role
    if (to.meta.role && auth.user?.role !== to.meta.role) {
      return "/login";
    }
  }

  return true;
});

export default router;
