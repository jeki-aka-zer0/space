<template>
    <div :class="['page page-jobs', {wide: isWide}]">
        <div class="max-width-center">
            <div v-if="getTexts.isLoaded" class="page__content">

                <div class="page__content__column">
                    <h2 v-html="getJobsText.name"></h2>
                    <div class="page__content__description" v-html="getJobsText.content"></div>
                </div>

                <div class="page__content__column">
                    <list/>

                    <modal v-if="getModal.id === 'applyForAJob'">
                        <apply/>
                    </modal>

                    <div v-html="getApplyForJobText.content"></div>

                    <div @click="write" v-if="getWriteText" class="btn">
                        {{ getWriteText.name }}
                    </div>
                </div>

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
    const SLUG_APPLY_FOR_JOB = 'apply-for-job';
    const SLUG_WRITE = 'write';

    export default {
        computed: {
            ...mapGetters([
                'getTexts',
                'getTextBySlug',
                'getModal',
            ]),
            getJobsText() {
                return this.getTextBySlug(SLUG_JOBS);
            },
            getApplyForJobText() {
                return this.getTextBySlug(SLUG_APPLY_FOR_JOB);
            },
            getWriteText() {
                return this.getTextBySlug(SLUG_WRITE);
            },
        },
        props: {
            isWide: {
                type: Boolean,
                required: true,
            },
        },
        methods: {
            ...mapActions([
                'openModal',
            ]),
            write() {
                this.openModal({id: 'applyForAJob', head: this.getWriteText.name});
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

<style lang="scss">
    .page-jobs {
        background: url(../../../assets/img/bg.jpg) repeat-x -400% center !important;

        .btn {
            margin-top: 30px;
        }
    }
</style>