<template>
    <div>
        <div @click="showJob(job)" class="jobs-table__body__item">
            <div class="jobs-table__body__item__name">{{ job.name }}</div>
            <div class="jobs-table__body__item__experience">{{ job.experience }}</div>
            <svg class="icon jobs-table__body__item__arrow">
                <use xlink:href="#arrow"></use>
            </svg>
        </div>

        <modal v-if="getModal.id === job.id">
            <div>
                <div v-html="job.content"></div>
                <div @click="applyForJob" v-if="getApplyText" class="btn">
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
    @import "../../../assets/scss/media";
    @import "../../../assets/scss/variables";

    .jobs-table__body__item {
        display: flex;
        cursor: pointer;
        flex-wrap: wrap;
        padding: 10px 0;
        width: 100%;

        @include for-size('tablet-down') {
            padding: 3px 0;
        }

        &__name {
            flex-grow: 3;
        }

        &__experience {
            width: 105px;
        }

        &__arrow {
            text-align: right;
            width: 25px;
        }

        .icon {
            height: 25px;
            margin-left: 10px;
            position: relative;
            top: 2px;
            width: 25px;

            @include for-size('tablet-down') {
                display: none;
            }
        }

        &:hover {
            @include for-size('tablet-down') {
                opacity: $opacity;
            }

            @include for-size('tablet-up') {
                display: none;
            }
        }
    }
</style>