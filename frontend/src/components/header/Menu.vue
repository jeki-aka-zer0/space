<template>

    <div>
        <div class="nav__hamburger">
            <span class="nav__hamburger__line"></span>
            <span class="nav__hamburger__line"></span>
            <span class="nav__hamburger__line"></span>
        </div>

        <div @click="showModal({head: '', id: 'registerModal'})"
             class="nav__registration button button__secondary ml-10">
            Registration
        </div>

        <modal>
            <div class="affiliate-link" style="background: red; outline: 1000px solid darkred">
                This is test!
            </div>
        </modal>

    </div>

</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Modal from '../elements/Modal';

    export default {
        components: {
            Modal
        },
        computed: {
            ...mapGetters([
                'getModal',
            ]),
        },
        methods: {
            ...mapActions([
                'showModal',
                'closeModal',
            ])
        }
    };
</script>

<style>
    .nav__hamburger__line {
        background-color: #fff;
        border-radius: 4px;
        display: block;
        height: 4px;
        margin: 0 0 4px;
        width: 40px;
    }
</style>