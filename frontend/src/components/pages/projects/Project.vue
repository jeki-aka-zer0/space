<template>
    <div>
        <div @click="showProject(project)">
            {{ project.name }}
        </div>

        <modal v-if="getModal.id === project.id">
            <div v-html="project.content"></div>
        </modal>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Modal from '../../elements/Modal';

    export default {
        props: {
            project: {
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
            showProject(project) {
                this.openModal({id: project.id, head: project.name});
            },
        },
        components: {
            Modal,
        },
    }
</script>