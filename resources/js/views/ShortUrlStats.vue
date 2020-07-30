<template>
    <div v-cloak>
        <section class="section">
            <div class="container">
                <figure class="image container is-256x256" style="margin: auto" v-if="loading">
                    <img src="/img/undraw_loading_frh4.svg" alt="" width="400">
                </figure>
                <div v-if="!loading && !notFound">
                    <h1 class="title">Hi there!</h1>
                    <h2 class="subtitle mb-5">
                        In this page you can see your short link stats. Make sure to remember this link to access it in the future
                    </h2>
                    <table class="table is-fullwidth is-striped">
                        <thead>
                        <tr>
                            <th colspan="2">Your Short Link details</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><strong>Short Link</strong></td>
                            <td>{{ shortUrlLink }}</td>
                        </tr>
                        <tr>
                            <td><strong>Target Link</strong></td>
                            <td>{{ shortUrl.target_url }}</td>
                        </tr>
                        <tr>
                            <td><strong>Clicks</strong></td>
                            <td>{{ shortUrl.clicks }}</td>
                        </tr>
                        <tr>
                            <td><strong>Created On</strong></td>
                            <td>{{ friendlyDate(shortUrl.created_at) }}</td>
                        </tr>
                        <tr>
                            <td><strong>Last Visit</strong></td>
                            <td>
                                <span v-if="shortUrl.created_at == shortUrl.updated_at">
                                    Never
                                </span>
                                <span v-else>
                                    {{ friendlyDate(shortUrl.updated_at) }}
                                </span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="container is-centered" v-if="notFound">
                    <div class="columns is-vcentered">
                        <div class="column">
                            <figure class="image is-256x256">
                                <img src="/img/undraw_page_not_found_su7k.svg" alt="" width="400" height="400">
                            </figure>
                        </div>
                        <div class="column is-two-thirds">
                            <h1 class="title">Something's not right...</h1>
                            <h2 class="subtitle">
                                You might want to create a short link <router-link :to="{ name: 'home' }">here</router-link>...
                            </h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <api-access-component></api-access-component>
    </div>

</template>

<script>
    import ApiAccessComponent from "../components/ApiAccessComponent";
    import moment from 'moment';
    export default {
        name: "ShortUrlStatsComponent",
        components: {ApiAccessComponent},
        data() {
            return {
                accessToken: null,
                shortUrl: {
                    code: null,
                    clicks: null,
                    target_url: null,
                    updated_at: null,
                    created_at: null,
                },
                loading: true,
                notFound: false
            }
        },
        mounted() {
            this.accessToken = this.$route.params.accessToken;

            this.$http
                .get(`/api/shorturls/${this.accessToken}`)
                .then(response => {
                    this.shortUrl = response.data.data;
                })
                .catch(error => {
                    if(error.response.status === 404) {
                        this.notFound = true;
                    }

                })
                .finally(() => {
                    this.loading = false;
                });
        },
        computed: {
            shortUrlLink: function () {
                return `http://localhost:8000/r/${this.shortUrl.code}`;
            }
        },
        methods: {
            friendlyDate: function (date) {
                const atMoment = moment(date);
                return `${atMoment.fromNow()} on ${atMoment.format("dddd, MMMM Do YYYY, h:mm:ss a")}`;
            }
        }
    }
</script>

<style scoped>

</style>
