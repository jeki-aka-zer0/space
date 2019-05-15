<template>
    <div class="nav__slogan" v-if="getTexts.isLoaded" v-html="getSloganText.content"></div>
</template>

<script>
    import {mapGetters} from 'vuex';

    const SLUG_SLOGAN = 'slogan';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getSloganText() {
                return this.getTextBySlug(SLUG_SLOGAN);
            },
        },
    }
</script>

<style lang="scss">
    @import "../../assets/scss/media";

    .nav__slogan {
        @include before-xs {
            display: none;
        }

        @include from-xs {
            flex-grow: 3;
        }
    }
</style>