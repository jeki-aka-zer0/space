<template>
    <div id="app">
        <Header/>
        <router-view v-on:scroll="page = $event"/>
        <Footer :page="page"/>
        <icons/>
    </div>
</template>

<script>
    import Header from '@/components/header/Header.vue'
    import Footer from '@/components/Footer.vue'
    import Icons from '@/components/elements/Icons.vue'

    export default {
        data() {
            return {
                page: 0,
            };
        },
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
