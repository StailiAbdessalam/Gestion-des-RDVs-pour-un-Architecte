import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../view/HomeUser.vue'

const routes = [
  {
    path: '/',
    name: 'home',
    component: HomeView
  },
  {
    path: '/Auth',
    name: 'Auth',
    // route level code-splitting
    // this generates a separate chunk (about.[hash].js) for this route
    // which is lazy-loaded when the route is visited.
    component: () => import(/* webpackChunkName: "about" */ '../view/Auth.vue')
  },
  {
    path: '/OldRdv',
    name: 'Error404',

    component: () => import( /* webpackChunkName: "about" */ '../view/OldRdv.vue')
  },
  {
    path: '/z',
    name: 'admin',

    component: () => import(/* webpackChunkName: "about" */ '../view/Dashboerd.vue')

  },

]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router;
