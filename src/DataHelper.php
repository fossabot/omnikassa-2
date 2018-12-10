<?php
/**
 * Data helper
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2018 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay\Gateways\OmniKassa2
 */

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa2;

use InvalidArgumentException;

/**
 * Data helper
 *
 * @link    https://github.com/wp-pay-gateways/ideal-basic/blob/2.0.0/src/DataHelper.php
 * @author  Remco Tolsma
 * @version 2.1.0
 * @since   2.0.2
 */
class DataHelper {
	/**
	 * Validate AN..$max.
	 *
	 * @param string $value Value to validate.
	 * @param int    $max   Max length of value.
	 *
	 * @return bool
	 *
	 * @throws InvalidArgumentException Throws invalid argument exception when string is longer then max length.
	 */
	public static function validate_an( $value, $max ) {
		if ( strlen( $value ) > $max ) {
			throw new InvalidArgumentException(
				sprintf(
					'Value "%s" can not be longer then `%d`.',
					$value,
					$max
				)
			);
		}

		return true;
	}

	/**
	 * Validate null or AN..$max.
	 *
	 * @param string|null $value Value to validate.
	 * @param int         $max   Max length of value.
	 *
	 * @return bool
	 *
	 * @throws InvalidArgumentException Throws invalid argument exception when value is not null and longer then max length.
	 */
	public static function validate_null_or_an( $value, $max ) {
		if ( null === $value ) {
			return true;
		}

		return self::validate_an( $value, $max );
	}
}
