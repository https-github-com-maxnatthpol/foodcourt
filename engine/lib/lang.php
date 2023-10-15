<?php

function lang($val_th, $val_en)
{
  if (isset($_COOKIE['lang'])) {
    switch ($_COOKIE['lang']) {
      case 'th':
        $name = $val_th;
        break;
      case 'en':
        $name = $val_en;
        break;
      default:
        $name = $val_th;
        break;
    }
  } else {
    $name = $val_th;
  }
  return $name;
}