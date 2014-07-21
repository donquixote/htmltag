<?php

namespace Donquixote\HtmlTag;

use Donquixote\HtmlTag\Type\ClassAttribute;
use Donquixote\HtmlTag\Type\StyleAttribute;

/**
 * @property string class
 * @property string style
 * @property string id
 */
class HtmlAttributeBag extends XmlAttributeBag implements HtmlAttributeBagInterface {

  use Type\ClassTrait;
  use Type\StyleTrait;

  /**
   * The constructor.
   */
  function __construct() {
    $special = [];
    $special['class'] = new ClassAttribute($this);
    $special['style'] = new StyleAttribute($this);
    parent::__construct($special);
  }

} 
