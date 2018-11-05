import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export const centralStore = new Vuex.Store({
    state: {
        selectedPhoto: {},
        photoToUpload: {}
    },

    mutations: {
        storeSelectedPhoto(state, selectedPhoto) {
            state.selectedPhoto = selectedPhoto;
        },

        storePhotoToUpload(state, payload) {
            state.photoToUpload[payload.key] = payload.value;
        }
    },

    actions: {
        // pull the details of the photo selected by user to upload
        getPhotoDetails({ dispatch }, selectedPhoto) { //parameter {dispatch} is given so that we can call an action inside another action
            return new Promise((resolve, reject) => {
                var formData = new FormData();
                formData.append('selected_photo', selectedPhoto);

                axios.post('/photo/get-details', formData)
                    .then(response => {
                        dispatch('setPhotoDetails', { photo: selectedPhoto, details: response.data });
                        resolve("completed")
                        // resolve('completed') is received as a response by the dispatcher.
                        // in this case the dispatcher is SelectPhoto.vue
                    })
                    .catch(errors => console.log(errors.response.data))
            });

        },

        // set the extracted details of the selected photo in the store
        setPhotoDetails(context, payload) { //can be given any parameter name, not necessarily payload
            context.commit('storeSelectedPhoto', payload);
        },

        // set extra details like exif, story, tags and location(entered by user) of the photo to upload
        setUploadPhotoDetails({ commit }, payload) {
            commit('storePhotoToUpload', payload);
        },

        mergeAllDetails(context) {
            return new Promise((resolve, reject) => {
                var properties = context.state.photoToUpload;

                var photo = {
                    'title': properties.story.title,
                    'story': properties.story.story,
                    'make': properties.exif.make,
                    'model': properties.exif.model,
                    'aperture': properties.exif.aperture,
                    'exposure_time': properties.exif.exposure_time,
                    'focal_length': properties.exif.focal_length,
                    'iso': properties.exif.iso,
                    'tags': properties.tags,
                    'location': properties.location
                }

                resolve(photo);
            });
        }
    }
});
