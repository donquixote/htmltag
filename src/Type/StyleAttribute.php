<?php


namespace Donquixote\HtmlTag\Type;


class StyleAttribute implements SpecialAttributeInterface {

  /**
   * @var StyleAttributeInterface
   */
  private $tagAttributes;

  /**
   * @param StyleAttributeInterface $tagAttributes
   */
  function __construct($tagAttributes) {
    $this->tagAttributes = $tagAttributes;
  }

  /**
   * @param mixed $styles
   *
   * @throws \Exception
   * @return array
   */
  function set($styles) {
    $this->tagAttributes->setStyles($styles);
  }

  /**
   * @return string
   */
  function __toString() {
    $pieces = [];
    foreach ($this->tagAttributes->getStyles() as $key => $value) {
      $pieces[] = $key . ': ' . $value . ';';
    }
    return implode(' ', $pieces);
  }

  /**
   * Unset the value.
   */
  function reset() {
    $this->tagAttributes->setStyles([]);
  }
}
