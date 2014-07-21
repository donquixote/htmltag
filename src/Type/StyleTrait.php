<?php


namespace Donquixote\HtmlTag\Type;


trait StyleTrait {

  /**
   * @var string[]
   */
  private $styles = array();

  /**
   * @return string[]
   */
  function getStyles() {
    return $this->styles;
  }

  /**
   * @param string[] $styles
   *
   * @throws \Exception
   * @return $this
   */
  public function setStyles(array $styles) {
    if (!is_array($styles)) {
      throw new \Exception("Styles must be an array.");
    }
    $this->styles = $styles;
    return $this;
  }

  /**
   * @param string $key
   * @param string $value
   *
   * @return $this
   */
  function setStyle($key, $value) {
    $this->styles[$key] = $value;
    return $this;
  }

  /**
   * @param string $key
   * @param string $value
   *
   * @return $this
   */
  function addStyle($key, $value) {
    $this->styles[$key] = $value;
    return $this;
  }

  function addStyles(array $styles) {
    foreach ($styles as $key => $value) {
      $this->styles[$key] = $value;
    }
		return $this;
  }

  /**
   * Removes a style attribute
   *
   * @param string $key
   *
   * @return $this
   */
	function removeStyle($key) {
		unset($this->styles[$key]);
		return $this;
	}

} 
