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
    @import "../../assets/scss/variables";

    h3 {
        font-size: $fontBig;
        margin-bottom: 25px;
    }

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
        }

        &__close {
            background: $dark;
            box-shadow: 0 0 14px $black;
            position: absolute;
            top: 50%;
            left: 50%;
            border-radius: 50%;
            cursor: pointer;
            font-size: 0;
            padding: 12px;
            margin: -25px 0 0 -25px;
            z-index: 102;
            height: 50px;
            width: 50px;
            transition-duration: 0.2s;

            &:hover {
                transform: rotate(90deg);
            }
        }
    }
</style>
