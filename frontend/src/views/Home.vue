<template>
    <div class="page-home display-flex max-width-center">
        <div class="flex-xs-12">
            <h1>Welcome to App</h1>
            <p>
                Congratulations! You have successfully created new application.
            </p>
            <ApiStatus/>
        </div>
    </div>
</template>

<script>
    // @ is an alias to /src
    import ApiStatus from '@/components/ApiStatus.vue'

    export default {
        name: 'home',
        components: {
            ApiStatus
        }
    }
</script>

<style>
</style>