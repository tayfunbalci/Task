import { createRouter, createWebHistory } from "vue-router";
import HomeView from "../views/HomeView.vue";
import ContactView from "../views/ContactView.vue";
import RegisterView from "../views/Auth/RegisterView.vue";
import LoginView from "../views/Auth/LoginView.vue";
import PanelView from "../views/Panel/PanelView.vue"
import DashboardView from "../views/Panel/DashboardView.vue";
import ParentView from "../views/Panel/ParentView.vue";
import ParentEditView from "../views/Panel/ParentEditView.vue";
import StudentView from "../views/Panel/StudentView.vue";;

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: "/",
      name: "home",
      component: HomeView,
      meta: { requiresAuth: false }
    },
    {
      path: "/about",
      name: "about",
      // route level code-splitting
      // this generates a separate chunk (About.[hash].js) for this route
      // which is lazy-loaded when the route is visited.
      component: () => import("../views/AboutView.vue"),
      meta: { requiresAuth: true }
    },
    {
      path: "/contact",
      name: "contact",
      component: ContactView,
      meta: { requiresAuth: false }
    },
    {
      path: "/register",
      name: "register",
      component: RegisterView,
      meta: { requiresAuth: false }
    },
    {
      path: "/login",
      name: "login",
      component: LoginView,
      meta: { requiresAuth: false }
    },
    {
      path: "/panel",
      name: "panel",
      component: PanelView,
      meta: { requiresAuth: true },
      children: [
        { path: "", name: "dashboard", component: DashboardView },
        { path: "parent", name: "parent", component: ParentView},
        { path: "parent/edit", name: "parent_edit", component: ParentEditView},
        { path: "student", name: "student", component: StudentView },
      ]
    }
  ]
})

export default router
