<script setup>
import useRequestHandler from '../../composables/useRequestHandler';

const { data, error, isFetching } = useRequestHandler({
  url: '/api/dashcore/info/table',
});
</script>
<template>
  <div class="col">
    <div class="card mb-3">
      <h3 class="card-header">Info</h3>
      <div class="card-body" :class="isFetching ? 'card-body-loading' : ''">
        <div v-if="!isFetching && data">
          <h3>General</h3>
          <ul>
            <li>
              <strong>Assets size:</strong>
              <span>{{ data.assetsSize ? data.assetsSize : 0 }} MB</span>
            </li>
          </ul>
          <h3>Silver Stripe</h3>
          <ul>
            <li>
              <strong>Version:</strong><span v-text="data.ss.version"></span>
            </li>
            <li>
              <strong>Modules</strong>
              <ul>
                <li v-for="(key, val) in data.ss.modules">
                  <strong v-text="key"></strong>: <span v-text="val"></span>
                </li>
              </ul>
            </li>
          </ul>
          <br /><br />
          <h3>Server</h3>
          <ul>
            <li>
              <strong>Total disk:</strong>
              <span
                >{{
                  data.server.disk_total ? data.server.disk_total : 0
                }}
                GB</span
              >
            </li>
            <li>
              <strong>Timezone:</strong>
              <span v-text="data.server.timezone"></span>
            </li>
            <li>
              <strong>server_ip:</strong>
              <span v-text="data.server.server_ip"></span>
            </li>
            <li>
              <strong>server_email:</strong>
              <span v-html="data.server.server_email"></span>
            </li>
            <li>
              <strong>cdn:</strong> <span v-text="data.server.cdn"></span>
            </li>
            <li>
              <strong>server_ipcountry:</strong>
              <span v-text="data.server.server_ipcountry"></span>
            </li>
            <li>
              <strong>php:</strong> <span v-text="data.server.php"></span>
            </li>
            <li>
              <strong>allocated_php_memory:</strong>
              <span v-text="data.server.allocated_php_memory"></span>
            </li>
            <li>
              <strong>mysql:</strong> <span v-text="data.server.mysql"></span>
            </li>
          </ul>
          <h3>DNS</h3>
          <p v-if="!data.server.dns.length">-</p>
          <ul v-else>
            <li v-for="(key, val) in data.server.dns">
              <strong v-text="key"></strong>: <span v-text="val"></span>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</template>
