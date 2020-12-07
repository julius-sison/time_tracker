<?php
/*
   Plugin Name: timeTracker
   Plugin URI: http://wordpress.org/extend/plugins/timetracker/
   Version: 0.1
   Author: rufo n. gabrillo jr.
   Description: simple time tracker
   Text Domain: timetracker
   License: GPLv3
  */
  global $wpdb;
  register_activation_hook( __FILE__, 'activate_timeTracker');

  $Timetracker_minimalRequiredPhpVersion = '5.0';
  wp_enqueue_style("css_timeTraker",plugins_url("timetracker/css/style.css"));
  wp_enqueue_script("js_JQuery",plugins_url("timetracker/js/jquery.min.js"));
  add_action('admin_menu','Timetracker_init');

  function Timetracker_init() {
    add_menu_page('Time Tracker', 'Time Tracker', 'manage_options', 'timeTracker', 'init', plugins_url("timetracker/img/icon.png"));
  }

  function init(){ 
    echo "<div id='display_content' class=''>
      <div id='display_userAccount'>Rufo N. Gabrillo Jr.</div>
      <ul id='display_list'></ul>
      <div id='display_loadMore'>Load more</div>
      <div id='display_showLess'>Show less</div>
    </div>";
    wp_enqueue_script("js_timeTraker",plugins_url("timetracker/js/process.js"));
  }

  function activate_timeTracker(){
    global $wpdb;
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE tbl_screencapture(id int(11) NOT NULL,date_time varchar(20) NOT NULL, screen varchar(100) NOT NULL, user varchar(100) NOT NULL, PRIMARY KEY (id))ENGINE=MyISAM DEFAULT CHARSET=latin1;";

    require_once(ABSPATH.'wp-admin/includes/upgrade.php');
    dbDelta($sql);
  }

