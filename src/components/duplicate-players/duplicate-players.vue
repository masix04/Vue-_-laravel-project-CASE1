<template>
    <main class="container">
        <div class="prefix-live-center">
            <div class="cr-player-perform">
                <div class="cr-player-heading">
                    <h1>Duplicate Players</h1>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>Data Count</th>
                            <th>Team ID</th>
                            <th>Player ID</th>
                            <th>Player Name</th>
                            <th>Slug</th>
                            <th>Shortname</th>
                            <th>Avatar</th>
                            <th><b>EDIT</b></th>
                            <th><b>DELETE</b></th>
                        </thead>
                        <tbody>

                            <tr v-for="player,key in data.players" :key="key">
                                <td :style="[ getSafe( () => ( (player.player_id == data.players[key+1].player_id) && (player.team_id == data.players[key+1].team_id) )? {backgroundColor : 'red', color: 'white', fontSize: 20+'px', fontWeight: 600} : {backgroundColor : 'white'} ) ] "> {{ key }} </td>
                                <td> {{ player.team_id }} </td>
                                <td> {{ player.player_id }} </td>
                                <td> {{ player.players.name }} </td>
                                <td> {{ player.players.slug }} </td>
                                <td> {{ player.players.short_name }} </td>
                                <td><img :src="player.players.avatar" :alt="player.players.name" /> </td>
                                <td :style="{ color: 'green', cursor: 'pointer'}" @click="edit_player(player)">  Edit </td>
                                <!-- <td :style="{ color: 'red', cursor: 'pointer'}" @click="delete_player(player.player_team_id, player.player_id, player.team_id)">  Delete </td> -->
                                <td :style="{ color: 'red', cursor: 'pointer'}" @click="delete_player_with_post(player.player_team_id, player.player_id, player.team_id)">  Delete </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "DuplicatePlayerTeam",
        data() {
            return {
                data: [],
                axios: axios,
            }
        },
        watch: {
            'this.data' () {
                this.getDuplicatePlayers();
            }
        },
        mounted() {
            this.getDuplicatePlayers();
        },
        methods: {
            getSafe(fn) {
                try {
                    return fn();
                } catch (e) {
                    return ""
                }
            },
            getDuplicatePlayers() {
                // let url = "http://localhost:8000/api/duplicate-players";
                let url = "http://localhost:8001/api/duplicate-players";
                this.axios.get(url)
                .then(response => {
                    if(response) {
                        // console.log(response.data.data.duplicate_players);
                        this.data = response.data.data.duplicate_players;
                    }
                })
                .catch(error => console.log(error));
            },
            edit_player(playerObj) {
                // console.log(playerObj);
                // console.log(this.getSafe(()=> playerObj.players['name']));
                this.$router.push({name: 'edit_duplicate_players', params: 
                                        {
                                            playerid: playerObj.player_id, 
                                            teamid: playerObj.team_id, 
                                            playername: playerObj.players.name, 
                                            playerslug : playerObj.players.slug
                                        }
                                });
                
            },
            // delete_player(player_team_id, player_id, team_id) {
            //     let url = "http://localhost:8000/api/delete-duplicate-players";
            //     let url = "http://localhost:8001/api/delete-duplicate-players";
            //     let payload = {
            //       'player_team_id': player_team_id,
            //       'player_id': player_id,
            //       'team_id': team_id
            //     };

            //     this.axios.delete(url, {
            //         headers: {
            //             // Authorization: "***",
            //             // Accept: "*/*",
            //             // AcceptEncoding: "gzip, deflate, br",
            //             // Connection: "keep-alive",
            //         },
            //         data: {
            //             payload,
            //         },
            //     })
            //     .catch(error => console.log(error));
            // },
            delete_player_with_post(player_team_id, player_id, team_id) {
                // let url = "http://localhost:8000/api/delete-duplicate-players";
                let url = "http://localhost:8001/api/delete-duplicate-players";

                this.axios.post(url, {
                    _method: 'DELETE',
                    header: {
                        Authorization: "***"
                    },
                    data: {
                        'player_team_id': player_team_id,
                        'player_id': player_id,
                        'team_id': team_id,
                    },
                })
                .catch(error => console.log(error));
            }
        }
    }

</script>