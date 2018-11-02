<template>

  <div>
    <div class="row">
        <div class="col-md-6 mr-auto ml-auto">
          <div class="row">
            <div class="col-md-12 col-lg-10 col-xl-8 mr-auto ml-auto">
              <ul class="nav nav-pills nav-pills-rose">
                <li class="nav-item"><a class="nav-link text-white active" href="#exif" data-toggle="tab">EXIF</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#story" data-toggle="tab">Story</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#tags" data-toggle="tab">Tags</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="#gps" data-toggle="tab">GPS</a></li>
              </ul>
            </div>
          </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-10 mr-auto ml-auto">
            <div class="tab-content">
              <div class="tab-pane active" id="exif">
                <exif></exif>
              </div>
              <div class="tab-pane" id="story">
                <story></story>
              </div>
              <div class="tab-pane" id="tags">
                  <tag></tag>
              </div> 
              <div class="tab-pane" id="gps">
                  <gps></gps>
              </div>
          </div>
        </div>
    </div>

    <div class="row">
      <div class="col-4 col-sm-3 col-md-2 col-lg-1 mr-auto ml-auto mt-0">
        <a href="/photo/submit" class="btn btn-danger btn-sm btn-raised no-margin-btn">Cancel</a>
      </div>
    </div>
  </div>

</template>

<script>

import Exif from './Exif.vue';
import Story from './Story.vue';
import Tag from './Tag.vue';
import GPS from './GPS.vue';

export default {

	components:{
		'exif':Exif,
		'story':Story,
		'tag':Tag,
		'gps':GPS,
	},
}
</script>

<style scoped>
  .nav-pills .nav-item .nav-link{
    padding: 3px 15px;
    min-width: 70px;
  }

  .no-margin-btn{
    margin:0;
  }
</style>