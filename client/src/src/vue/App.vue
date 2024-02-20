<script setup>

import useRequestHandler from './composables/useRequestHandler';
// import { useSortable } from '@vueuse/integrations/useSortable'

import LoadingComponent from './components/LoadingComponent.vue'

const configUrl = '/admin/dashboard/Goldfinch-Dashboard-Configs-DashboardConfig/EditForm/field/Goldfinch-Dashboard-Configs-DashboardConfig/item/1/edit'

const goSettings = () => {
    window.location = configUrl
}

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/fetch/panels',
});

// const el = ref(null)
// const list = ref([{ id: 1, name: 'a' }, { id: 2, name: 'b' }, { id: 3, name: 'c' }])
// useSortable(el, list)

</script>
<template>
  <div class="dashboard">
    <!-- <div ref="el" class="list">
        <div v-for="(item, index) in list" :key="item.id || item._id" class="item">
            <span class="handle">xx</span>
        <slot :item="item" :index="index" />
        </div>
    </div> -->
    <div class="row">
        <div class="col-6"></div>
        <div class="col-6 text-right text-end"><a @click="goSettings" :href="configUrl">Settings</a></div>
    </div>
    <div class="row" v-if="data && !isFetching && data.cards != ''" v-html="data.cards"></div>
    <div v-else-if="data && !isFetching">No cards found</div>
    <LoadingComponent v-else="isFetching" />
  </div>
</template>
