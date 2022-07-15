<template>
    <main class="container">
        <div class="prefix-live-center">
            <div class="cr-player-perform">
                <div class="cr-player-heading">
                    <h1>Edit Teams</h1>
                </div>
                <div class="edit_team_page">
                    <form @submit.prevent="edit_team()">
                        <div class="row">
                            <div class="col-25">
                                <label for="tournamentid" name = "team ID">Tournament ID</label>
                            </div>
                            
                            <div class="col-75">
                                <input name = "tournamentid" type="text" :value="$route.params.tourid" ref="tour_id" readonly /><!-- v-model="tourId"  -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="teamname" name = "team name">Team name</label>
                            </div>
                            
                            <div class="col-75">
                                <input name = "teamname" type="text" :value="$route.params.teamname" ref="team_name" placeholder="team name" /><!-- v-model="teamName"  -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="teamid" name = "Team ID">Team ID</label>
                            </div>

                            <div class="col-75">
                                <input name = "teamid" type="text" :value="$route.params.teamid" ref="team_id" readonly /><!-- v-model="teamId"  -->
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-25">
                                <label for="teamslug" name = "team Slug">Team Slug</label>
                            </div>

                            <div class="col-75">
                                <input name = "teamslug" type = "text" :value="$route.params.teamslug" ref="team_slug" placeholder="team short_name" /><!-- v-model="teamSlug"  -->
                            </div>
                        </div>

                        <div class="row">
                            <input type="submit" value="Update Team" />
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
        name: "edit-team",
        data() {
            return{
                axios: axios,
            };
        },
        mounted() {},  
        methods: {
            edit_team() {
                // let url = "http://localhost:8000/api/edit-duplicate-teams";
                let url = "http://localhost:8001/api/edit-duplicate-teams";
                
                this.axios.put(url,
                    {
                        "team_id": this.$refs.team_id.value,
                        "tournament_id": this.$refs.tour_id.value,
                        "name": this.$refs.team_name.value,
                        "slug": this.$refs.team_slug.value,
                    }
                )
                .catch(error => console.log(error));
            }
        },  
    }

</script>

<style scoped>

    .edit_team_page {
        height:400px;
    }
    .edit_team_page form {
        height: inherit;
    }
    .edit_team_page form input[type=text], select, textarea {
        width: 95%;
        padding: 12px;
        border: 1px solid #ccc;
        border-radius: 4px;
        resize: vertical;
        font-size: 16px;
    }

    .edit_team_page form label {
        padding: 12px 12px 12px 0;
        display: inline-block;
    }

    .edit_team_page form input[type=submit] {
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

    .edit_team_page form input[type=submit]:hover {
        background-color: #45a049;
    }

    .edit_team_page form .row .col-25 {
        float: left;
        width: 25%;
        margin-top: 6px;
    }

    .edit_team_page form .row .col-75 {
        float: left;
        width: 75%;
        margin-top: 6px;
    }

    /* Clear floats after the columns */
    .edit_team_page form .row:after {
        content: "";
        display: table;
        clear: both;
    }
    @media screen and (max-width: 600px) {
        .edit_team_page form .row .col-25,
         .edit_team_page form .row .col-75,
         .edit_team_page form input[type=submit] {
            width: 50%;
            margin: 10px 0;
        }
    }

</style>