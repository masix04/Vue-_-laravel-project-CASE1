<template>
    <div class="app-footer-2">
        <div class="left-footer">
            <a href="https://www.github.com/authenticated-user"> Vue.Crud Github.authenticated User</a>
        </div>
         <div class="middle-footer">
            <span> Employees Company</span>
        </div>
         <div class="right-footer">
            <a href="javascript:void(0)"> @ 2022 </a>
        </div>
    </div>
</template>

<script>

    export default {
        name:"app-footer-2",
        data() {
            return{}
        },
        mounted() {},
    }

</script>
<style scoped>

    .app-footer-2 {
        height:40px;
        width:100%;
        background-color: rgb(155, 64, 155);
    }
    .left-footer {
        width:30%;
        float:left;
        padding:11px;
        text-align: left;
    }
    .left-footer a {
        color:white;
        text-decoration: none;
    }
    .left-footer a:hover {
        text-decoration: underline;
    }
    .middle-footer {
        width:36%;
        float:left;
        padding:10px;
    }
    .middle-footer span {
        color:white;
    }
    .right-footer {
        width:30%;
        float:right;
        text-align: right;
        padding: 10px 20px 0 0 ;
    }
    .right-footer a {
        color:white;
        text-decoration: none;
    }
</style>