<template>
    <main class="container">
        <div class="prefix-live-center">
            <div class="cr-player-perform">
                <div class="cr-player-heading">
                    <h1>Duplicate Teams</h1>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <th>Data Count</th>
                            <th>Tournament ID</th>
                            <th>Team ID</th>
                            <th>Team Name</th>
                            <th>Slug</th>
                            <th>Shortname</th>
                            <th>Flag</th>
                            <th><b>EDIT</b></th>
                            <th><b>DELETE</b></th>
                        </thead>
                        <tbody v-if="data.teams">

                            <tr v-for="team,key in data.teams" :key="key">
                                <td :style="[ getSafe( () => ( (team.tournament_id == data.teams[key+1].tournament_id) && (team.team_id == data.teams[key+1].team_id) )? {backgroundColor : 'red', color: 'white', fontSize: 20+'px', fontWeight: 600} : {backgroundColor : 'white'} ) ] "> {{ key }} </td>
                                <td> {{ team.tournament_id }} </td>
                                <td> {{ team.team_id }} </td>
                                <td> {{ team.teams.name }} </td>
                                <td> {{ team.teams.slug }} </td>
                                <td> {{ team.teams.code }} </td>
                                <td><img :src="team.teams.flag" :alt="team.teams.name" /> </td>
                                <td :style="{ color: 'green', cursor: 'pointer'}" @click="edit_team(team)">  Edit </td>
                                <!-- <td :style="{ color: 'red', cursor: 'pointer'}" @click="delete_team(team.player_team_id, team.player_id, team.team_id)">  Delete </td> -->
                                <td :style="{ color: 'red', cursor: 'pointer'}" @click="delete_team(team.tour_team_id, team.team_id, team.tour_id)">  Delete </td>
                            </tr>

                        </tbody>
                        
                    </table>
                    <p v-if="!data.teams">
                        No Duplicate Teams Found.
                    </p>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
    import axios from 'axios';
    export default {
        name: "DuplicateTournamentTeam",
        data() {
            return {
                data: [],
                axios: axios,
                deleteCheck: '',
                trueCheckCount: 0
            }
        },
        watch: {
            'this.data' () {
                this.getDuplicateTeams();
            },
            deleteCheck(){
                this.getDuplicateTeams();
            },
        },
        mounted() {
            this.getDuplicateTeams();
        },
        methods: {
            getSafe(fn) {
                try {
                    return fn();
                } catch (e) {
                    return ""
                }
            },
            getDuplicateTeams() {
                // let url = "http://localhost:8000/api/duplicate-teams";
                let url = "http://localhost:8001/api/duplicate-teams";
                this.axios.get(url)
                .then(response => {
                    if(response) {
                        // console.log(response.data.data.duplicate_teams);
                        this.data = response.data.data.duplicate_teams;
                    }
                })
                .catch(error => console.log(error));
            },
            edit_team(teamObj) {
                // console.log(this.getSafe(()=> playerObj.players['name']));
                this.$router.push({name: 'edit_duplicate_teams', params: 
                                        {
                                            teamid: teamObj.team_id, 
                                            tourid: teamObj.tournament_id, 
                                            teamname: teamObj.teams.name, 
                                            teamslug : teamObj.teams.slug
                                        }
                                });
                
            },
            delete_team(tour_team_id, tour_id, team_id) {
                // let url = "http://localhost:8000/api/delete-duplicate-teams";
                let url = "http://localhost:8001/api/delete-duplicate-teams";

                this.axios.delete(url, {
                        data: {
                            "tour_team_id" : tour_team_id,
                            "tour_id" : tour_id,
                            "team_id" : team_id,
                        }
                    }
                )
                .then(response => {
                    if(response) {
                        this.deleteCheck = response.data.deleted;
                        if(this.deleteCheck == true) {
                            this.deleteCheck = this.deleteCheck+ '-' + response.data.data;
                        }
                    }
                })
                .catch(error => console.log(error));
            }
        },
        computed: {
            isTrue() {
                return this.deleteCheck;
                /** Value remains true once True, So no Changes will be Watch */
                // So adding a variable which will add a value if true 
            }
        }
    }

</script>