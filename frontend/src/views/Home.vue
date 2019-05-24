<template>
    <VueCustomScrollbar
            class="pages-wrapper"
            :settings="scrollBarSettings"
            @ps-scroll-left="scroll"
            @ps-scroll-right="scroll"
    >
        <Greeting :isWide="isWide"/>
        <About :isWide="isWide"/>
        <Values :isWide="isWide"/>
        <Projects :isWide="isWide"/>
        <Jobs :isWide="isWide"/>
        <Contacts :isWide="isWide"/>
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
                isWide: false,
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
            scroll(e) {
                let pageWidth = this._getPageLength();
                let page = Math.floor(e.target.scrollLeft / pageWidth);

                this.$emit('scroll', page);
            },
            _getPageLength() {
                /**
                 * The coefficient of small fix
                 * @type {number}
                 */
                let coefficient = 10;
                return document.getElementsByClassName('page')[0].clientWidth - coefficient;
            },
        },
    }
</script>

<style lang="scss">
    @import "../assets/scss/colors";
    @import "../assets/scss/media";
    @import "../assets/scss/variables";

    .pages-wrapper {
        z-index: 10;

        @include for-size('phone-only') {
            background: url(../assets/img/bg.jpg) center;
            background-size: cover;
            display: block;
        }

        @include for-size('phone-up') {
            display: flex;
            flex-wrap: nowrap;
        }

        &:focus {
            outline: none;
        }
    }

    @include for-size('phone-up') {
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
    }

    .page {
        height: calc(100vh - #{$footer-height});
        width: 100vw;

        @include for-size('phone-only') {
            background: none;
            padding: 65px 30px 30px;
        }

        @include for-size('phone-up') {
            background: url(../assets/img/animation/animation-6.gif) no-repeat -1% 20%, url(../assets/img/animation/animation-1.gif) no-repeat 80% 60%, url(../assets/img/bg.jpg) repeat-x left center;
            flex: 0 0 auto;
            padding: 45px 10px 30px;
        }

        &.wide {
            height: 100vh;
        }

        &__content {
            display: flex;
            flex-direction: column;
            justify-content: space-around;

            @include for-size('phone-only') {
                margin-top: 0;

                &__column {
                    margin-top: 30px;
                }
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
            }

            &__description {
                p {
                    margin-bottom: 15px;
                }
            }
        }
    }
</style>