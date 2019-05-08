<template>
    <span @click="$emit('menuChosen', 'home')" class="nav__brand">
        <span>Logo</span>
        <!--<img src="../../assets/img/logo.png" alt="Cosmos" height="40">-->
    </span>
</template>

<style lang="scss">
    .nav__brand {
        background: #cc4b4b;
        cursor: pointer;
        height: 40px;
        width: 100px;
    }
</style>