<template>
    <div v-cloak>
        <nav class="navbar has-shadow" role="navigation" aria-label="main navigation">
            <div class="navbar-brand">
                <router-link class="navbar-item is-size-4 has-text-link has-text-weight-bold" :to="{ name: 'home' }">
                    <i class="fas fa-directions mr-4"></i> URL Shortener
                </router-link>
            </div>
        </nav>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
        name: "App",
    }
</script>

<style scoped>

</style>
