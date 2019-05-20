<template>
    <header :class="{hidden: getModal.isVisible}">
        <div class="max-width-center">
            <div class="nav">
                <Brand @menu-chosen="$emit('menu-chosen', $event)"/>
                <Slogan/>
                <Languages/>
                <Menu @menu-chosen="$emit('menu-chosen', $event)"/>
            </div>
        </div>
    </header>
</template>

<script>
    import {mapGetters} from 'vuex';
    import Brand from './Brand.vue'
    import Slogan from './Slogan.vue'
    import Languages from './Languages.vue'
    import Menu from './Menu.vue'

    export default {
        computed: {
            ...mapGetters(['getModal']),
        },
        components: {
            Brand,
            Slogan,
            Languages,
            Menu
        },
    }
</script>

<style lang="scss">
    @import "../../assets/scss/media";

    header {
        position: fixed;
        width: 100%;
        z-index: 20;

        &.hidden {
            top: -100px;
        }

        @include for-size('phone-only') {
            padding: 5px 8px;
        }

        @include for-size('phone-up') {
            padding: 10px 10px 5px;
        }

        @include for-size('tablet-up') {
            padding: 20px 10px 5px;
        }

        @include for-size('desktop-up') {
            padding: 30px 10px 5px;
        }

        .nav {
            align-items: center;
            display: flex;
        }
    }
</style>