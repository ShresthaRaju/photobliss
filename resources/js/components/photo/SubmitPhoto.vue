<template>
    <component :is="activeComponent" @photoSelected="changeComponent"></component>
</template>
<script>
    import SelectPhoto from './SelectPhoto.vue'
    import DisplayPhoto from './DisplayPhoto.vue'
    export default {
        components: {
            'select-photo': SelectPhoto,
            'display-photo': DisplayPhoto,
        },
        data() {
            return {
                activeComponent: 'select-photo',
            }
        },
        methods: {
            changeComponent() {
                this.activeComponent = 'display-photo';
            }
        },
    }

</script>
