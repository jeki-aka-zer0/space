<template>
    <div class="project-item">
        <div @click="showProject(project)" class="project-item__name">
            {{ project.name }}

            <svg class="icon">
                <use xlink:href="#arrow"></use>
            </svg>
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

<style lang="scss">
    @import "../../../assets/scss/colors";
    @import "../../../assets/scss/variables";

    .project-item__name {
        color: $non-active;
        cursor: pointer;
        font-size: $fontBig;
        font-weight: bold;
        margin-bottom: 8%;

        .icon {
            height: 25px;
            margin-left: 10px;
            opacity: .3;
            position: relative;
            top: 2px;
            width: 25px;
        }

        &:hover {
            color: $light;

            .icon {
                opacity: 1;
            }
        }
    }
</style>