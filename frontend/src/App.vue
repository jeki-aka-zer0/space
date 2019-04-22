<template>
    <div id="app">
        <header class="app-header">
            Navigation coming soon
        </header>

        <div class="app-content">
            <main class="container">
                Content
                <router-view/>
            </main>
        </div>

        <Footer/>

    </div>
</template>

<script>
    import Footer from '@/components/Footer.vue'

    export default {
        components: {
            Footer
        }
    }
</script>

<style lang="scss">
    @import "assets/scss/global";
    @import "assets/scss/grid";
</style>
