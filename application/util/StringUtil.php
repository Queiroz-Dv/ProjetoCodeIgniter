<?php

namespace order\TIN\Util;

use InvalidArgumentException;

class StringUtil
{
  public static function clearString(string $str)
  {
    return preg_replace("[^a-zA-Z0-9]", "", $str);
  }

  public static function substring(string $str, int $start, int $end = NULL)
  {
    if ($end === null) {
      return substr($str, $start);
    }
    return substr($str, $start, $end - $start);
  }

  public static function isFollowLength(string $str, int $legnth)
  {
    return strlen($str) === $legnth;
  }

  public static function isFollowPattern(string $str, string $pattern)
  {
    return preg_match("/$pattern/", $str);
  }

  public static function digitAt(string $str, $index)
  {
    return (int) $str[$index];
  }

  public static function getNumericValues(string $str)
  {
    if (is_numeric($str)) {
      return $str;
    }
    return ord(strtoupper($str)) - 55;
  }

  public static function getAlphabeticalPosition(string $str)
  {
    $arr = str_split('abcdefghijklmnopqrstuvwxyz');
    $v = array_search(strtolower($str), $arr);
    if ($v !== false) {
      return $v + 1;
    }
    return 0;
  }

  public static function isUpper(string $str)
  {
    return preg_match('~^\p{Lu}~u', $str) ? TRUE : FALSE;
  }

  public static function isLower(string $str)
  {
    return preg_match('~^\p{Ll}~u', $str) ? TRUE : FALSE;
  }

  public static function forDigit(int $digit, int $radix = 10)
  {
    if ($radix != 10) {
      throw new InvalidArgumentException("Radix should be 10");
    }
    return (string) $digit;
  }

  public static function removesCharacterAtPos(string $s, string $c, int $pos)
  {
    $len = strlen($s);
    if ($pos > $len - 1) {
      return $s;
    }
    $tmp = $s[$pos];
    if ($tmp == $c) {
      $prefix = "";
      if ($pos <= $len) {
        $prefix = substr($s, 0, $pos);
      }
      $suffix = "";
      if ($pos + 1 <= $len - 1) {
        $suffix = substr($s, $pos + 1);
      }
      return $prefix . $suffix;
    }
    return $s;
  }

  public static function fillWith0UntilLength(string $tin, int $length)
  {
    $normalizedTIN = $tin;
    while (strlen($normalizedTIN) < $length) {
      $normalizedTIN = "0" . $normalizedTIN;
    }
    return $normalizedTIN;
  }
}
