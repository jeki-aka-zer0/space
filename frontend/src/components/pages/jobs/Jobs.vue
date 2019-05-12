<template>
    <div class="page page-jobs">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="content">
                <h1>{{ getJobsText.name }}</h1>
                <div v-html="getJobsText.content"></div>

                <list/>

                <modal v-if="getModal.id === 'applyForAJob'">
                    <apply/>
                </modal>

                <hr>

                <div v-html="getApplyForJobText.content"></div>

                <div @click="write">Написать</div>
            </div>
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Modal from '../../elements/Modal';
    import Loader from '../../elements/Loader';
    import List from './List';
    import Apply from './Apply';

    const SLUG_JOBS = 'jobs';
    const SLUG_APPLY_FOR_JOB = 'slug-apply-for-job';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getModal',
                'getTextBySlug',
            ]),
            getJobsText() {
                return this.getTextBySlug(SLUG_JOBS);
            },
            getApplyForJobText() {
                return this.getTextBySlug(SLUG_APPLY_FOR_JOB);
            },
        },
        methods: {
            ...mapActions([
                'openModal',
            ]),
            write() {
                this.openModal({id: 'applyForAJob', head: 'Написать'});
            },
        },
        components: {
            Loader,
            Modal,
            List,
            Apply,
        },
    }
</script>