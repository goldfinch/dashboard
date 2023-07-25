<script setup>

import useRequestHandler from '../../composables/useRequestHandler'

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashpanel/info/user',
});

</script>
<template>
  <div class="col">
    <div class="card mb-3">
      <h3 class="card-header">Profile</h3>
      <div class="card-body" :class="isFetching ? 'card-body-loading' : ''">
        <div v-if="!isFetching && data">
          <span v-text="data.name"></span>
          <span v-text="data.email"></span>
        </div>
      </div>
    </div>
  </div>
</template>
