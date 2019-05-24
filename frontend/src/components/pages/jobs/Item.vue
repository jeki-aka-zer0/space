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
        cursor: pointer;
        padding: 5px 0;
        width: 100%;

        @include for-size('phone-only') {
            padding: 7px 0;
        }

        @include for-size('phone-up') {
            display: flex;
            flex-wrap: wrap;
            padding: 5px 0;
        }

        > div, > svg {
            @include for-size('phone-only') {
                display: inline-block;
                margin-right: 5px;
            }
        }

        &__name {
            @include for-size('phone-up') {
                flex-grow: 3;
            }

            @include for-size('phone-only') {
                &:after {
                    content: ', ';
                }
            }
        }

        &__experience {
            @include for-size('phone-up') {
                width: 105px;
            }
        }

        &__arrow {
            @include for-size('phone-up') {
                text-align: right;
                width: 25px;
            }
        }

        .icon {
            position: relative;
            top: 2px;

            @include for-size('phone-only') {
                height: 15px;
                width: 15px;
            }

            @include for-size('phone-up') {
                height: 25px;
                margin-left: 10px;
                width: 25px;
            }
        }

        &:hover {
            @include for-size('tablet-down') {
                opacity: $opacity;
            }

            @include for-size('tablet-up') {
                font-weight: bold;
            }
        }
    }
</style>