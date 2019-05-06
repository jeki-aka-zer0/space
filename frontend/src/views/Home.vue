<template>
<!--    <div class="page-home display-flex max-width-center">-->
<!--        <div class="flex-xs-12">-->
        <div class="pages-wrapper">
            <Greeting/>
            <About/>
            <Values/>
            <Projects/>
            <Jobs/>
            <Contacts/>
        </div>
<!--        </div>-->
<!--    </div>-->
</template>

<script>
    import Greeting from '@/components/pages/Greeting.vue'
    import About from '@/components/pages/About.vue'
    import Values from '@/components/pages/Values.vue'
    import Projects from '@/components/pages/Projects.vue'
    import Jobs from '@/components/pages/Jobs.vue'
    import Contacts from '@/components/pages/Contacts.vue'

    export default {
        name: 'home',
        components: {
            Greeting,
            About,
            Values,
            Projects,
            Jobs,
            Contacts
        }
    }
</script>

<style lang="scss">
    .pages-wrapper {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: scroll;
        overflow-y: hidden;
        margin: 40px 0;
    }

    .page {
        height: 100%;
        min-width: 100%;
        min-height: 90vh;
        outline: 1px solid #67b846;

        flex: 0 0 auto;
    }
</style>