<template>
    <div>
        <header-component></header-component>
        <section class="section">
            <div class="container">
                <div class="field is-grouped">
                    <div class="control has-icons-left is-expanded is-medium" :class="{'is-loading' : loading }">
                        <label for="url" class="is-sr-only">Target URL for creation of short link</label>
                        <input
                            id="url"
                            type="text"
                            value=""
                            name="url"
                            class="input is-medium"
                            placeholder="paste your link here"
                            required autocomplete="off"
                            :class="{'is-danger' : error}"
                            v-model="targetUrl"
                            @keyup.enter="shorten"
                            v-focus
                        >
                        <span class="icon is-small is-left">
                            <i class="fas fa-link"></i>
                        </span>
                        <p class="help is-danger" v-if="error">{{ error }}</p>
                    </div>

                    <div class="control is-medium">
                        <button class="button is-medium is-link" @click="shorten">
                            <strong class="px-4">Shorten</strong>
                        </button>
                    </div>
                </div>

                <article class="message is-dark" v-if="created">
                    <div class="message-header">
                        <p>Your short link has been created</p>
                        <button class="delete" aria-label="delete" @click="close()"></button>
                    </div>
                    <div class="message-body">
                        <p class="mb-3">This is your short link. You can copy it to your clipboard by clicking on the copy button.</p>
                        <div class="field has-addons">
                            <div class="control is-expanded">
                                <input class="input" type="text" v-model="shortUrlLink" readonly>
                            </div>
                            <div class="control">
                                <button class="button is-outlined" v-clipboard="() => shortUrlLink ">
                                    Copy
                                </button>
                            </div>
                        </div>
                        <p>You can also access your short link stats <router-link :to="{ name: 'short-url-stats', params: { accessToken: shortenedUrl.access_token} }">here</router-link>. Be sure to remember this link for future access.</p>
                    </div>
                </article>
            </div>
        </section>
        <api-access-component></api-access-component>
    </div>
</template>

<script>
    import ApiAccessComponent from "../components/ApiAccessComponent";
    import HeaderComponent from "../components/HeaderComponent";

    export default {
        name: "HomeComponent",
        components: {HeaderComponent, ApiAccessComponent},
        data() {
            return {
                targetUrl: null,
                loading: false,
                error: '',
                created: false,
                shortenedUrl: null
            }
        },
        mounted() {

        },
        computed: {
            shortUrlLink: function () {
                return `http://localhost:8000/r/${this.shortenedUrl.code}`;
            }
        },
        methods: {
            shorten() {
                this.loading = true;
                this.$http
                    .post("/api/shorturls", { target_url : this.targetUrl})
                    .then(response => {
                        this.created = true;
                        this.shortenedUrl = response.data.data;
                    })
                    .catch(error => {
                        this.error = error.response.data.message;
                    })
                    .finally(() => {
                        this.loading = false;
                    });
            },
            close() {
                this.created = false;
                this.shortenedUrl = null;
            },
            statsPage() {
                //this.$router.push({ name: 'short-url', params: { accessToken: response.data.data.access_token } })
            },
            clear() {
                this.error = '';
            }
        }
    }
</script>

<style scoped>

</style>
