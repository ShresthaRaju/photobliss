<template>
	<div class="container">
		<div class="section">
			<p class="h4 title text-white">Add some tags</p>
			<tags-input element-id="tags"
			    v-model="selectedTags"
			    :existing-tags="{ 
			        'web-development': 'Web Development',
			        'php': 'PHP',
			        'javascript': 'JavaScript',
			    }"
			    :typeahead="true"
			    input-class="form-control text-white">
		    </tags-input>
	    </div>
	</div>
</template>

<script>

import VoerroTagsInput from '@voerro/vue-tagsinput';

export default {

	components:{
		'tags-input':VoerroTagsInput,
	},

	data () {
	  return {
	   selectedTags:[],
	  }
	}
}
</script>
