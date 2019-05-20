<template>
    <footer :class="{ hidden: isHidden || getModal.isVisible}">
        <div class="max-width-center">

            <svg class="icon">
                <use xlink:href="#logo"></use>
            </svg>

            <div v-if="getMenu.isLoaded" class="menu-bottom">
                <div
                        v-for="(menu, index) in getMenu.data"
                        :key="menu.slug"
                        :class="['menu-bottom__item', {'menu-bottom__item-active': index === page}]"
                        @click="$emit('menu-chosen', menu.slug)"
                >
                    <span class="menu-bottom__item__link">
                        {{ menu.name }}
                    </span>
                </div>
            </div>

            <Loader v-if="false === getMenu.isLoaded"/>
        </div>
    </footer>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Loader from '../components/elements/Loader';

    export default {
        props: {
            page: {
                type: Number,
                required: true,
            },
        },
        data() {
            return {
                isHidden: false,
            };
        },
        computed: {
            ...mapGetters([
                'getMenu',
                'getModal',
            ]),
        },
        created() {
            this.loadMenu();
        },
        methods: {
            ...mapActions([
                'loadMenu',
            ]),
        },
        components: {
            Loader,
        },
    }
</script>

<style lang="scss">
    @import "../assets/scss/colors";
    @import "../assets/scss/variables";

    footer {
        background: $dark;
        bottom: 0;
        height: $footer-height;
        padding: 20px 0;
        position: fixed;
        width: 100%;
        z-index: 10;

        &.hidden {
            bottom: -$footer-height;
        }

        .icon {
            float: left;
            height: 30px;
            width: 39px;
        }

        .menu-bottom {
            margin-left: 100px;

            &__item {
                cursor: pointer;
                display: inline-block;
                margin-right: 20px;
                padding: 5px 0 0;

                &:hover {
                    opacity: $opacity;
                }

                &-active {
                    color: $danger;
                    cursor: default;
                    text-decoration: underline;

                    &:hover {
                        opacity: 1;
                    }
                }
            }
        }
    }
</style>