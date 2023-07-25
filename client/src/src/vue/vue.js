import { createApp } from 'vue'
import { createPinia } from 'pinia';
import { plugin, defaultConfig } from '@formkit/vue'
import customConfig from './formkit.config.js'
import AppDashboard from './App.vue'

const pinia = createPinia();

let dashboardRef = '[goldfinch-dashboard]';

const dashboard = document.querySelector(dashboardRef);
const app = createApp(AppDashboard, { ...dashboard.dataset });
app
  .use(pinia)
  .use(plugin, defaultConfig(customConfig))
  .mount(dashboardRef);