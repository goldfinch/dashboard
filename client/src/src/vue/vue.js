import { createApp } from 'vue';
import { createPinia } from 'pinia';
import { plugin, defaultConfig } from '@formkit/vue';
import cfg from '@/app.config.js';
import customConfig from './formkit.config.js';
import AppDashboard from './App.vue';

const pinia = createPinia();

const dashboardRef = '[goldfinch-dashboard]';

const dashboard = document.querySelector(dashboardRef);

if (dashboard) {
  const app = createApp(AppDashboard, { ...dashboard.dataset });

  app.provide('cfg', cfg.public);

  app.use(pinia).use(plugin, defaultConfig(customConfig)).mount(dashboardRef);
}
