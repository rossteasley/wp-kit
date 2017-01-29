<?php
namespace Korobochkin\WPKit\Options;

use Korobochkin\WPKit\Sanitizers\BoolSanitizer;
use Symfony\Component\Validator\Constraints;

class BoolOption extends AbstractOption {

	protected $sanitizer = array('Korobochkin\WPKit\Sanitizers\BoolSanitizer', 'sanitize');

	/**
	 * @inheritdoc
	 */
	public function buildConstraint() {
		new Constraints\Type(array(
			'type' => 'bool'
		));
	}
}
