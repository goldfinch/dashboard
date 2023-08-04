<script setup>

defineProps({
  title: String,
  items: Array,
})

</script>
<template>

  <div class="col">
    <div class="card mb-3">
      <h3 class="card-header">{{ title }}</h3>
      <div class="card-body">
        <p class="card-text">
          <ul>
            <li v-for="item in items" v-text="item"></li>
          </ul>
        </p>
      </div>
    </div>
  </div>

</template>
