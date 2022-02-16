<?php
defined('BASEPATH') or exit('Action is not allowed');

function format_date_with_hour($string)
{

  $day_week = date('w', strtotime($string));

  if ($day_week == 0) {
    $week = "Sunday";
  } elseif ($day_week == 1) {
    $week = "Monday";
  } elseif ($day_week == 2) {
    $week = "Tuesday";
  } elseif ($day_week == 3) {
    $week = "Wednesday";
  } elseif ($day_week == 4) {
    $week = "Thursday";
  } elseif ($day_week == 5) {
    $week = "Friday";
  } else {
    $week = "Saturday";
  }

  $day = date('d', strtotime($string));

  $month_num = date('m', strtotime($string));

  $year = date('Y', strtotime($string));
  $hour = date('H:i', strtotime($string));

  return $day . '/' . $month_num . '/' . $year . ' ' . $hour;
}

function format_date_without_hour($string)
{

  $day_week = date('w', strtotime($string));
  if ($day_week == 0) {
    $week = "Sunday";
  } elseif ($day_week == 1) {
    $week = "Monday";
  } elseif ($day_week == 2) {
    $week = "Tuesday";
  } elseif ($day_week == 3) {
    $week = "Wednesday";
  } elseif ($day_week == 4) {
    $week = "Thursday";
  } elseif ($day_week == 5) {
    $week = "Friday";
  } else {
    $week = "Saturday";
  }

  $day = date('d', strtotime($string));

  $month_num = date('m', strtotime($string));

  $year = date('Y', strtotime($string));
  $hour = date('H:i', strtotime($string));

  return $day . '/' . $month_num . '/' . $year;
}
