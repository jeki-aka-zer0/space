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
    import Greeting from '../components/pages/greeting/Greeting.vue'
    import About from '../components/pages/about/About.vue'
    import Values from '../components/pages/values/Values.vue'
    import Projects from '../components/pages/projects/Projects.vue'
    import Jobs from '../components/pages/jobs/Jobs.vue'
    import Contacts from '../components/pages/contacts/Contacts.vue'

    export default {
        components: {
            VueCustomScrollbar,
            Greeting,
            About,
            Values,
            Projects,
            Jobs,
            Contacts
        },
        data() {
            return {
                scrollBarSettings: {
                    useBothWheelAxes: true,
                    minScrollbarLength: 100,
                    maxScrollbarLength: 100,
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
    }
</script>

<style lang="scss">
    @import "../assets/scss/colors";
    @import "../assets/scss/media";

    .pages-wrapper {
        display: flex;
        flex-wrap: nowrap;
        overflow-x: scroll;
        overflow-y: hidden;
        z-index: 10;

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
                background: $danger;
                display: block;
                height: 4px;
                margin-top: 23px;
            }

            &:hover .ps__thumb-x, .ps__thumb-x {
                background: transparent url(../assets/img/rocket.gif) no-repeat center center;
                width: 100px;
                height: 60px;
            }
        }
    }

    .page {
        background: url(../assets/img/bg.jpg) repeat-x left center;
        flex: 0 0 auto;
        height: 100%;
        width: 100vw;
        min-height: 100vh;
        padding: 65px 10px 30px;

        &__content {
            display: flex;
            flex-direction: column;
            justify-content: space-around;

            @include for-size('phone-only') {
                margin-top: 0
            }

            @include for-size('phone-up') {
                margin-top: 3vh
            }

            @include for-size('tablet-up') {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
                margin-top: 5vh;

                &__column {
                    flex: 1 0 50%;

                    &:first-child {
                        padding-right: 20px;
                    }
                }
            }

            @include for-size('desktop-up') {
                margin-top: 7vh
            }

            @include for-size('big-desktop-up') {
                margin-top: 10vh
            };

            &__description {
                p {
                    margin-bottom: 15px;
                }
            }
        }
    }
</style>