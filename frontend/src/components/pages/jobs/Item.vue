<template>
    <div>
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
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Modal from '../../elements/Modal';

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
            ]),
        },
        methods: {
            ...mapActions([
                'openModal',
            ]),
            showJob(job) {
                this.openModal({id: job.id, head: job.name});
            },
            applyForJob() {
                this.openModal({id: 'applyForAJob', head: 'Откликнуться'});
            },
        },
        components: {
            Modal,
        },
    }
</script>