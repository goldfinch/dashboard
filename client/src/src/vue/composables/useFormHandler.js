import { ref, onMounted, watch } from 'vue';
import { useFetch, useElementVisibility } from '@vueuse/core';
import { load } from 'recaptcha-v3';
import useFormData from './useFormData';

export default function useFormHandler(cfg) {
  const isVisible = useElementVisibility(cfg.ref);

  const recaptchaLoaded = ref(false);
  const recaptcha = ref(null);

  async function submitHandler(data) {
    showBadge();

    const token = await recaptcha.value.execute(cfg.action);

    data.token = token;

    return await useFetch(cfg.url, {
      method: 'POST',
      headers: { 'X-CSRF-TOKEN': window.csrfToken },
      body: useFormData(data),
    }).then(() => {
      hideBadge();
    });
  }

  async function recaptchaInit() {
    const siteKey = document.head.querySelector('meta[name="g-site-key"]');

    if (siteKey) {
      recaptcha.value = await load(siteKey.content);
    }
  }

  watch(isVisible, (current, prev) => {
    if (!recaptchaLoaded.value && current) {
      recaptchaLoaded.value = true;
      recaptchaInit();
    }
  });

  const showBadge = () => {
    const badge = document.getElementsByClassName('grecaptcha-badge');
    if (badge.length) {
      badge[0].classList.add('grecaptcha-badge--show');
    }
  };

  const hideBadge = () => {
    const badge = document.getElementsByClassName('grecaptcha-badge');
    if (badge.length) {
      badge[0].classList.remove('grecaptcha-badge--show');
    }
  };

  return { submitHandler };
}
