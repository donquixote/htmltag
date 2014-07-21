<?php

namespace Donquixote\HtmlTag;

use Donquixote\HtmlTag\Type\SpecialAttributeInterface;

class XmlAttributeBag {

  /**
   * @var array
   */
  private $attributes = array();

  /**
   * @var SpecialAttributeInterface[]
   */
  private $special = array();

  /**
   * @param SpecialAttributeInterface[] $special
   */
  protected function __construct(array $special) {
    $this->special = $special;
  }

  /**
   * Sets an attribute value.
   *
   * @param string $key
   * @param mixed $value
   *
   * @return $this
   * @throws \Exception
   */
  function set($key, $value) {
    if (isset($this->special[$key])) {
      $this->special[$key]->set($value);
      $this->attributes[$key] = TRUE;
    }
    elseif (!is_string($value)) {
      throw new \Exception("Value must be a string.");
    }
    else {
      $this->attributes[$key] = $value;
    }
    return $this;
  }

  /**
   * @param string $key
   *
   * @return string|null
   */
  function get($key) {
    if (!array_key_exists($key, $this->attributes)) {
      return NULL;
    }
    if (isset($this->special[$key])) {
      return $this->special[$key]->__toString();
    }
    else {
      return $this->attributes[$key];
    }
  }

  /**
   * @param string $key
   *
   * @return $this
   */
  function unsetAttribute($key) {
    unset($this->attributes[$key]);
    if (isset($this->special[$key])) {
      $this->special[$key]->reset();
    }
    return $this;
  }

  /**
   * @return string[]
   */
  function getAttributes() {
    $attributes = $this->attributes;
    foreach ($this->special as $key => $special) {
      if (array_key_exists($key, $attributes)) {
        $attributes[$key] = $special->__toString();
      }
    }
    return $attributes;
  }

  /**
   * @return string
   */
  function getAttributesString() {
    $t = '';
    foreach ($this->getAttributes() as $key => $value) {
      $t .= ' '. $key .'="'. $value .'"';
    }
    return $t;
  }

} 
