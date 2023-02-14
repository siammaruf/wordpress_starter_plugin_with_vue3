<template>
  <div id="vue-admin-app">
    <h1>Wordpress Vue Kickstart</h1>
    <router-view name="tab"></router-view>
    <!-- component matched by the route will render here -->
    <router-view></router-view>
  </div>
</template>

<script>
import TabNavigation from './components/tabs/Navigation.vue'
export default {
  name: "App",
  components:{
    'tab-navigation': TabNavigation
  }
}
</script>

<style scoped>

</style>