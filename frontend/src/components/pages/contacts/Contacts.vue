<template>
    <div :class="['page page-contacts', {wide: isWide}]">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h2 v-html="getContactsText.name"></h2>
                    <div class="page__content__description" v-html="getContactsText.content"></div>
                </div>

                <div class="page__content__column"></div>

            </div>
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../../elements/Loader';

    const SLUG_CONTACTS = 'contacts';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getContactsText() {
                return this.getTextBySlug(SLUG_CONTACTS);
            },
        },
        props: {
            isWide: {
                type: Boolean,
                required: true,
            },
        },
        components: {
            Loader,
        },
    }
</script>

<style lang="scss">
    .page-contacts {
        background: url(../../../assets/img/animation/animation-6.gif) no-repeat 25% 5%, url(../../../assets/img/animation/animation-6.gif) no-repeat 5% 115%, url(../../../assets/img/animation/animation-4.gif) no-repeat 75% 80%, url(../../../assets/img/bg.jpg) repeat-x -500% center !important;
    }
</style>