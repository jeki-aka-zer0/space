<template>
    <div class="nav__languages">
        <span
                v-for="language in getLanguages"
                :key="language.id"
                :class="['nav__languages__item', {'nav__languages__item-active': language.code === current.code}]"
                @click="chooseLang(language)"
        >{{ language.name }}</span>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

    export default {
        created() {
            this.loadLanguages();
        },
        computed: {
            ...mapGetters({
                'getLanguages': 'getLanguages',
                'current': 'currentLang',
            })
        },
        methods: {
            ...mapActions([
                'loadLanguages',
                'chooseLang',
            ])
        }
    }
</script>

<style lang="scss">
    @import "../../assets/scss/colors";

    .nav__languages {
        color: $light;
        margin-right: 30px;

        &__item {
            cursor: pointer;
            border-bottom: 1px solid transparent;
            display: inline-block;
            margin: 0 0 0 5px;
            padding: 0 6px 0 0;
            position: relative;

            &:hover:not(&-active) {
                color: $white;
                text-decoration: underline;
            }

            &:not(:last-child):after {
                background: $light;
                content: '';
                display: block;
                height: 16px;
                position: absolute;
                right: 0;
                top: 1px;
                width: 1px;
            }

            &-active {
                cursor: default;
                font-weight: bold;
            }
        }
    }
</style>