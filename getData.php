<?php
  // require(dirname(__FILE__).'/wp-load.php');
  require('../../../wp-load.php');

  global $wpdb;
  $screen = $wpdb->get_results("SELECT * FROM tbl_screencapture");
  print_r(json_encode($screen));

?>