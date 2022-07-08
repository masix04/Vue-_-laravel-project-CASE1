import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '../views/HomeView.vue'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
        path: "/dup",
        name: "duplicate_players",
        component: () => import("../components/duplicate-players/duplicate-players.vue"),
        meta: {
        },
    },
  ]
})

export default router
