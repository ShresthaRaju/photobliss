<template>
    <div class="page-header header-filter">
      <div class="container">
      <div class="row text-center">
          <div class="col-md-6 mr-auto ml-auto">
              <h1 class="title">
                  Submit a photo
              </h1>
              <p class="h5 text-white">
                  When uploaded, your work will be distributed for free.
              </p>
              <p class="text-white">
                  Please only upload photos that you own the rights to.
              </p>
              <input type="file" name="photo" accept="image/*" ref="selectPhoto" @change="onPhotoSelected" v-show="false">
              <button class="btn btn-info btn-raised mt-4" @click="openFileDialog">
                  Add a photo
              </button>
          </div>
        <!-- <vue-loader :isLoading="isLoading"></vue-loader> -->
      </div>
      </div>
    </div>
</template>

<script>

import VueLoader from '../loader/VueLoader.vue';

export default {

  components:{
    'vue-loader':VueLoader
  },

  data () {
    return {
      photo:{
        selected:'',
        details:[]
      },
      isLoading:false
    }
  },

  methods:{
  	openFileDialog(){
  		this.$refs.selectPhoto.click();
  	},

  	onPhotoSelected(){
  		this.photo.selected=this.$refs.selectPhoto.files[0];

      var formData=new FormData();
      formData.append('selected_photo',this.photo.selected);

      axios.post('/photo/get-details',formData)
      .then(response => {
        this.photo.details=response.data;
        this.$emit('photoSelected',this.photo);
        // this.isLoading=true;
        // setTimeout(() => {
        //   this.isLoading=false;
        //   this.$emit('photoSelected',this.photo);
        // }, 4000);
        
      })
      .catch(errors => console.log(errors.response.data.errors))
  	}
  }
}
</script>
