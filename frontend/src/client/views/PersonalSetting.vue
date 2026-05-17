<template>
    <div>
        <b-card title="Personal Setting">
            <b-card-text>This is Personal Settings</b-card-text>
        </b-card>
    </div>
</template>

<script>
    import {BCard, BCardText, BLink} from 'bootstrap-vue'

    export default {
        components: {
            BCard,
            BCardText,
            BLink,
        },
        name: "PersonalSetting"
    }
</script>

<style scoped>

</style>
