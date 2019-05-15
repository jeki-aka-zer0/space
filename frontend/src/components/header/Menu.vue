<template>
    <div>
        <div class="btn-menu" @click="showMenu">
            <span class="btn-menu__strip"></span>
            <span class="btn-menu__strip"></span>
            <span class="btn-menu__strip"></span>
        </div>

        <modal v-if="getModal.id === 'menu'">
            <div class="menu">
                <div v-for="menu in getMenu.data" :key="menu.slug" class="menu__item">
                    <span @click="goToAndCloseModal(menu.slug)" class="menu__item__link">
                        {{ menu.name }}
                    </span>
                </div>
            </div>
        </modal>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import Modal from '../elements/Modal';
    import Loader from '../elements/Loader';

    export default {
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
                this.openModal({id: 'menu'});
            },
            goToAndCloseModal(slug) {
                this.closeModal();
                this.$emit('menuChosen', slug);
            },
        },
        components: {
            Loader,
            Modal,
        },
    };
</script>

<style lang="scss">
    @import "../../assets/scss/colors";
    @import "../../assets/scss/media";
    @import "../../assets/scss/variables";

    .btn-menu {
        cursor: pointer;

        &__strip {
            background: $light;
            border-radius: 4px;
            display: block;
            height: 4px;
            width: 38px;

            &:not(:last-child) {
                margin: 0 0 4px;
            }

            :hover > & {
                background: $white;
            }
        }
    }

    .menu {
        display: flex;
        flex-direction: column;
        justify-content: space-around;
        height: 50%;
        padding-left: 45px;
    }

    .menu__item__link {
        cursor: pointer;

        @include big-adaptive-font();

        &:hover {
            color: $white;
            text-decoration: underline;
        }
    }
</style>