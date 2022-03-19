<?php
namespace MailPoetVendor\Twig\Node\Expression\Test;
if (!defined('ABSPATH')) exit;
use MailPoetVendor\Twig\Compiler;
use MailPoetVendor\Twig\Node\Expression\TestExpression;
class DivisiblebyTest extends TestExpression
{
 public function compile(Compiler $compiler)
 {
 $compiler->raw('(0 == ')->subcompile($this->getNode('node'))->raw(' % ')->subcompile($this->getNode('arguments')->getNode(0))->raw(')');
 }
}
\class_alias('MailPoetVendor\\Twig\\Node\\Expression\\Test\\DivisiblebyTest', 'MailPoetVendor\\Twig_Node_Expression_Test_Divisibleby');
