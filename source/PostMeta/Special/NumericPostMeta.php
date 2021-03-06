<?php
namespace Korobochkin\WPKit\PostMeta\Special;

use Korobochkin\WPKit\DataComponents\Traits\Special\Numeric\NumericBuildConstraintTrait;
use Korobochkin\WPKit\DataComponents\Traits\Special\Numeric\NumericConstructorTrait;
use Korobochkin\WPKit\PostMeta\AbstractPostMeta;

class NumericPostMeta extends AbstractPostMeta {

	use NumericConstructorTrait;

	use NumericBuildConstraintTrait;
}
