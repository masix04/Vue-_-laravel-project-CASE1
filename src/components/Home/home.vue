<template>
    <div>
        <ul>
            <li> <routerLink :to="{name: 'duplicate_players'}"> Remove Duplicate PLayers Anomalies </routerLink></li>
        </ul>
    </div>
</template>

<script>

export default {
    name: 'app-home',
    data() {
        return {};
    }
}

</script>
<style scoped>

    li {
        list-style-type: none;
    }
    a {
        text-decoration: none;
        color:black;
        font-weight: 600;
        padding:5px;
    }
    a:hover {
        text-decoration: underline;
        border-bottom:red 5px solid ;
        font-weight: 600;
        animation: border 2s linear;
    }
    @keyframes border {
        /* from {border-bottom: red 1px solid;} */
        to {border-bottom: rgb(71, 65, 160) 5px solid;}
    }
</style>