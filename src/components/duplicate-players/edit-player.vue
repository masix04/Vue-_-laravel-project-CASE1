<template>
    <main class="container">
        <div class="prefix-live-center">
            <div class="cr-player-perform">
                <div class="cr-player-heading">
                    <h1>Edit Players</h1>
                </div>
                <div class="edit_player_page">
                    <form :on:submit="edit_player()">
                        <label for="playerid" name = "player ID">Player ID</label>
                        <input name = "playerid" type="text" :value="$route.params.playerid" readonly />
                        
                        <label for="playername" name = "player name">player name</label>
                        <input name = "playername" type="text" :value="$route.params.playername" placeholder="player name" />
                        
                        <label for="teamid" name = "Team ID">Team ID</label>
                        <input name = "teamid" type="text" :value="$route.params.teamid" readonly />

                        <label for="playerslug" name = "player Slug">player Slug</label>
                        <input name = "playerslug" type = "text" :value="$route.params.playerslug" placeholder="player short_name" />

                        <input type = "submit" value="Update PLayer" />

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
                // player_data: this.$route.params.player,
                axios: axios,
            };
        },
        mounted() {
            console.log(this.$route.params);
        },  
        methods: {
            edit_player() {
                // let url = "http://localhost:8000/api/edit-duplicate-players";
                
                // this.axios.put(url,{
                //     data: {
                //         'player_id': 12,
                //         'team_id': 18,
                //     },
                // })
                // .then(response => {
                //     if(response) {
                //         console.log(response.data.data.duplicate_players);
                //         this.data = response.data.data.duplicate_players;
                //     }
                // })
                // .catch(error => console.log(error));
            }
        },  
    }

</script>