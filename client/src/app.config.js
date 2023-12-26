export default function initCfg(command, mode, ssrBuild) {
  const dev = command === 'serve';
  const host = 'silverstripe.lh';

  const bootstrap_icon_svg_path = dev
    ? `https://${host}:5173/node_modules/bootstrap-icons/icons/`
    : '/_resources/vendor/goldfinch/extra-assets/client/dist/bootstrap-icons/icons/';

  return {
    host,
    certs: `/Applications/MAMP/Library/OpenSSL/certs/${host}`,

    sassAdditionalData: '', // `$bootstrap-icon-path: '${bootstrap_icon_path}';`,

    public: {
      // bootstrap_icon_path: bootstrap_icon_svg_path,
    },
  };
}
