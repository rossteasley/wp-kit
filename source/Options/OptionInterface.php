<?php
namespace Korobochkin\WPKit\Options;

use Korobochkin\WPKit\DataComponents\NodeInterface;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\ConstraintViolationInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Interface OptionInterface represent single option with non nested (non array) values like string or numeric.
 *
 * @package Korobochkin\WPKit\Options
 */
interface OptionInterface extends NodeInterface {

	/**
	 * Returns option group which can be used on settings pages.
	 *
	 * @return string Option group name.
	 */
	public function getGroup();

	/**
	 * Setup option group name for settings pages.
	 *
	 * @param $group string Option group name.
	 *
	 * @return $this For chain calls.
	 */
	public function setGroup($group);

	/**
	 * Retrieve value of node from WordPress DB.
	 *
	 * @return string|bool|array String value of node if exists, false if some cases (option not exists in DB) or array if option saved as array.
	 */
	public function getValueFromWordPress();

	/**
	 * Describes if this option should be autoloaded by WordPress or not.
	 *
	 * @return bool true if it autoloaded, false otherwise.
	 */
	public function isAutoload();

	/**
	 * Setup how this option should be loaded. This setting not effects immediately. You need call $this->updateValue()
	 * or $this->flush() to persist changes.
	 *
	 * @param $autoload bool True for autoload, false for disable autoload.
	 *
	 * @return $this For chain calls.
	 */
	public function setAutoload($autoload);

	/**
	 * Returns set of Constraints (or just one) for Validator.
	 *
	 * @return ConstraintValidatorInterface[]|ConstraintValidatorInterface Constraint which defines how to validate your value.
	 */
	public function getConstraint();

	/**
	 * Setup set of Constraints (or just one) for Validator.
	 *
	 * @param $constraints ConstraintValidatorInterface[]|ConstraintValidatorInterface Set of constraints
	 * with validator rules.
	 *
	 * @return $this For chain calls.
	 */
	public function setConstraint($constraints);

	/**
	 * This function automatically builds the set of constraints for your instance and return it.
	 *
	 * Because constraints its a instances of classes with custom constructors is much better init them on demand (only
	 * if they needed right now). So you can easily describe how to build your constraints here and that's all.
	 *
	 * After init them you should save it. Example: $this->setConstraint($this->buildConstraint()).
	 *
	 * @return ConstraintValidatorInterface|ConstraintValidatorInterface[] Constraints for this instance.
	 */
	public function buildConstraint();

	/**
	 * Validator can validate your value of this instance. This method returns validator.
	 *
	 * @return ValidatorInterface Symfony's validator which work with Constraints.
	 */
	public function getValidator();

	/**
	 * Setup your Symfony Validator.
	 *
	 * @param ValidatorInterface $validator Validator which should validate values.
	 *
	 * @return $this For chain calls.
	 */
	public function setValidator(ValidatorInterface $validator);

	/**
	 * Returns an array with Violations after validating. May returns empty array if validation was successful.
	 *
	 * @return ConstraintViolationInterface[] Array of validation results.
	 */
	public function validate();

	/**
	 * Returns boolean flag which means is your validation successful or not.
	 *
	 * @return bool True means all is ok, False otherwise.
	 */
	public function isValid();

	/**
	 * Performs fully deletion of option.
	 *
	 * Values in DB and in this object will be deleted. Default value not deleted by this method.
	 *
	 * @return bool Result of deletion.
	 */
	public function delete();

	/**
	 * Performs deletion of option only in DB.
	 *
	 * Delete option only in DB, local value (if presented) will still stored in this object.
	 *
	 * @return bool Result of deletion.
	 */
	public function deleteFromWP();

	/**
	 * Performs deletion of option in this instance.
	 *
	 * @return true Always true after resetting local value.
	 */
	public function deleteLocal();

	/**
	 * Performs pushing local value ($this->value) into the DB (actually save the value from instance
	 * and remove $this->value because other code can use options directly with get|update|delete_option functions).
	 *
	 * @return bool Result of pushing (saving) option in DB.
	 */
	public function flush();

	/**
	 * Set value to object and then immediately save it into the DB (call $this->flush()).
	 *
	 * If operation was unsuccessful then return false and don't delete local value.
	 *
	 * @param $value mixed Any type of value which can be passed to $this->setValue().
	 * @param null|bool $autoload This value passed to $this->setAutoload()
	 *
	 * @return bool Result of $this->flush() call.
	 */
	public function updateValue($value, $autoload = null);

	/**
	 * Returns sanitizer for this instance.
	 *
	 * @return callable Sanitizer.
	 */
	//public function getSanitizer();

	/**
	 * Setup sanitizer which clean value before saving into DB.
	 *
	 * @param $sanitizer callable Sanitizer method (function).
	 *
	 * @return $this For chain calls.
	 */
	//public function setSanitizer(callable $sanitizer);

	/**
	 * Helpful then WordPress sanitize value before saving it into DB. You can attach this value to WordPress filter.
	 *
	 * @param $value mixed Value to sanitize.
	 *
	 * @return mixed Sanitized value.
	 */
	//public function sanitize($value);
}
