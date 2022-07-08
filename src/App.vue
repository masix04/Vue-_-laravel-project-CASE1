
<template>
    <div id="app-home">
        <!-- <div class="two-columns">
            <div class="content"> -->
                <!-- <div class="wrapper"> -->
                    <nav>
                        <RouterLink :to = "{ name : 'duplicate_players' }"> Duplicate Players </RouterLink>
                        <RouterLink :to = "{ name : 'home' }"> Home </RouterLink>
                    </nav>
                <!-- </div> -->
                    <!-- <div class="sidebar"> -->
                        <defaultLayout></defaultLayout>
                    <!-- </div> -->
                <!-- </div> -->
            <!-- </div>
        </div> -->
    </div>
</template>

<script>
    // import { RouterLink, RouterView } from 'vue-router' 
    import defaultLayout from './components/layouts/default-layouts.vue'; 
    export default {
        name: 'App',
        components: {
            defaultLayout
        }
    }
</script>

<style>
@import '@/assets/base.css';

/* #app {
  max-width: 250%;
  margin: 0 auto;
  font-weight: normal;
} */
/* #app-home {
  max-width: 250%;
  margin: 0 auto;

  font-weight: normal;
} */
a,
.green {
  text-decoration: none;
  color: hsla(160, 100%, 37%, 1);
  transition: 0.4s;
}

@media (hover: hover) {
  a:hover {
    background-color: hsla(160, 100%, 37%, 0.2);
  }
}

nav {
  margin:20px;
  width: 50%;
  font-size: 12px;
  text-align: center;
}

nav a.router-link-exact-active {
    color: var(--color-text);
    padding: 10px;
    border-top:rgb(5, 151, 71) 3px solid;
}

nav a.router-link-exact-active:hover {
  background-color: transparent;
}

nav a {
  display: inline;
  padding: 0 1rem;
  border-left: 1px solid var(--color-border);
  border-bottom: 1px solid var(--color-border);
  font-size: 16px;
}


/* @media (min-width: 1024px) { */
  body {
    display: block;
    place-items: center;
  }

  #app-home {
    /* margin:10px; */
    display: block;
    /* grid-template-columns: 1fr 1fr; */
    padding: 0 2rem;
  }

  /* .wrapper {
    margin: 1rem 3rem;
    display: flex;
    place-items: flex-start;
    flex-wrap: wrap;
  } */

  /* .logo {
    margin: 0 2rem 0 0;
  } */

  /* nav {
    text-align: left;
    margin: 0rem 3rem 0rem 0rem;
    font-size: 1rem;

    padding: 1rem 0;
  } */
/* } */
</style>
