<template>
    <div class="page page-contacts">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h2 v-html="getContactsText.name"></h2>
                    <div v-html="getContactsText.content"></div>
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
        components: {
            Loader,
        },
    }
</script>

<style lang="scss">
    .page-contacts {
        background: url(../../../assets/img/bg.jpg) repeat-x -500% center !important;
    }
</style>