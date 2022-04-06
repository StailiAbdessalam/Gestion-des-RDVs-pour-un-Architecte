import { createRouter, createWebHistory } from "vue-router";
import AddRDVp from "../view/AddRdvV.vue";
const routes = [
  {
    path: "/User/RDV",
    name: "home",
    component: AddRDVp,
  },
  {
    path: "/",
    name: "Auth",
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ "../view/Auth.vue"),
  },
  {
    path: "/User",
    name: "OLD ",

    component: () =>
      import(/* webpackChunkName: "about" */ "../view/OldRDV.vue"),
  },
  {
    path: "/Admin",
    name: "admin",
    component: () =>
      import(/* webpackChunkName: "about" */ "../view/Dashboerd.vue"),
  },
  {
    path: "/ALLRDV",
    name: "allRDV",

    component: () =>
      import(/* webpackChunkName: "about" */ "../view/AllRDV.vue"),
  },
  {
    path: "/home",
    name: "HomeP",

    component: () => import(/* webpackChunkName: "about" */ "../view/Home.vue"),
  },
  {
    path: "/Update/:id",
    name: "Update",

    component: () =>
      import(/* webpackChunkName: "about" */ "../view/UpdateRdv.vue"),
  },
  {
    path: "/UpdateUser/:id",
    name: "UpdateUser",

    component: () =>
      import(/* webpackChunkName: "about" */ "../view/UpdateUser.vue"),
  },
];
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
});
export default router;
