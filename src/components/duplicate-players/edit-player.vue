<template>
    <main class="container">
        <div class="prefix-live-center">
            <div class="cr-player-perform">
                <div class="cr-player-heading">
                    <h1>Edit Players</h1>
                </div>
                <div class="edit_player_page">
                    <form @submit.prevent="edit_player()">
                        <div class="row">
                            <div class="col-25">
                                <label for="playerid" name = "player ID">Player ID</label>
                            </div>
                            <div class="col-75">
                                <input name = "playerid" type="text" :value="$route.params.playerid" ref="player_id" readonly />
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="playername" name = "player name">player name</label>
                            </div>
                            <div class="col-75">
                                <input name = "playername" type="text" :value="$route.params.playername" ref="player_name" placeholder="player name" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-25">
                                <label for="teamid" name = "Team ID">Team ID</label>
                            </div>
                            <div class="col-75">
                                <input name = "teamid" type="text" :value="$route.params.teamid" ref="team_id" readonly />
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-25">
                                <label for="playerslug" name = "player Slug">player Slug</label>
                            </div>
                            <div class="col-75">
                                <input name = "playerslug" type = "text" :value="$route.params.playerslug" ref="player_slug" placeholder="player short_name" />
                            </div>
                        </div>
                        
                        <div class="row">
                            <input type="submit" value="Update PLayer" />
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "edit-player",
        data() {
            return{
                axios: axios,
            };
        },
        mounted() {
            console.log(this.$route.params);
        },  
        methods: {
            edit_player() {
                // let url = "http://localhost:8000/api/edit-duplicate-players";
                let url = "http://localhost:8001/api/edit-duplicate-players";
                
                this.axios.put(url,
                    {
                        "player_id": this.$refs.player_id.value,
                        "name": this.$refs.player_name.value,
                        "slug": this.$refs.player_slug.value,
                        "team_id": this.$refs.team_id.value,
                    }
                )
                .catch(error => console.log(error));
            }
        },  
    }

</script>
<style scoped>

    .edit_player_page {
        height:400px;
    }
    .edit_player_page form {
        height: inherit;
    }
    .edit_player_page form input[type=text], select, textarea {
        width: 95%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        font-size: 16px;
    }

    .edit_player_page form label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    .edit_player_page form input[type=submit] {
        background-color: #1f82c4;
        color: white;
        padding: 12px 20px;
        margin: 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        float: right;
        font-size: 18px;
        font-weight: 600;
    }

    .edit_player_page form input[type=submit]:hover {
        background-color: #45a049;
    }

    .edit_player_page form .row .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .edit_player_page form .row .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .edit_player_page form .row:after {
        content: "";
        display: table;
        clear: both;
    }
    @media screen and (max-width: 600px) {
        .edit_player_page form .row .col-25,
         .edit_player_page form .row .col-75,
         .edit_player_page form input[type=submit] {
            width: 50%;
            margin: 10px 0;
        }
    }

</style>