
const dev = import.meta.env && !import.meta.env.DEV;
const host = 'silverstripe-starter.lh';

const bootstrap_icon_path = (dev ? '' : '//' + host) + '/_resources/vendor/goldfinch/extra-assets/client/dist/bootstrap-icons/icons/';

export default {

  host: host,
  certs: '/Applications/MAMP/Library/OpenSSL/certs/' + host,

  sassAdditionalData: ``, // `$bootstrap-icon-path: '${bootstrap_icon_path}';`,

  public: {
      // bootstrap_icon_path: bootstrap_icon_path,
  }
}
