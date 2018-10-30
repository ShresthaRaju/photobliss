<template>
	<component :is="activeComponent" @photoSelected="displayPhoto($event)" :photoUrl="photoUrl"></component>
</template>

<script>

	import SelectPhoto from './SelectPhoto.vue'
	import DisplayPhoto from './DisplayPhoto.vue'

	export default {

	  components:{
	  	'select-photo':SelectPhoto,
	  	'display-photo':DisplayPhoto,
	  }
	  , 

	  data () {
	    return {
	    	activeComponent:'select-photo',
	    	photoUrl:'',
	    }
	  },

	  methods:{
	  	displayPhoto(photo){
	  		this.photoUrl=photo.selected;
	  		this.activeComponent='display-photo'
	  	}
	  }
	}
</script>
