<template>
    <div class="page page-projects">
        <div v-if="getTexts.isLoaded" class="content">
            <h1>{{ getProjectsText.name }}</h1>
            <div v-html="getProjectsText.content"></div>

            <div>
                <div v-for="project in getProjects">
                    <div @click="showProject(project)">
                        {{ project.name }}
                    </div>

                    <modal v-if="getModal.id === project.id">
                        <div v-html="project.content"></div>
                    </modal>
                </div>
            </div>
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

    const SLUG_PROJECTS = 'projects';

    export default {
        created() {
            this.loadProjects();
        },
        computed: {
            ...mapGetters([
                'getTexts',
                'getModal',
                'getTextBySlug',
                'getProjects',
            ]),
            getProjectsText() {
                return this.getTextBySlug(SLUG_PROJECTS);
            },
        },
        methods: {
            ...mapActions([
                'loadProjects',
                'closeModal',
                'openModal',
            ]),
            showProject(project) {
                this.openModal({id: project.id, head: project.name});
            },
        },
        components: {
            Loader,
            Modal,
        }
    }
</script>