<script setup>
import useRequestHandler from '../../composables/useRequestHandler';

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/info/sitetree',
});
</script>
<template>
  <div
    class="col-12 col-md-6 dashcard dashcard--sitetree"
    :class="isFetching ? 'dashcard--loading' : ''"
  >
    <div class="card mb-3">
      <div class="card-header">
        Pages
        <a class="card-action" href="/admin/pages/add" target="_self"
          ><i class="bi bi-plus-square-fill"></i
        ></a>
      </div>
      <div class="card-body">
        <ul class="dashcard__list" v-if="data && !isFetching">
          <li v-for="item in data.list">
            <a :href="item.link" :title="item.title" target="_self">
              <i :class="item.icon"></i>
              <span class="item__name" v-text="item.title"></span>
            </a>
            <span class="item__author" :title="item.updated_at"
              ><span v-if="item.author">{{ item.author }}, </span
              >{{ item.updated_at_human }}</span
            >
          </li>
        </ul>
      </div>
    </div>
  </div>
</template>
