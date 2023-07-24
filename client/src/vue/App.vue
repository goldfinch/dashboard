<script setup>

import { ref } from 'vue'
import { useAppStore } from './stores/AppStore';
const store = useAppStore();

const props = defineProps({
  supplies: String
})

</script>
<template>

  <div>Awesome dashboard!</div>

</template>
