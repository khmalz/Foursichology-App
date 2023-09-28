<?php

namespace App\Helpers;

use Carbon\Carbon;

class DateHelper
{
   /**
    * Membuat label 1/2/3 (hari/minggu/bulan/tahun) yang lalu
    */
   public static function getActivityDateLabel(string|Carbon $date): string
   {
      if (is_string($date)) {
         $date = Carbon::createFromFormat('d-m-Y', $date);
      }

      $date = $date->startOfDay();
      $diffInDays = $date->diffInDays(now()->startOfDay());
      $label = null;

      if ($diffInDays <= 1) {
         $label = ($diffInDays === 0) ? 'Hari ini' : '1 hari yang lalu';
      } elseif ($diffInDays <= 7) {
         $label = $diffInDays . ' hari yang lalu';
      } elseif ($diffInDays <= 30) {
         $label = floor($diffInDays / 7) . ' minggu yang lalu';
      } elseif ($diffInDays <= 365) {
         $label = floor($diffInDays / 30) . ' bulan yang lalu';
      } else {
         $label = floor($diffInDays / 365) . ' tahun yang lalu';
      }

      return $label;
   }
}
