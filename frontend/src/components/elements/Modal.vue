<template>
    <section v-if="getModal.isVisible"
             @click="closeModal"
             class="modal"
    >
        <svg class="modal__close" @click="closeModal">
            <svg class="icon">
                <use xlink:href="#close"></use>
            </svg>
        </svg>
        <div class="modal__content" @click.stop>
            <h3>
                {{ getModal.head }}
            </h3>
            <slot/>
        </div>
    </section>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        computed: {
            ...mapGetters(['getModal']),
        },
        methods: {
            ...mapActions(['closeModal']),
        },
    };
</script>

<style lang="scss" scoped>
    @import "../../assets/scss/colors";
    @import "../../assets/scss/media";
    @import "../../assets/scss/variables";

    .modal {
        background-color: rgba(0, 0, 0, 0.4);
        height: 100%;
        left: 0;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 100;

        &__content {
            background-color: $dark;
            bottom: 0;
            left: 50%;
            overflow-x: hidden;
            overflow-y: auto;
            padding: 55px 100px 55px;
            position: absolute;
            right: 0;
            top: 0;
            z-index: 101;

            @include for-size('desktop-down') {
                left: 0;
                padding: 25px 20px;
            }
        }

        &__close {
            background: $dark;
            border-radius: 50%;
            box-shadow: 0 0 14px $black;
            cursor: pointer;
            font-size: 0;
            height: 50px;
            margin: -25px -25px 0 0;
            padding: 12px;
            position: absolute;
            right: 50%;
            top: 50%;
            transition-duration: 0.2s;
            z-index: 102;
            width: 50px;

            @include for-size('desktop-down') {
                margin: 0;
                right: 20px;
                top: 20px;
            }

            &:hover {
                transform: rotate(90deg);
            }
        }
    }
</style>
