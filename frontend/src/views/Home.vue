<template>
    <!--    <div class="page-home display-flex max-width-center">-->
    <!--        <div class="flex-xs-12">-->

    <VueCustomScrollbar class="pages-wrapper" :settings="scrollBarSettings">
        <Greeting/>
        <About/>
        <Values/>
        <Projects/>
        <Jobs/>
        <Contacts/>
    </VueCustomScrollbar>

    <!--        </div>-->
    <!--    </div>-->
</template>

<script>
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
                    minScrollbarLength: 50,
                    maxScrollbarLength: 50
                }
            };
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
                margin-top: 30px;
            }
        }
    }


    /*.ps__rail-x:hover .ps__thumb-x,*/

    .ps__thumb-x {
        /*background: url("https://banner2.kisspng.com/20180202/zjq/kisspng-rocket-icon-rocket-5a7428c2d551a6.1639587815175620508738.jpg");*/
        background: red !important;
        width: 100px !important;
        height: 60px !important;
    }

    .page {
        height: 100%;
        min-width: 100%;
        min-height: 90vh;
        outline: 1px solid #67b846;

        flex: 0 0 auto;
    }
</style>