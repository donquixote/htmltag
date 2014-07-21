<?php

namespace Donquixote\HtmlTag\Type;

interface ClassAttributeInterface {

  /**
   * @return string[]
   */
  function getClasses();

  /**
   * @param string|string[] $classes
   *
   * @return $this
   * @throws \Exception
   */
  function setClasses($classes);

  /**
   * @param string $class
   *
   * @return $this
   */
  function addClass($class);

  /**
   * @param bool $cond
   * @param string $class
   *
   * @return $this
   */
  function addClassIf($cond, $class);

  /**
   * @param string|string[] $classes
   *
   * @return $this
   */
  function addClasses($classes);

  /**
   * @param bool[] $classes_if
   *
   * @return $this
   */
  function addClassesIf(array $classes_if);

  /**
   * @param string $class
   *
   * @return bool
   */
  function hasClass($class);

  /**
   * @param string $class
   *
   * @return $this
   */
  function removeClass($class);

} 
