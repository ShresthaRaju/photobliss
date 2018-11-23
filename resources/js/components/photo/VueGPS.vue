<template>
    <div class="container">
        <div class="section">
            <div class="form-group has-info">
                <label for="location" class="h4 title text-white">Location</label>
                <gmap-autocomplete class="form-control text-white" placeholder="Where did you take this photograph" @place_changed="setPlaceOnMap">
                </gmap-autocomplete>
            </div>
            <GmapMap :center="latLng" :zoom="11" map-type-id="roadmap" style="height: 15rem">
                <GmapMarker :key="index" v-for="(m, index) in markers" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" />
            </GmapMap>
        </div>
    </div>
</template>
<script>
export default {
  data() {
    return {
      latLng: {
        lat: 27.7172,
        lng: 85.324
      },
      markers: [
        {
          position: {
            lat: 27.7172,
            lng: 85.324
          }
        }
      ],
      selectedPlace: {},
      photoLocation: ""
    };
  },
  methods: {
    setPlaceOnMap(place) {
      if (place) {
        this.selectedPlace = {
          lat: place.geometry.location.lat(),
          lng: place.geometry.location.lng()
        };
        this.markers.push({
          position: this.selectedPlace
        });
        this.latLng = this.selectedPlace;
        this.photoLocation = place.name;
      }
    }
  },
  beforeUpdate() {
    console.log("gps being updated");
  },
  updated() {
    console.log("gps updated");
  }
};
</script>
