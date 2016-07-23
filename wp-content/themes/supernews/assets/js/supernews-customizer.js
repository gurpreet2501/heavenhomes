/**
 * Customizer custom js
 */

jQuery(document).ready(function() {
   jQuery('.wp-full-overlay-sidebar-content').prepend('<div class="acme-ads"> <a href="https://www.acmethemes.com/themes/supernewspro" class="button" target="_blank">{pro}</a></div>'.replace('{pro}',supernews_customizer_js_obj.pro));
});