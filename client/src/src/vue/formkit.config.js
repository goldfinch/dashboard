import { generateClasses } from '@formkit/themes';
import { createAutoAnimatePlugin } from '@formkit/addons';
// import { createInput } from '@formkit/vue'

// import DropdownField from '@/js/vue/components/form/DropdownField.vue'

/**
 * @formkit/themes/dist/tailwindcss/genesis/index.mjs
 */
const config = {
  plugins: [
    createAutoAnimatePlugin(
      {
        /* optional AutoAnimate config */
        // default:
        duration: 250,
        easing: 'ease-in-out',
        delay: 0,
      },
      {
        /* optional animation targets object */
        // default:
        global: ['outer', 'inner'],
        form: ['form'],
        repeater: ['items'],
      },
    ),
  ],
  // inputs: {
  //   dropdown: createInput(DropdownField, {
  //     // props: [],
  //   }),
  // },
  config: {
    classes: generateClasses({
      global: {
        // classes
        outer: 'mb-3',
        input: '$reset form-control',
        label: 'form-label',
        help: '$reset form-text',
      },
      form: {
        form: '$reset',
      },
      range: {
        input: '$reset form-range',
      },
      submit: {
        outer: '$reset mt-3',
        input: '$reset btn btn-primary',
      },
    }),
  },
};

export default config;
