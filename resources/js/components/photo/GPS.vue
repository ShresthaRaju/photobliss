<template>
    <div class="container">
        <div class="section">
            <div class="form-group has-info">
                <label class="h4 title text-white">Location</label>
                <input type="text" class="form-control text-white" placeholder="Where did you take this photograph..." v-model.lazy="photoLocation">
            </div>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      photoLocation: ""
    };
  },
  updated() {
    this.$store.dispatch("setUploadPhotoDetails", {
      key: "location",
      value: this.photoLocation
    });
  }
};
</script>
