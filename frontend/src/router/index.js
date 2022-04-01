import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../view/HomeUser.vue'

const routes = [
  {
    path: '/User/RDV',
    name: 'home',
    component: HomeView
  },
  {
    path: '/',
    name: 'Auth',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../view/Auth.vue')
  },
  {
    path: '/User',
    name: 'OLD',

    component: () => import( /* webpackChunkName: "about" */ '../view/OldRDV.vue')
  },
  {
    path: '/Admin',
    name: 'admin',

    component: () => import(/* webpackChunkName: "about" */ '../view/Dashboerd.vue')

  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router;
