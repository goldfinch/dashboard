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

const { call } = useRequestHandler({
  url: '/api/dashcore/info/table',
});
</script>
<template>
  <div class="dashboard">
    <div class="row row-cols-3">
      <!-- <Card title="Brand card" :items="['logo', 'details', 'hotlinks', 'phones', 'emails', 'etc', 'social links icons']" /> -->
      <!-- <Card title="Handy tools" :items="['image compression', 'vide compression']" /> -->
      <SiteTree />
      <!-- Clear cache : flush & silverstripe-cache -->
      <!-- <Card title="Data Objects" :items="['last edited']" /> -->
      <ElementalArea />
      <!-- <Card title="Assets" :items="['last uploaded/amended', 'assets size']" /> -->
      <SiteAssets />
      <!-- <Card title="Web Stats" :items="['environment', 'baseauth', 'site access', 'assets', 'ss version', 'sitemap check/link', 'robots check/link', 'GTM/GTAG info', 'Facebook pixel', 'In Google Console?']" /> -->
      <ServerInfo />
      <UserCard />
      <!-- <Card title="User" :items="['info', 'groups', 'last activity', 'mfa', 'country/flag']" /> -->
      <!-- <Card title="Dev" :items="['dev/build', 'flush=1', 'dev/tasks', 'scheduled tasks','cron records']" /> -->

      <!-- <GoogleAnalyticsCard /> -->

      <!--Packages cards-->
      <!-- <Card title="Activecampaign/Mailchimp" :items="['latest activity']" /> -->
      <!-- <Card title="Tinified" :items="['active', 'last compressions with before/after size']" /> -->
      <!-- <Card title="SocialKit" :items="['refresh tokens', 'last fetch info', 'posts table info', 'manual fetch buttons']" /> -->
      <!-- <Card title="Form enquiries" :items="['latest']" /> -->
      <!-- <Card title="BugTracker" :items="['latest errors server/client']" /> -->
      <!-- <Card title="Performance" :items="['main score', 'latest tests']" /> -->

      <!-- <ServerCard /> -->
      <GitCard />
      <ComposerCard />
    </div>
  </div>
</template>
