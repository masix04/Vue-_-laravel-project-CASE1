
<template>
    <div id="app">
        <ul class="app-ul">
            <li> <routerLink :to="{name: 'duplicate_teams'}"> WORKING CMS </routerLink></li>
            <li> <routerLink :to="{name: 'in_progress_cms'}"> IN CREATION CMS </routerLink></li>
        </ul>
        <div v-if="!($route.name.includes('cms'))">
            <defaultLayout></defaultLayout>
        </div>
        <div v-if="$route.name.includes('cms')" >
            <cms-1></cms-1> 
        </div>
        
    </div>
</template>

<script>
    import Cms1 from './components/layouts/cms-1.vue';
    import defaultLayout from './components/layouts/default-layouts.vue'; 

    export default {
        name: 'App',
        components: {
            defaultLayout,
            Cms1
        }
    }
</script>

<style>
    body {
        margin: 0;
    }
    #app {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        /* background-color: #B0C2E2; */
        color: #2c3e50;
        /* margin-top: 5px; */
        margin:0;
    }
    .app-ul {
        margin: 0;
        padding: 0;
        display:flex;
        background-color: thistle;
    }
    .app-ul li {
        width:10%;
        list-style-type: none;
        font-weight: 600;
        margin:5px;
        border-radius: 7px;
    }
    .app-ul li:nth-child(1) a {
        color:white;
    }
    .app-ul li:nth-child(1) {
        background-color: rgb(153, 176, 238);
        padding:10px;
        display: flex;
    }
    .app-ul li:nth-child(1):hover {
        background-color: rgb(45, 72, 224);
    }
    
    .app-ul li a {
        text-decoration: none;
    }

    .app-ul li:nth-child(2) a {
        color:white;
    }
    .app-ul li:nth-child(2) {
        background-color: rgb(186, 160, 247);
        padding:10px;
                display: flex;
    }
    .app-ul li:nth-child(2):hover {
        background-color: rgb(89, 72, 129);
    }

</style>
