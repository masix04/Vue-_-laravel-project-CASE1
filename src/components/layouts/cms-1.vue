<template>
    <div>
        <app-header-2></app-header-2>
        <app-nav-2></app-nav-2>

        <!-- <router-view/> -->

        <app-footer-2></app-footer-2>
    </div>
</template>

<script>
    import appNav2 from "@/components/layouts/common/nav-2"; 
    import appFooter2 from "@/components/layouts/common/footer-2"; 
    import appHeader2 from "@/components/layouts/common/header-2"; 
    
    export default {
        name:"cms-1",
        data() {
            return{}
        },
        components: {
            appNav2, appHeader2, appFooter2
        },  
        mounted() {},
    }

</script>
<style scoped>

</style>