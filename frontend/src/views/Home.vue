<template>
    <VueCustomScrollbar class="pages-wrapper" :settings="scrollBarSettings" tabindex="0">
        <Greeting/>
        <About/>
        <Values/>
        <Projects/>
        <Jobs/>
        <Contacts/>
    </VueCustomScrollbar>
</template>

<script>
    import {mapActions} from 'vuex';
    import VueCustomScrollbar from 'vue-custom-scrollbar'
    import Greeting from '@/components/pages/Greeting.vue'
    import About from '@/components/pages/About.vue'
    import Values from '@/components/pages/Values.vue'
    import Projects from '@/components/pages/Projects.vue'
    import Jobs from '@/components/pages/Jobs.vue'
    import Contacts from '@/components/pages/Contacts.vue'

    export default {
        data() {
            return {
                scrollBarSettings: {
                    useBothWheelAxes: true,
                    minScrollbarLength: 100,
                    maxScrollbarLength: 100
                }
            };
        },
        created() {
            this.loadTexts();
        },
        methods: {
            ...mapActions([
                'loadTexts',
            ]),
        },
        components: {
            VueCustomScrollbar,
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
        margin: 40px 0 0;

        &:focus {
            outline: none;
        }
    }

    .ps {
        & > .ps__rail-x, &:hover > .ps__rail-x {
            height: 60px;
            opacity: 1;
            background: transparent !important;

            &:after {
                content: '';
                background: red;
                display: block;
                height: 3px;
                margin-top: 25px;
            }

            &:hover .ps__thumb-x, .ps__thumb-x {
                background: transparent url(../assets/img/rocket.gif) no-repeat center center;
                width: 100px;
                height: 60px;
            }
        }
    }

    .page {
        height: 100%;
        min-width: 100%;
        min-height: 90vh;
        outline: 1px solid #67b846;

        flex: 0 0 auto;
    }
</style>