<?php

define('WP_USE_THEMES', FALSE);

/** Loads the WordPress Environment and Template */
require( dirname(__FILE__) . '/wp-load.php' );

header('Content-Type: application/json');


if (
        !isset($_POST['_sp']) || !wp_verify_nonce($_POST['_sp'], 'submit_participation')
) {

  _wp_wed_out(FALSE, 'nonce not verified');
} else if (empty($_POST['name']) || empty($_POST['email']) || empty($_POST['message'])) {
  _wp_wed_out(FALSE, 'Per favore, specifica nome, email e qualche nota :(');
} else {
  $res = _wp_wed_submit($_POST['name'], $_POST['email'], $_POST['message']);
  if ($res) {
    $res = _wp_wed_mail_ok($_POST['name'], $_POST['email'], $_POST['message']);
    _wp_wed_out(TRUE, 'Grazie ' . $_POST['name'] . ' per averci fatto sapere che parteciperai! Ti contatteremo presto!');
  } else {
    $res = _wp_wed_mail_ko($_POST['name'], $_POST['email'], $_POST['message']);
    _wp_wed_out(FALSE, 'Si è verificato un problema, puoi provare più tardi, per favore?');
  }
}

function _wp_wed_mail_ok($name, $email, $notes) {
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type: text/html; charset=" . get_bloginfo('charset') . "" . "\r\n";
  $headers .= "From: Registration <noreply-registration@marta-e-anto-sposi.eu>" . "\r\n";
  wp_mail(array("antonio.pastorino@gmail.com"), "$name intende partecipare al matrimonio", "$name [$email] \r\n$notes", $headers);
}

function _wp_wed_mail_ko($name, $email, $notes) {
  $headers = "MIME-Version: 1.0" . "\r\n";
  $headers .= "Content-type: text/html; charset=" . get_bloginfo('charset') . "" . "\r\n";
  $headers .= "From: Registration <noreply-registration@marta-e-anto-sposi.eu>" . "\r\n";
  wp_mail(array("antonio.pastorino@gmail.com"), "[ERR] $name intende partecipare al matrimonio", "$name [$email] \r\n$notes", $headers);
}

function _wp_wed_submit($name, $email, $notes) {
  global $wpdb;
  $wpdb->insert(
          'wp_participants', array('name' => $name, 'email' => $email, 'notes' => $notes)
  );
  return $wpdb->insert_id;
}

function _wp_wed_out($success, $message) {
  $response = array("success" => $success, "message" => $message);
  die(json_encode($response));
}

