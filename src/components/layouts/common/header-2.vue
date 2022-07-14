<template>
    <div class="app-header-2">
       <div class="left-header">
            <img src="favicon.ico" alt="logo" />
            <span>
                CMS - 1
            </span>
       </div>
       <div class="right-header">
            <span class="left-bar-span">
                CMS => Messages
            </span>
            <ul class="header-multi-lang-icons-list">
                <li> <img src="images/eng.png"/></li>
                <li> <img src="images/uk.png"/></li>
                <li> <img src="images/hindi.png"/></li>
            </ul>
            <ul class="header-icons-list">
                <li> <a href="javascript:void(0)"><img class="header-setting-icon" src="images/settings-50.svg"/> </a> </li>
            </ul>
       </div>
    </div>
</template>

<script>

    export default {
        name:"app-header-2",
        data() {
            return{}
        },
        mounted() {},
    }

</script>
<style scoped>
    
    /** Header CSS */
    .app-header-2 {
        height:80px;
        background-color: silver;
        box-shadow:  0px 3px 7px #3b2d3b;
    }

    .left-header {
        width:20%;
        background-color: rgb(155, 64, 155);
        height: inherit;
        float:left;
        color:white;
    }
    .left-header img {
        margin-left:10px;
        float:left;
        height:80px;
        width:80px;
    }
     .left-header span {
        float:right;
        padding:19px;
        font-size: 36px;
    }
    .right-header {
        width:80%;
        background-color: rgb(73, 67, 67);
        height: inherit;
        float:left;
        color:white;
    }
    .right-header .left-bar-span {
        float:left;
        padding: 26px;
        font-size: 24px;
    }
    .right-header .header-multi-lang-icons-list {
        float:right;
        list-style-type: none;
        display: flex;
        padding: 15px;
    }
    .right-header .header-icons-list {
        list-style-type: none;
        display: flex;
        float: right;
    }
    .right-header .header-multi-lang-icons-list li, .right-header .header-icons-list li {
        margin: 0 10px;
    }
    .right-header .header-icons-list a .header-setting-icon:hover {
        transform: rotateX(180deg);
        transform: rotateY(180deg);
    }

    /** End of Header CSS */
    
</style>