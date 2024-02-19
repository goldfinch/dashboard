<script setup>

import useRequestHandler from './composables/useRequestHandler';

const configUrl = '/admin/dashboard/Goldfinch-Dashboard-Configs-DashboardConfig/EditForm/field/Goldfinch-Dashboard-Configs-DashboardConfig/item/1/edit'

const goSettings = () => {
    window.location = configUrl
}

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/fetch/panels',
});

</script>
<template>
  <div class="dashboard">
    <div class="row"><a @click="goSettings" :href="configUrl">Settings</a></div>
    <div class="row" v-if="data && !isFetching && data.cards != ''" v-html="data.cards"></div>
    <div v-else-if="data && !isFetching">No cards found</div>
  </div>
</template>
