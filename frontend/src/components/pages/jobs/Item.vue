<template>
    <div>
        <div @click="showJob(job)">
            {{ job.name }} {{ job.experience }}
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