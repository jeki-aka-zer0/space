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
                this._getContainer().scrollLeft = this._getPage(slug).offsetLeft;
                this.closeModal();
            },
            _getContainer() {
                let elements = document.getElementsByClassName('pages-wrapper');

                if (elements.length !== 1) {
                    throw new Error('Can not detect container.');
                }

                return elements[0];
            },
            _getPage(slug) {
                let elements = document.getElementsByClassName('page-' + slug);

                if (elements.length !== 1) {
                    throw new Error('Can not detect page.');
                }

                return elements[0];
            },
        },
    };
</script>

<style>
    .btn-menu {
        cursor: pointer;
    }

    .btn-menu__strip {
        background-color: #fff;
        border-radius: 4px;
        display: block;
        height: 4px;
        margin: 0 0 4px;
        width: 40px;
    }

    .menu__item {
        cursor: pointer;
    }
</style>