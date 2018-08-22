<?php
/**
 * Money
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2018 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay\Gateways\OmniKassa2
 */

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa2;

use InvalidArgumentException;
use stdClass;
use JsonSchema\Constraints\Constraint;
use JsonSchema\Exception\ValidationException;
use JsonSchema\Validator;

/**
 * Money
 *
 * @author  Remco Tolsma
 * @version 2.0.0
 * @since   1.0.0
 */
class Money {
	/**
	 * Currency.
	 *
	 * @var string
	 */
	private $currency;

	/**
	 * Amount.
	 *
	 * @var int
	 */
	private $amount;

	/**
	 * Construct notification message.
	 *
	 * @param string $currency Authentication.
	 * @param int    $amount   Amount.
	 */
	public function __construct( $currency, $amount ) {
		$this->currency = $currency;
		$this->amount   = $amount;
	}

	/**
	 * Get currency.
	 *
	 * @return string
	 */
	public function get_currency() {
		return $this->currency;
	}

	/**
	 * Get amount.
	 *
	 * @return int
	 */
	public function get_amount() {
		return $this->amount;
	}

	/**
	 * Create money from object.
	 *
	 * @param stdClass $object Object.
	 * @return Money
	 * @throws InvalidArgumentException Throws invalid argument exception when object does not contains the required properties.
	 */
	public static function from_object( stdClass $object ) {
		if ( ! isset( $object->currency ) ) {
			throw new InvalidArgumentException( 'Object must contain `currency` property.' );
		}

		if ( ! isset( $object->amount ) ) {
			throw new InvalidArgumentException( 'Object must contain `amount` property.' );
		}

		return new self(
			$object->currency,
			$object->amount
		);
	}

	/**
	 * Create money from JSON string.
	 *
	 * @param string $json JSON string.
	 * @return Money
	 * @throws \JsonSchema\Exception\ValidationException Throws JSON schema validation exception when JSON is invalid.
	 */
	public static function from_json( $json ) {
		$data = json_decode( $json );

		$validator = new Validator();

		$validator->validate( $data, (object) array(
			'$ref' => 'file://' . realpath( __DIR__ . '/../json-schemas/json-schema-money.json' ),
		), Constraint::CHECK_MODE_EXCEPTIONS );

		return self::from_object( $data );
	}
}