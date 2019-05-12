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
    import Brand from './Brand.vue'
    import Slogan from './Slogan.vue'
    import Languages from './Languages.vue'
    import Menu from './Menu.vue'

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
        padding: 30px 10px 5px;
        position: fixed;
        width: 100%;
        z-index: 20;

        .nav {
            align-items: center;
            display: flex;
        }
    }
</style>