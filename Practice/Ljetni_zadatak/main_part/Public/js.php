<script src="../assets/js/vendor.js"></script>
<script src="../assets/js/foundation.js"></script>
<script src="../assets/js/custom.js"></script>

<script>
$(document).foundation();
  // Patch for a Bug in v6.3.1
  $(window).on('changed.zf.mediaquery', function() {
    $('.is-dropdown-submenu.invisible').removeClass('invisible');
  });
</script>