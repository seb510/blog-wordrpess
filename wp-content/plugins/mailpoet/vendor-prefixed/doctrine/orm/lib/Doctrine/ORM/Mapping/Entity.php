<?php
 namespace MailPoetVendor\Doctrine\ORM\Mapping; if (!defined('ABSPATH')) exit; use Attribute; use MailPoetVendor\Doctrine\Common\Annotations\Annotation\NamedArgumentConstructor; final class Entity implements Annotation { public $repositoryClass; public $readOnly = \false; public function __construct(?string $repositoryClass = null, bool $readOnly = \false) { $this->repositoryClass = $repositoryClass; $this->readOnly = $readOnly; } } 