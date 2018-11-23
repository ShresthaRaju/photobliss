<template>
    <div>
        <!-- tabs -->
        <div class="row">
            <div class="col-md-6 mr-auto ml-auto">
                <div class="row">
                    <div class="col-md-12 col-lg-10 col-xl-8 mr-auto ml-auto">
                        <ul class="nav nav-pills nav-pills-rose">
                            <li class="nav-item">
                                <a class="nav-link text-white p-tab active" href="#exif" data-toggle="tab">EXIF</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white p-tab" href="#story" data-toggle="tab">Story</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white p-tab" href="#tags" data-toggle="tab">Tags</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-white p-tab" href="#gps" data-toggle="tab">GPS</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- tab contents -->
        <div class="row">
            <div class="col-md-10 mr-auto ml-auto">
                <div class="tab-content">
                    <div class="tab-pane active" id="exif">
                        <component :is="activeComponent"></component>
                    </div>
                </div>
            </div>
        </div>
        <!-- next-button -->
        <div class="row">
            <div class="col-md-11">
                <button class="btn btn-default btn-sm float-right mr-3 no-margin" v-if="!isLastTab" @click="showNextTab">Next</button>
                <button class="btn btn-primary btn-sm float-right mr-3 no-margin" v-else @click="uploadPhoto">Submit</button>
            </div>
        </div>
        <!-- cancel-button -->
        <div class="row mt-6">
            <div class="col-4 col-sm-3 col-md-2 col-lg-1 mr-auto ml-auto">
                <a href="/photo/submit" class="btn btn-danger btn-sm btn-raised">Cancel</a>
            </div>
        </div>
    </div>
</template>
<script>
import Exif from "./Exif.vue";
import Story from "./Story.vue";
import Tag from "./Tag.vue";
import GPS from "./GPS.vue";
export default {
  components: {
    exif: Exif,
    story: Story,
    tag: Tag,
    gps: GPS
  },
  data() {
    return {
      currentTab: 1,
      isLastTab: false,
      components: ["exif", "story", "tag", "gps"],
      activeComponent: "exif"
    };
  },
  computed: {
    photo() {
      return this.$store.state.selectedPhoto.photo;
    }
  },
  methods: {
    showNextTab() {
      var tabs = document.getElementsByClassName("p-tab");
      // could be used if submit button was not needed to show
      // if (this.currentTab >= tabs.length) {
      //     // return; // means do not execute code below it
      // }
      if (this.currentTab == tabs.length - 1) {
        this.isLastTab = true;
      }
      tabs[this.currentTab].click();
      this.activeComponent = this.components[this.currentTab];
      this.currentTab++;
    },
    uploadPhoto() {
      this.$store.dispatch("mergeAllDetails").then(response => {
        var formData = new FormData();
        formData.append("photo", this.photo);
        formData.append("details", JSON.stringify(response));
        axios
          .post("/photo/upload", formData)
          .then(res => {
            window.location = res.data.redirect;
            window.$toasted.success(res.data, {
              theme: "bubble",
              icon: {
                name: "thumb_up",
                after: true
              },
              position: "top-center",
              duration: 4000
            });
          })
          .catch(errors => console.log(errors.response.data));
      });
    }
  }
};
</script>
<style scoped>
.nav-pills .nav-item .nav-link {
  padding: 3px 15px;
  min-width: 70px;
}

.p-tab {
  pointer-events: none;
  cursor: default;
}

.no-margin {
  margin: 0;
}
</style>
