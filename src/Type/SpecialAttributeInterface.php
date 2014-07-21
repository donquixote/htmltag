<?php


namespace Donquixote\HtmlTag\Type;


interface SpecialAttributeInterface {

  /**
   * @param mixed $value
   */
  function set($value);

  /**
   * Unset the value.
   */
  function reset();

  /**
   * @return string
   */
  function __toString();

} 
