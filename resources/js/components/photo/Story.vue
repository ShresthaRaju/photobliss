<template>
    <div class="container">
        <div class="section">
            <div class="text-white">
                <p class="h5">Share something interesting about your photo.</p>
                <p class="h5">How did you take this shot? What makes this photo special to you?</p>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group has-info mt-3">
                        <label for="title" class="h4 text-white">Title (optional)</label>
                        <input type="text" class="form-control text-white" placeholder="Passing through the bliss..." v-model.lazy="photo.title">
                    </div>
                    <div class="form-group has-info">
                        <label for="story" class="h4 text-white">Story (optional)</label>
                        <textarea class="form-control text-white" rows="3" v-model.lazy="photo.story"></textarea>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                photo: {
                    title: '',
                    story: ''
                }
            }
        },
        beforeDestroy() {
            this.$store.dispatch('setUploadPhotoDetails', {
                key:'story',
                value: this.photo
            });
        }
    }

</script>
