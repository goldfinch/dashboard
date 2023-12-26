import { ref } from 'vue';
import { useFetch } from '@vueuse/core';
import useFormData from './useFormData';

export default function useRequestHandler(cfg) {
  const { isFetching, error, data } = useFetch(cfg.url, {
    method: 'POST',
    headers: { 'X-CSRF-TOKEN': window.ss.config.SecurityID },
  })
    .get()
    .json();

  // const { isFetching, error, data } = useFetch(cfg.url, {
  //   method: 'POST',
  //   headers: { 'X-CSRF-TOKEN': window.ss.config.SecurityID },
  //   // body: useFormData(data),
  // }).then(() => {
  //   // isFetching.value = false
  // })

  // async function call(data) {

  //   return await useFetch(cfg.url, {
  //     method: 'POST',
  //     headers: { 'X-CSRF-TOKEN': window.ss.config.SecurityID },
  //     body: useFormData(data),
  //   }).then(() => {
  //     // isFetching.value = false
  //   })
  // }

  return { isFetching, error, data };
}
