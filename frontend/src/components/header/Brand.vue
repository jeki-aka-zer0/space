<template>
    <span @click="$emit('menuChosen', 'home')" class="nav__brand">
        <svg class="icon">
            <use xlink:href="#logo"></use>
        </svg>
    </span>
</template>

<style lang="scss">
    .nav__brand {
        cursor: pointer;
        height: 30px;
        margin-right: 30px;
        transition-duration: 0.2s;
        width: 39px;

        .icon {
            height: 30px;
            width: 39px;
        }

        &:hover {
            transform: translateX(5px);
        }
    }
</style>