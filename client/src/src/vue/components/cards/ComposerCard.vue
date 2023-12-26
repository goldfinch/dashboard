<script setup>
import moment from 'moment-timezone';

import useRequestHandler from '../../composables/useRequestHandler';

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/info/composer',
});
</script>
<template>
  <div class="col-12" v-if="isFetching || data">
    <div class="card mb-3">
      <h3 class="card-header">Composer</h3>
      <div class="card-body" :class="isFetching ? 'card-body-loading' : ''">
        <div v-if="!isFetching && data">
          <span><strong>Packages installed:</strong> {{ data.length }}</span>
          <br /><br />
          <table class="table">
            <thead>
              <tr>
                <td>Name</td>
                <td>Version</td>
              </tr>
            </thead>
            <tr v-for="line in data">
              <td>
                <a target="_blank" :href="`https://github.com/${line.name}`">{{
                  line.name
                }}</a>
              </td>
              <td v-text="line.version"></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
