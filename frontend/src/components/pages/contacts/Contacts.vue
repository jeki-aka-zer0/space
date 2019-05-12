<template>
    <div class="page page-contacts">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="content">
                <h1>{{ getContactsText.name }}</h1>
                <div v-html="getContactsText.content"></div>
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