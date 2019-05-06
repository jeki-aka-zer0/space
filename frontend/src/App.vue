<template>
    <div id="app">
        <Header/>

<!--        <div class="app-content">-->
<!--            <main class="container">-->
                <router-view/>
<!--            </main>-->
<!--        </div>-->

<!--        <Footer/>-->
    </div>
</template>

<script>
    import Header from '@/components/header/Header.vue'
    import Footer from '@/components/Footer.vue'

    export default {
        components: {
            Header,
            Footer
        }
    }
</script>

<style lang="scss">
    @import "assets/scss/global";
    @import "assets/scss/grid";
</style>
