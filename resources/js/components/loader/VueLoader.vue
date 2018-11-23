<template>
    <loading :active.sync="isLoading" loader="dots" color="#00bcd4" :width=120 :height=120 background-color="#000000"></loading>
</template>
<script>
// Import component
import Loading from "vue-loading-overlay";
// Import stylesheet
import "vue-loading-overlay/dist/vue-loading.css";
export default {
  props: ["isLoading"],
  components: {
    Loading
  }
};
</script>
