
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import("@/components/Home/home"),
    },
    {
        path: "/dup",
        name: "duplicate_players",
        component: () => import("@/components/duplicate-players/duplicate-players"),
        meta: {
        },
    },
    {
      path: "/edit/:playerid/:teamid/:playername/:playerslug",
      name: "edit_duplicate_players",
      component: () => import("@/components/duplicate-players/edit-player"),
      meta: {
      },
  },
  ]
})

export default router
