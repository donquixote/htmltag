<?php


namespace Donquixote\HtmlTag\Type;


interface StyleAttributeInterface {

  /**
   * @return string[]
   */
  public function getStyles();

  /**
   * @param string[] $styles
   *
   * @throws \Exception
   * @return $this
   */
  public function setStyles(array $styles);

  /**
   * @param string $key
   * @param string $value
   *
   * @return $this
   */
  function setStyle($key, $value);

  /**
   * Removes a style attribute
   *
   * @param string $key
   *
   * @return $this
   */
	function removeStyle($key);

} 
