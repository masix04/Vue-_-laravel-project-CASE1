
<template>
    <div class="container">
        <div class="prefix-live-center">
            <div class="cr-player-perform">
                <div class="cr-header">
                    <h1>-</h1>
                    <ul class="nav-btns">
                        <li> <routerLink :to="{name: 'home'}"> Home </routerLink></li>
                        <li> <routerLink :to="{name: 'duplicate_players'}"> Remove Duplicate PLayers Anomalies </routerLink></li>
                        <li> <routerLink :to="{name: 'in_progress_cms'}"> CMS </routerLink></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

    export default {
        name:"app-header",
        data() {
            return {}
        },
    }

</script>
<style scoped>

/* .app-header {
    background-color: blue;
    color:white;
} */
.nav-btns {
    display: flex;
    list-style-type: none;
}
.nav-btns li {
    text-decoration: none;
    background-color: rgb(102, 120, 180);    
    padding:10px;
    margin:0 5px;
    border-radius: 4px;
}
.nav-btns li a {
    text-decoration: none;
    color:white;
    font-weight: 600;
}
.nav-btns li a:hover {
    color: red;
}
.nav-btns li:hover {
    background-color: #001e6e;
}
</style>