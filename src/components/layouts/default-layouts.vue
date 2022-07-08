<template>
    <div >
        <!-- <app-header></app-header> -->
        <router-view />
        <!-- <app-footer></app-footer> -->
    </div>
</template>

<script>
// import appHeader from '../common/header.vue';
// import appFooter from '../common/footer.vue';

export default {
  name: 'defaultLayout',
  data() {
    return {}
  },
  components: {
    // appHeader, appFooter
  },
  mounted() {
  },
  methods: {}
}
</script>
