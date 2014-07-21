<?php


namespace Donquixote\HtmlTag;


trait AttributesTrait {

  /**
   * @param string $tagname
   *   E.g. 'LI' or 'TBODY'.
   * @param array $args
   *   Arguments of the magic call.
   *   Format: [$content, $raw, $empty_text]
   *
   * @return string
   * @throws \Exception
   */
  function __call($tagname, $args) {
    if (!preg_match('/^[A-Z]+$/', $tagname)) {
      throw new \Exception("Invalid tag name '$tagname'.");
    }
    list($content, $raw, $empty_text) = $args + array(NULL, TRUE, NULL);
    $tagname = strtolower($tagname);
    if (!strlen($content) && is_string($empty_text)) {
      return $empty_text;
    }
    else {
      return $this->renderTag($tagname, $content, $raw);
    }
  }

  /**
   * @return string
   */
  function __toString() {
    $t = '';
    foreach ($this->getAttributes() as $key => $value) {
      $t .= ' ' . $key . '="' . $value . '"';
    }
    return $t;
  }

  /**
   * @param string $tagname
   * @param string|null $content
   * @param bool $raw
   *
   * @return string
   */
  function renderTag($tagname, $content = NULL, $raw = TRUE) {
    if (isset($content)) {
      if (!$raw) {
        $content = Util::checkPlain($content);
      }
      return '<' . $tagname . $this->__toString() . '>' . $content . '</' . $tagname . '>';
    }
    else {
      return '<' . $tagname . $this->__toString() . ' />';
    }
  }

  /**
   * @return string[]
   *   Format: $['class'] = 'class1 class2 class3'
   */
  abstract function getAttributes();

} 
