/* eslint-disable */
// import Vue from "vue";
// import createRouter from "vue-router";
// import authenticate from "./middlewares/authenticate";
// import guest from "./middlewares/guest";
// import middlewarePipeline from "./middlewarePipeline";
        // Vue.use(Router);
//-----------Prevent SSR Duplicate Routing issue----------------
        // const originalPush = Router.prototype.push;
        // Router.prototype.push = function push(location) {
        // return originalPush.call(this, location).catch(err => err)
        // };
//---------------------------------------------------------------
import { createRouter, createWebHistory } from 'vue-router'

const routes = [
  {
    path: '/',
    name: 'Home',
    component: () => import("@/components/duplicate-players/duplicate-players"),
  },
]
const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
});

export default createRouter();
// export function creaRouter () {

//     const routes = new createRouter({
//         linkActiveClass: "active",
//         mode: "history",
//         routes: [
//             {
//                 path: "/players/duplicate_players",
//                 name: "duplicate_players_from_player_team",
//                 component: () => import("@/components/duplicate-players/duplicate-players"),
//             },
//             {
//                 path: "/d_p",
//                 name: "duplicate_players_from_player_team",
//                 component: () => import("@/components/duplicate-players/duplicate-players"),
//             },
//             ]
//     });
// }
