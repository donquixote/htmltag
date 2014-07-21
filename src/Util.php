<?php


namespace Donquixote\HtmlTag;


class Util {

  /**
   * Inspired by Drupal's check_plain().
   *
   * @param string $text
   *
   * @return string
   */
  static function checkPlain($text) {
    return htmlspecialchars($text, ENT_QUOTES, 'UTF-8');
  }

} 
