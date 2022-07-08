
<template>
    <div id="app">
        <defaultLayout></defaultLayout>
    </div>
</template>

<script>
    import defaultLayout from './components/layouts/default-layouts.vue'; 

    export default {
        name: 'App',
        components: {
            defaultLayout
        }
    }
</script>

<style>
    #app {
        font-family: Avenir, Helvetica, Arial, sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
        text-align: center;
        color: #2c3e50;
        margin-top: 60px;
    }
</style>
