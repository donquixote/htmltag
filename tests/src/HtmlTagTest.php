<?php

namespace Donquixote\HtmlTag\Tests;


use Donquixote\HtmlTag\HtmlAttributes;

class HtmlTagTest extends \PHPUnit_Framework_TestCase {

  function testEmptyAttributes() {
    $attributes = (new HtmlAttributes());
    $this->assertEquals('', $attributes->__toString());
    $this->assertEquals('<div>the contents</div>', $attributes->DIV('the contents'));
    $this->assertEquals('<div>aa<br/>bb</div>', $attributes->DIV('aa<br/>bb', true));
    $this->assertEquals('<div>aa<br/>bb</div>', $attributes->DIV('aa<br/>bb'));
  }

  function testSanitizeContents() {
    $attributes = (new HtmlAttributes());
    $this->assertEquals('<div>aa&lt;br/&gt;bb</div>', $attributes->DIV('aa<br/>bb', false));
  }

  function testEmptyTag() {
    $attributes = (new HtmlAttributes());
    $this->assertEquals('<div></div>', $attributes->DIV(''));
    $this->assertEquals('<div />', $attributes->DIV(null));
    $this->assertEquals('other', $attributes->DIV('', true, 'other'));
    $this->assertEquals('other', $attributes->DIV(null, true, 'other'));
  }

  function testHtmlAttributes() {
    $attributes = (new HtmlAttributes())
      ->set('class', 'theClass')
      ->set('href', 'http://dqxtech.net')
    ;

    $expected = ' class="theClass" href="http://dqxtech.net"';
    $this->assertEquals($expected, $attributes->__toString());

    $expected = '<a class="theClass" href="http://dqxtech.net">the contents</a>';
    $this->assertEquals($expected, $attributes->A('the contents'));
  }

  function testClassAttribute() {
    $attributes = (new HtmlAttributes())
      ->addClass('wipeMeOut')
      ->set('class', 'theClass')
      ->addClass('otherClass')
      ->addClasses(['class0', 'class1'])
      ->addClasses('class2 class3 class1 class4')
      ->removeClass('class3')
      ->addClassIf(false, 'donotadd')
      ->addClassIf(true, 'addme')
      ->addClassesIf(
        [
          'cyes' => true,
          'cno' => false,
        ])
    ;
    $expected = ' class="theClass otherClass class0 class1 class2 class4 addme cyes"';
    $this->assertEquals($expected, $attributes->__toString());
  }

  function testStyleAttribute() {
    $attributes = (new HtmlAttributes())
      ->addStyle('font-family', 'monospace')
      ->set('style', ['color' => 'blue'])
      ->setStyle('margin-top', 0)
      ->addStyles(['padding-bottom', '5px'])
    ;
    $expected = ' style="color: blue; margin-top: 0; 0: padding-bottom; 1: 5px;"';
    $this->assertEquals($expected, $attributes->__toString());

    $attributes
      ->unsetAttribute('style')
      ->addStyle('color', 'yellow')
    ;
    $this->assertEquals('', $attributes->__toString());
  }

} 
