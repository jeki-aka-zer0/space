<template>
    <div class="page">
        <div v-if="getTexts.isLoaded" class="content">
            <h1>{{ getValues.name }}</h1>
            <div v-html="getValues.content"></div>
            <div v-html="getValueItems.content"></div>
        </div>
        <div class="loader-wrapper">
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../elements/Loader';

    const SLUG_VALUES = 'values';
    const SLUG_VALUE_ITEMS = 'value-items';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getValues() {
                return this.getTextBySlug(SLUG_VALUES);
            },
            getValueItems() {
                return this.getTextBySlug(SLUG_VALUE_ITEMS);
            },
        },
        components: {
            Loader
        }
    }
</script>