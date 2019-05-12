<template>
    <span @click="$emit('menuChosen', 'home')" class="nav__brand">
        <svg class="icon">
            <use xlink:href="#logo"></use>
        </svg>
    </span>
</template>

<style lang="scss" scoped>
    .icon {
        height: 30px;
        width: 39px;
    }

    .nav__brand {
        cursor: pointer;
        height: 30px;
        margin-right: 30px;
        width: 39px;
    }
</style>