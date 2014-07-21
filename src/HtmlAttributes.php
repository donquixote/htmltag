<?php


namespace Donquixote\HtmlTag;

/**
 * @method string DIV()
 * @method string UL()
 * @method string OL()
 * @method string LI()
 * @method string TABLE()
 * @method string TR()
 * @method string TD()
 * @method string TH()
 * @method string SPAN()
 * @method string A()
 *
 * @see AttributesTrait::__call()
 *
 * @api
 */
class HtmlAttributes extends HtmlAttributeBag {

  use AttributesTrait;

} 
