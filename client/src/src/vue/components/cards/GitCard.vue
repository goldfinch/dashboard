<script setup>

import moment from 'moment-timezone';

import useRequestHandler from '../../composables/useRequestHandler'

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/info/git',
});

</script>
<template>
  <div class="col-12">
    <div class="card mb-3">
      <h3 class="card-header">Git</h3>
      <div class="card-body" :class="isFetching ? 'card-body-loading' : ''">
        <div v-if="!isFetching && data">
          <span><strong>Current branch:</strong> {{ data.mainbranch }}</span>
          <br><br>
          <h3>All branches</h3>
          <ul>
            <li v-for="branch in data.branches">
              <span :style="branch.main ? 'font-weight: 600' : ''">{{ branch.name }}</span>
            </li>
          </ul>
          <br>
          <h3>Last commits</h3>
          <table class="table">
            <thead>
              <tr>
                <td>Author</td>
                <td>Commit</td>
                <td>Message</td>
                <td>Date</td>
                <td>Builds</td>
              </tr>
            </thead>
            <tr v-for="commit in data.commits">
              <td v-text="commit.author"></td>
              <td><a :href="`#${commit.hash}`">{{ commit.hash.substr(0, 7) }}</a></td>
              <td v-text="commit.commit"></td>
              <td :title="moment(commit.date).format('MMMM Do YYYY, HH:mm:ss')" v-text="moment(commit.date).fromNow()"></td>
              <td>-</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
