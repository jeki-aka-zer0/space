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
    .nav {
        align-items: center;
        display: flex;
    }
</style>