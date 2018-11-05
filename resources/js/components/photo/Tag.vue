<template>
    <div class="container">
        <div class="section">
            <p class="h4 title text-white">Add some tags</p>
            <tags-input element-id="tags" v-model.lazy="tags" :existing-tags="existingTags" :typeahead="true" input-class="form-control text-white">
            </tags-input>
        </div>
    </div>
</template>
<script>
    import VoerroTagsInput from '@voerro/vue-tagsinput';
    export default {
        components: {
            'tags-input': VoerroTagsInput,
        },
        data() {
            return {
                tags: [],
                allTags: {},
                existingTags: {},
            }
        },
        computed: {
            getAllTags() {
                axios.get('/tags')
                    .then(response => this.allTags = response.data.tags)
                    .catch(errors => console.log(errors.response.data))
            },
            populateTags() {
                this.allTags.forEach((tag) => {
                    this.existingTags[tag.name] = tag.name;
                })
            }
        },
        mounted() {
            this.getAllTags;
        },
        beforeDestroy() {
            this.$store.dispatch('setUploadPhotoDetails', {
                key: 'tags',
                value: this.tags
            });
        }
    }

</script>
