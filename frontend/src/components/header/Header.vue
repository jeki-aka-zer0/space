<template>
    <header>
        <div class="max-width-center">
            <div class="nav">
                <Brand @menuChosen="goTo"/>
                <Slogan/>
                <Languages/>
                <Menu @menuChosen="goTo"/>
            </div>
        </div>
    </header>
</template>

<script>
    import Brand from '@/components/header/Brand.vue'
    import Slogan from '@/components/header/Slogan.vue'
    import Languages from '@/components/header/Languages.vue'
    import Menu from '@/components/header/Menu.vue'

    export default {
        components: {
            Brand,
            Slogan,
            Languages,
            Menu
        },
        methods: {
            goTo(slug) {
                this._getContainer().scrollLeft = this._getPage(slug).offsetLeft;
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
    }
</script>

<style lang="scss">
    header {
        outline: 1px solid #e19037;
        position: fixed;
        width: 100%;
        z-index: 20;
    }

    .nav {
        align-items: center;
        display: flex;
    }
</style>