<template>
    <div class="jobs-table__body__item">
        <div @click="showJob(job)">
            <div>{{ job.name }}</div>
            <div>{{ job.experience }}</div>
            <svg class="icon">
                <use xlink:href="#arrow"></use>
            </svg>
        </div>

        <modal v-if="getModal.id === job.id">
            <div>
                <div v-html="job.content"></div>
                <div @click="applyForJob" v-if="getApplyText">
                    {{ getApplyText.name }}
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Modal from '../../elements/Modal';

    const SLUG_APPLY = 'apply';

    export default {
        props: {
            job: {
                type: Object,
                required: true,
            },
        },
        computed: {
            ...mapGetters([
                'getModal',
                'getTextBySlug',
            ]),
            getApplyText() {
                return this.getTextBySlug(SLUG_APPLY);
            },
        },
        methods: {
            ...mapActions([
                'openModal',
            ]),
            showJob(job) {
                this.openModal({id: job.id, head: job.name});
            },
            applyForJob() {
                this.openModal({id: 'applyForAJob', head: this.getApplyText.name});
            },
        },
        components: {
            Modal,
        },
    }
</script>

<style lang="scss">
    @import "../../../assets/scss/colors";
    @import "../../../assets/scss/variables";

    .jobs-table__body__item {

        .icon {
            height: 25px;
            margin-left: 10px;
            position: relative;
            top: 2px;
            width: 25px;
        }

        &:hover {
            font-weight: bold;
        }
    }
</style>