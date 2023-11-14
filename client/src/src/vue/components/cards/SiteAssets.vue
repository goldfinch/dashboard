<script setup>

import useRequestHandler from '../../composables/useRequestHandler'

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/info/siteassets',
});

</script>
<template>
  <div class="col-12 dashcard dashcard--assets" :class="isFetching ? 'dashcard--loading' : ''">
    <div class="card mb-3">
      <div class="card-header">
        Assets
      </div>
      <div class="card-body">
        <ul class="dashcard__list" v-if="data && !isFetching">
          <li v-for="item in data.list">
            <a :href="item.link" :title="item.title" target="_self">
              <img :src="item.icon" width="160">
              <span class="item__name" v-text="item.title"></span>
              <span v-html="item.specs"></span>
            </a>
            <span class="item__author" :title="item.updated_at"><span v-if="item.author">{{ item.author }}, </span>{{ item.updated_at_human }}</span>

          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
