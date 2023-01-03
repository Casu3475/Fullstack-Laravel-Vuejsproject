<script setup>
import { RouterLink, RouterView } from 'vue-router'
import Navbar from './components/Navbar.vue'
import FooterWeb from './components/FooterWeb.vue'


</script>

<template>
  <header>
    <Navbar />
  </header>

  <RouterView />


  <footer>
    <FooterWeb />
  </footer>

</template>