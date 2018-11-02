import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const centralStore=new Vuex.Store({
	state:{
		photo:{
			photo:{},
			details:{},
		},
	},

	mutations:{
		storePhoto(state,photo){
			state.photo=photo;
		}
	},

	actions:{

		getPhotoDetails({dispatch},photo){ //parameter {dispatch} is given so that we can call an action inside another action
			return new Promise((resolve,reject)=>{
				var formData=new FormData();
			    formData.append('selected_photo',photo);

			    axios.post('/photo/get-details',formData)
			    .then(response => {
			    	dispatch('setPhoto',{photo:photo,details:response.data});
			    	resolve("completed") 
			    	// resolve('completed') is received as a response by the dispatcher.
			    	// in this case the dispatcher is SelectPhoto.vue
			    } )
			    .catch(errors => console.log(errors.response.data))
			})
			
		},

		setPhoto(context,photo){ 
			context.commit('storePhoto',photo);
		}
	}
});