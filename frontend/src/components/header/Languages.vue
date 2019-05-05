<template>
    <div class="nav__languages">
        <span
                v-for="language in getLanguages"
                :key="language.id"
                :class="['nav__languages__item', {'nav__languages__item-active': language.code === current.code}]"
                @click="chooseLang(language)"
        >
            {{ language.name }}
        </span>
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
            }),
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
    .nav__languages {
    }

    .nav__languages__item-active {
        font-weight: bold;
    }
</style>