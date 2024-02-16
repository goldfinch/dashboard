<script setup>
import { ref } from 'vue';
import { useAppStore } from './stores/AppStore';
import useRequestHandler from './composables/useRequestHandler';
const store = useAppStore();

import UserCard from './components/cards/UserCard.vue';
import ServerCard from './components/cards/ServerCard.vue';
import GitCard from './components/cards/GitCard.vue';
import ComposerCard from './components/cards/ComposerCard.vue';
import GoogleAnalyticsCard from './components/cards/GoogleAnalyticsCard.vue';
import SiteTree from './components/cards/SiteTree.vue';
import ElementalArea from './components/cards/ElementalArea.vue';
import SiteAssets from './components/cards/SiteAssets.vue';
import ServerInfo from './components/cards/ServerInfo.vue';
import Card from './components/Card.vue';

const props = defineProps({
  supplies: String,
});

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
    <div class="row" v-if="data && !isFetching" v-html="data.cards"></div>
  </div>
</template>
