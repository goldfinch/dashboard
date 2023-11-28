<script setup>

import useRequestHandler from '../../composables/useRequestHandler'

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/info/server',
});

</script>
<template>
  <div class="col-12 col-md-8 dashcard dashcard--sitetree" :class="isFetching ? 'dashcard--loading' : ''">
    <div class="card mb-3">
      <div class="card-header">
        Info desk
      </div>
      <div class="card-body">

        <div v-if="data && !isFetching" class="dashbox_row">
          <div class="dashbox" v-for="item in data.list">
            <span v-text="item.label"></span>
            <ul>
              <li v-for="listItem in item.list"><span v-text="listItem.label"></span> <span v-html="listItem.value"></span></li>
            </ul>
          </div>
        </div>

      </div>
    </div>
  </div>
</template>
