<script setup>

import useRequestHandler from '../../composables/useRequestHandler'

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/info/server',
});

</script>
<template>
  <div class="col dashcard dashcard--sitetree" :class="isFetching ? 'dashcard--loading' : ''">
    <div class="card mb-3">
      <div class="card-header">
        Server info
      </div>
      <div class="card-body">
        <ul class="dashcard__list" v-if="data && !isFetching">
          <li v-for="item in data.list">
            {{ item.label }}: &nbsp;<span v-html="item.value"></span>
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
