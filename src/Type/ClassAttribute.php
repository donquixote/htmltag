<?php


namespace Donquixote\HtmlTag\Type;


class ClassAttribute implements SpecialAttributeInterface {

  /**
   * @var ClassAttributeInterface
   */
  private $tagAttributes;

  /**
   * @param ClassAttributeInterface $tagAttributes
   */
  function __construct($tagAttributes) {
    $this->tagAttributes = $tagAttributes;
  }

  /**
   * @param string|string[] $classes
   *
   * @throws \Exception
   */
  function set($classes) {
    $this->tagAttributes->setClasses($classes);
  }

  /**
   * @return string
   */
  function __toString() {
    return implode(' ', $this->tagAttributes->getClasses());
  }

  /**
   * Unset the value.
   */
  function reset() {
    $this->tagAttributes->setClasses([]);
  }
}
