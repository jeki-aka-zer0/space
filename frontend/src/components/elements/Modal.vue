<template>
    <section v-if="getModal.isVisible"
             @click="closeModal"
             class="modal"
    >
        <div class="modal__close" @click="closeModal">
            <svg fill="#fff" xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 10 10">
                <path id="х" class="cls-1" d="M1246.02,191.653l3.98-3.847a1.126,1.126,0,0,0,
              0-1.632l-3.98-3.848a1.22,1.22,0,0,0-1.68,0,1.108,1.108,0,0,0,0,1.621l3.15,
              3.043-3.15,3.043a1.107,1.107,0,0,0,0,1.62,1.218,1.218,0,0,0,1.68,0m5.94,
              0a1.218,1.218,0,0,0,1.68,0,1.123,1.123,0,0,0,0-1.62l-3.15-3.043,
              3.15-3.043a1.125,1.125,0,0,0,0-1.621,1.22,1.22,0,0,0-1.68,0l-3.98,
              3.848a1.126,1.126,0,0,0,0,1.632l3.98,3.847" transform="translate(-1244 -182)"/>
            </svg>
        </div>
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
    h3 {
    }

    .modal {
        position: fixed;
        z-index: 100;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.4);

        &__content {
            color: #fff;
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 50%;
            padding: 25px;
            text-align: center;
            background-color: #575757;
            overflow-x: hidden;
            overflow-y: auto;
            z-index: 101;
        }
    }

    .modal__close {
        background: gray;
        position: absolute;
        top: 50%;
        left: 50%;
        border-radius: 50%;
        cursor: pointer;
        font-size: 0;
        padding: 30px;
        margin-left: -40px;
        z-index: 102;

        & svg {
            vertical-align: middle;
        }
    }
</style>
