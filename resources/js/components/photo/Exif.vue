<template>
    <div class="container">
        <div class="section">
            <span class="title h5 text-white" v-if="hasAllDetails">We pulled this EXIF information from the photo.</span>
            <span class="title h5 text-white" v-else>We couldn't find EXIF information on the photo. You can add the information below by clicking "Edit".</span>
            <button class="btn btn-link text-white" @click="isEditing=true">Edit</button>
            <!-- details  -->
            <div class="row mt-3" v-if="!isEditing">
                <div class="col-12 col-xl-6">
                    <div class="row text-white">
                        <div class="col-md-12 mt-3">
                            <span class="h5">Make --</span>
                            <span class="h5" v-if="photoDetails.make">{{photoDetails.make}}</span>
                        </div>
                        <div class="col-md-12 mt-3">
                            <span class="h5">Model --</span>
                            <span class="h5" v-if="photoDetails.model">{{photoDetails.model}}</span>
                        </div>
                        <div class="col-md-12 mt-3">
                            <span class="h5">Aperture --</span>
                            <span class="h5" v-if="photoDetails.aperture">{{photoDetails.aperture}}</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="row text-white">
                        <div class="col-md-12 mt-3">
                            <span class="h5">Exposure Time --</span>
                            <span class="h5" v-if="photoDetails.exposure_time">{{photoDetails.exposure_time}} sec.</span>
                        </div>
                        <div class="col-md-12 mt-3">
                            <span class="h5">Focal Length --</span>
                            <span class="h5" v-if="photoDetails.focal_length">{{photoDetails.focal_length}}mm</span>
                        </div>
                        <div class="col-md-12 mt-3">
                            <span class="h5">ISO --</span>
                            <span class="h5" v-if="photoDetails.iso">{{photoDetails.iso}}</span>
                        </div>
                    </div>
                </div>
            </div> <!-- end of details .row-->
            <!-- edit details form -->
            <div class="row mt-3" v-if="isEditing">
                <div class="col-12 col-xl-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-info">
                                <label class="h4 text-white">Make</label>
                                <input type="text" class="form-control text-white" placeholder="Canon" v-model.lazy="photoDetails.make">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group has-info">
                                <label class="h4 text-white">Model</label>
                                <input type="text" class="form-control text-white" placeholder="Canon EOS 40D" v-model.lazy="photoDetails.model">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group has-info">
                                <label class="h4 text-white">Aperture (f)</label>
                                <input type="text" class="form-control text-white" placeholder="7.1" v-model.lazy="photoDetails.aperture">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-xl-6">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group has-info">
                                <label class="h4 text-white">Exposure Time (sec.)</label>
                                <input type="text" class="form-control text-white" placeholder="1/700" v-model.lazy="photoDetails.exposure_time">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group has-info">
                                <label class="h4 text-white">Focal Length (mm)</label>
                                <input type="text" class="form-control text-white" placeholder="70" v-model.lazy="photoDetails.focal_length">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group has-info">
                                <label class="h4 text-white">ISO</label>
                                <input type="text" class="form-control text-white" placeholder="800" v-model.lazy="photoDetails.iso">
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- end of edit details .row-->
            <div class="row" v-if="isEditing">
                <div class="col-12">
                    <button class="btn btn-success btn-sm float-right" @click="isEditing=!isEditing">Save</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      hasAllDetails: true,
      isEditing: false
    };
  },
  computed: {
    photoDetails: {
      get() {
        return this.$store.state.selectedPhoto.details;
      },
      set() {
        this.$store.state.selectedPhoto.details;
      }
    }
  },
  mounted() {
    // check if the photos has got all the details
    for (var detail in this.photoDetails) {
      if (this.photoDetails[detail] == "") {
        this.hasAllDetails = false;
        break;
      }
    }
  },
  beforeDestroy() {
    this.$store.dispatch("setUploadPhotoDetails", {
      key: "exif",
      value: this.photoDetails
    });
  }
};
</script>
