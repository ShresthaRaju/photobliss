<template>
	<div class="container">
		<div class="section">
			<span class="title h5 text-white" v-if="hasAllDetails">We pulled this EXIF information from the photo.</span>
			<span class="title h5 text-white" v-else>We couldn't find EXIF information on the photo. You can add the information below by clicking "Edit".</span>

			<button class="btn btn-link text-white">Edit</button>
			
			<div class="row mt-3">
				<div class="col-12 col-xl-6">
					<div class="row text-white">
						<div class="col-md-12 mt-3">
							<!-- <p class="h5">Make -- {{photoDetails.make}}</p> -->
							<span class="h5">Make --</span>
							<span class="h5" v-if="photoDetails.make">{{photoDetails.make}}</span>
						</div>
						<div class="col-md-12 mt-3">
							<span class="h5">Model --</span>
							<span class="h5" v-if="photoDetails.model">{{photoDetails.model}}</span>
						</div>
						<div class="col-md-12 mt-3">
							<span class="h5">Aperture --</span>
							<span class="h5" v-if="photoDetails.aperture">f/{{photoDetails.aperture}}</span>
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
			</div>
		</div>
	</div>
</template>

<script>

export default {

	data(){
		return{
			hasAllDetails:true,
		}
	},

  computed:{
  	photoDetails:{
  		get(){
  			return this.$store.state.photo.details;
  		},

  		set(){
  			this.$store.state.photo.details;
  		}
  	},
  },

  mounted(){
  	for(var detail in this.photoDetails){
  		if (this.photoDetails[detail]=="") {
  			this.hasAllDetails=false;
  			break;
  		}
  	}
  },
}
</script>
