<template>
    <div class="jobs-table">
        <div class="jobs-table__head">
            <div class="jobs-table__head__item">{{ getWhoWeNeedText.name }}</div>
            <div class="jobs-table__head__item">{{ getExperienceText.name }}</div>
        </div>
        <item v-for="(job, index) in getJobs" :key="index" :job="job"/>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Item from "./Item";

    const SLUG_WHO_WE_NEED = 'who-we-need';
    const SLUG_EXPERIENCE = 'experience';

    export default {
        created() {
            this.loadJobs();
        },
        computed: {
            ...mapGetters([
                'getJobs',
                'getTextBySlug',
            ]),
            getWhoWeNeedText() {
                return this.getTextBySlug(SLUG_WHO_WE_NEED);
            },
            getExperienceText() {
                return this.getTextBySlug(SLUG_EXPERIENCE);
            },
        },
        methods: {
            ...mapActions([
                'loadJobs',
            ]),
        },
        components: {
            Item,
        },
    }
</script>

<style lang="scss">
    @import "../../../assets/scss/colors";
    @import "../../../assets/scss/media";

    .jobs-table {
        &__head {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;

            @include for-size('phone-only') {
                display: none;
            }

            @include for-size('tablet-down') {
                margin-bottom: 5px;
            }
        }

        border-bottom: 2px solid $light;
        padding-bottom: 20px;
        margin-bottom: 30px;

    }
</style>