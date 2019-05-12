<template>
    <div>
        <div class="btn-menu" @click="showMenu">
            <span class="btn-menu__strip"></span>
            <span class="btn-menu__strip"></span>
            <span class="btn-menu__strip"></span>
        </div>

        <modal v-if="getModal.id === 'menu'">

            <div v-if="getMenu.isLoaded" class="menu">
                <div v-for="menu in getMenu.data" class="menu__item">
                    <span @click="goToAndCloseModal(menu.slug)">
                        {{ menu.name }}
                    </span>
                </div>
            </div>

            <Loader v-if="false === getMenu.isLoaded"/>

        </modal>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Modal from '../elements/Modal';
    import Loader from '../elements/Loader';

    export default {
        components: {
            Loader,
            Modal,
        },
        computed: {
            ...mapGetters([
                'getMenu',
                'getModal',
            ]),
        },
        methods: {
            ...mapActions([
                'loadMenu',
                'closeModal',
                'openModal',
            ]),
            showMenu() {
                if (false === this.getMenu.isLoaded) {
                    this.loadMenu();
                }
                this.openModal({id: 'menu'});
            },
            goToAndCloseModal(slug) {
                this.closeModal();
                this.$emit('menuChosen', slug);
            },
        },
    };
</script>

<style lang="scss" scoped>
    @import "../../assets/scss/colors";

    .btn-menu {
        cursor: pointer;
    }

    .btn-menu__strip {
        background-color: $light;
        border-radius: 4px;
        display: block;
        height: 4px;
        width: 38px;

        &:not(:last-child) {
            margin: 0 0 4px;
        }
    }

    .menu__item {
        cursor: pointer;
    }
</style>