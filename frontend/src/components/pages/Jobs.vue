<template>
    <div class="page page-jobs">
        <div v-if="getTexts.isLoaded" class="content">
            <h1>{{ getJobsText.name }}</h1>
            <div v-html="getJobsText.content"></div>

            <div>
                <div v-for="job in getJobs">
                    <div @click="showJob(job)">
                        {{ job.name }} {{ job.experience }}
                    </div>

                    <modal v-if="getModal.id === job.id">
                        <div>
                            <div v-html="job.content"></div>

                            <div @click="applyForJob">Откикнуться</div>
                        </div>
                    </modal>
                </div>
            </div>

            <modal v-if="getModal.id === 'applyForAJob'">
                <div>
                    Form coming soon

                    <div>Отправить</div>
                </div>
            </modal>

            <hr>

            <div v-html="getApplyForJobText.content"></div>

            <div @click="write">Написать</div>
        </div>
        <div class="loader-wrapper">
            <Loader v-if="false === getTexts.isLoaded"/>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Modal from '../elements/Modal';
    import Loader from '../elements/Loader';

    const SLUG_JOBS = 'jobs';
    const SLUG_APPLY_FOR_JOB = 'slug-apply-for-job';

    export default {
        created() {
            this.loadJobs();
        },
        computed: {
            ...mapGetters([
                'getTexts',
                'getModal',
                'getTextBySlug',
                'getJobs',
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
                'loadJobs',
                'closeModal',
                'openModal',
            ]),
            showJob(job) {
                this.openModal({id: job.id, head: job.name});
            },
            write() {
                this.openModal({id: 'applyForAJob', head: 'Написать'});
            },
            applyForJob() {
                this.openModal({id: 'applyForAJob', head: 'Откликнуться'});
            },
        },
        components: {
            Loader,
            Modal,
        }
    }
</script>