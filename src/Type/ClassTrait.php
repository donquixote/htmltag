<?php

namespace Donquixote\HtmlTag\Type;


trait ClassTrait {

  /**
   * @var string[]
   */
  private $classes = array();

  /**
   * @return string[]
   */
  function getClasses() {
    return $this->classes;
  }

  /**
   * @param string|string[] $classes
   *
   * @return $this
   * @throws \Exception
   */
  function setClasses($classes) {
    if (is_string($classes)) {
      $classes = explode(' ', $classes);
    }
    elseif (!is_array($classes)) {
      throw new \Exception("Classes must be string or array.");
    }
    $this->classes = array_combine($classes, $classes);
    return $this;
  }

  /**
   * @param string $class
   *
   * @return $this
   */
  function addClass($class) {
    $this->classes[$class] = $class;
    return $this;
  }

  /**
   * @param bool $cond
   * @param string $class
   *
   * @return $this
   */
  function addClassIf($cond, $class) {
    if ($cond) {
      $this->classes[$class] = $class;
    }
    return $this;
  }

  /**
   * @param string|string[] $classes
   *
   * @return $this
   */
  function addClasses($classes) {
    if (!is_array($classes)) {
      $classes = explode(' ', $classes);
    }
    foreach ($classes as $class) {
      if ($class) {
        $this->classes[$class] = $class;
      }
    }
    return $this;
  }

  /**
   * @param bool[] $classes_if
   *
   * @return $this
   */
  function addClassesIf(array $classes_if) {
    foreach ($classes_if as $class => $cond) {
      if ($cond) {
        $this->classes[$class] = $class;
      }
    }
    return $this;
  }

  /**
   * @param string $class
   *
   * @return bool
   */
  function hasClass($class) {
    return isset($this->classes[$class]);
  }

  /**
   * @param string $class
   *
   * @return $this
   */
  function removeClass($class) {
    unset($this->classes[$class]);
    return $this;
  }

} 
