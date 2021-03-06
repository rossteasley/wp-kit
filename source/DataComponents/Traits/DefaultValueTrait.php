<?php
namespace Korobochkin\WPKit\DataComponents\Traits;

trait DefaultValueTrait {

	protected $defaultValue;

	public function getDefaultValue() {
		return $this->defaultValue;
	}

	public function setDefaultValue($defaultValue) {
		$this->defaultValue = $defaultValue;
		return $this;
	}

	public function hasDefaultValue() {
		return isset($this->defaultValue);
	}
}
