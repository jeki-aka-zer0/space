<template>
    <div id="app">
        <Header/>

<!--        <div class="app-content">-->
<!--            <main class="container">-->
                <router-view/>
<!--            </main>-->
<!--        </div>-->

<!--        <Footer/>-->
        <icons/>
    </div>
</template>

<script>
    import Header from '@/components/header/Header.vue'
    import Footer from '@/components/Footer.vue'
    import Icons from '@/components/elements/Icons.vue'

    export default {
        components: {
            Header,
            Footer,
            Icons,
        }
    }
</script>

<style lang="scss">
    @import "assets/scss/global";
    @import "assets/scss/grid";
</style>
