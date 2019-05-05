<template>
    <router-link class="nav__brand" :to="{name: 'home'}" exact>
        <span>Logo</span>
        <!--<img src="../../assets/img/logo.png" alt="Cosmos" height="40">-->
    </router-link>
</template>

<style lang="scss">
    .nav__brand {
        background: #cc4b4b;
        height: 40px;
        width: 100px;
    }
</style>