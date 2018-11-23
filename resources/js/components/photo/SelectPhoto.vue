<template>
    <div class="page-header header-filter">
        <div class="container">
            <div class="row text-center">
                <div class="col-md-6 mr-auto ml-auto">
                    <h1 class="title">Submit a photo</h1>
                    <p class="h5 text-white">
                        When uploaded, your work will be distributed for free.
                    </p>
                    <p class="text-white">
                        Please only upload photos that you own the rights to.
                    </p>
                    <input type="file" accept="image/*" ref="selectPhoto" @change="onPhotoSelected" v-show="false" />
                    <button class="btn btn-info btn-raised mt-4" @click.prevent="openFileDialog">
                        Add a photo
                    </button>
                </div>
                <vue-loader :isLoading="isLoading"></vue-loader>
            </div>
        </div>
    </div>
</template>
<script>
import VueLoader from "../loader/VueLoader.vue";
export default {
  components: {
    "vue-loader": VueLoader
  },
  data() {
    return {
      selectedPhoto: null,
      isLoading: false
    };
  },
  methods: {
    openFileDialog() {
      this.$refs.selectPhoto.click();
    },
    onPhotoSelected() {
      this.selectedPhoto = this.$refs.selectPhoto.files[0];
      this.isLoading = true;
      this.$store
        .dispatch("getPhotoDetails", this.selectedPhoto)
        .then(response => {
          // console.log(response);
          this.isLoading = false;
          this.$emit("photoSelected");
        });
    }
  }
};
</script>
