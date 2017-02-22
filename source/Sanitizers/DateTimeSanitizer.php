<?php
namespace Korobochkin\WPKit\Sanitizers;

class DateTimeSanitizer implements SanitizerInterface {

	public static function sanitize($value) {
		try {
			return \DateTime::createFromFormat(\DateTime::ISO8601, $value);
		}
		catch(\Exception $exception) {
			return false;
		}
	}

	public static function unSanitize(\DateTime $value) {
		return $value->format(\DateTime::ISO8601);
	}
}
