<?php

/**
 * This file is part of the Nette Framework (http://nette.org)
 *
 * Copyright (c) 2004, 2011 David Grudl (http://davidgrudl.com)
 *
 * For the full copyright and license information, please view
 * the file license.txt that was distributed with this source code.
 */

namespace Nette\DI;

use Nette;



/**
 * Definition used by ContainerBuilder.
 *
 * @author     David Grudl
 */
class ServiceDefinition extends Nette\Object
{
	/** @var string  class or interface name */
	public $class;

	/** @var string|array  Factory::create */
	public $factory;

	/** @var array */
	public $arguments;

	/** @var array of array(callback|method|property, arguments) */
	public $setup = array();

	/** @var array */
	public $tags = array();

	/** @var mixed */
	public $autowired = TRUE;



	public function setClass($class, array $args = NULL)
	{
		$this->class = $class;
		if ($args !== NULL) {
			$this->arguments = $args;
		}
		return $this;
	}



	public function setFactory($factory, array $args = NULL)
	{
		$this->factory = $factory;
		if ($args !== NULL) {
			$this->arguments = $args;
		}
		return $this;
	}



	public function setArguments(array $args)
	{
		$this->arguments = $args;
		return $this;
	}



	public function addSetup($target, $args = NULL)
	{
		$this->setup[] = array($target, $args);
		return $this;
	}



	public function addTag($tag, $attrs = TRUE)
	{
		$this->tags[$tag] = $attrs;
		return $this;
	}



	public function setAutowired($on)
	{
		$this->autowired = $on;
		return $this;
	}

}
