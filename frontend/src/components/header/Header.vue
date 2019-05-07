<template>
    <header>
        <div class="max-width-center">
            <div class="nav">
                <Brand/>
                <Slogan/>
                <Languages/>
                <Menu/>
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
        }
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