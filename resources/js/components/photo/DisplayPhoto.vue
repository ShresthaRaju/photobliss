<template>
	<div :class="['full-page-photo',{'active':hasPhoto}]" :style="{backgroundImage:'url('+photo+')'}">
		<div class="photo-overlay" v-show="hasPhoto"></div>
		<div class="container mt-15 add-details">
			<add-details></add-details>
		</div>
	</div>
</template>

<script>

import AddDetails from './AddDetails.vue';

export default {

	props:['photoUrl'],

	components:{
		'add-details':AddDetails,
	},

  data () {
    return {
    	hasPhoto:false,
    	photo:''

    }
  },

  mounted(){
  	this.photo=URL.createObjectURL(this.photoUrl);
  	this.hasPhoto=true;
  },
}
</script>

<style scoped>
	.full-page-photo{
		height: 100vh;
		background-size: cover;
		background-position: center center;
		position:relative;
	}

	.full-page-photo.active{
		z-index:1050;
	}

	.photo-overlay{
		position:absolute;
		z-index: 0;
	    width: 100%;
	    height: 100%;
	    background-color:rgba(0,0,0,0.5);
	    opacity: 0;
	}

	.active .photo-overlay{
		opacity: 0.8;
	}

	.add-details{
		position: absolute;
		left: 0;
		right: 0;
	}
</style>
