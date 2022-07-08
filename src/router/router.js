
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import("@/components/duplicate-players/duplicate-players"),
    },
    {
        path: "/dup",
        name: "duplicate_players",
        component: () => import("@/components/duplicate-players/duplicate-players"),
        meta: {
        },
    },
  ]
})

export default router
