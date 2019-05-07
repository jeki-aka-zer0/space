<template>
    <div class="page">
        <div v-if="getTexts.isLoaded" class="content">
            <h1>{{ getJobs.name }}</h1>
            <div v-html="getJobs.content"></div>
            <div v-html="getApplyForJob.content"></div>
        </div>
        <div class="loader-wrapper">
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Loader from '../elements/Loader';

    const SLUG_JOBS = 'jobs';
    const SLUG_APPLY_FOR_JOB = 'slug-apply-for-job';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
            ]),
            getJobs() {
                return this.getTextBySlug(SLUG_JOBS);
            },
            getApplyForJob() {
                return this.getTextBySlug(SLUG_APPLY_FOR_JOB);
            },
        },
        components: {
            Loader
        }
    }
</script>