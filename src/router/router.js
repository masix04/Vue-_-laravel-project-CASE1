
import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env),
  routes: [
    {
      path: '/',
      name: 'home',
      component: () => import("@/components/Home/home"),
    },
    /** Routes for Teams   */
    {
        path: "/dup",
        name: "duplicate_teams",
        component: () => import("@/components/duplicate-teams/duplicate-teams"),
        meta: {
        },
    },
    {
      path: "/edit/:teamid/:tourid/:teamname/:teamslug",
      name: "edit_duplicate_teams",
      component: () => import("@/components/duplicate-teams/edit-team"),
      meta: {
      },
    },
    {
        path: '/cms',
        name: 'in_progress_cms',
        component: () => import("@/components/layouts/cms-1"),
    }
  ]
})

export default router
