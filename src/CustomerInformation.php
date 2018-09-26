<?php
/**
 * Customer information
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2018 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay\Gateways\OmniKassa2
 */

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa2;

/**
 * Customer information
 *
 * @author  Remco Tolsma
 * @version 2.0.2
 * @since   2.0.2
 */
class CustomerInformation {
	/**
	 * The e-mailadress of the consumer.
	 *
	 * @var string
	 */
	private $email_address;

	/**
	 * The date of birth of the consumer.
	 *
	 * @var string
	 */
	private $date_of_birth;

	/**
	 * The gender of the consumer.
	 *
	 * @var string
	 */
	private $gender;

	/**
	 * The initials of the consumer.
	 *
	 * @var string
	 */
	private $initials;

	/**
	 * The consumer's telephone number.
	 *
	 * @var string
	 */
	private $telephone_number;

	/**
	 * Set the e-mailadress of the consumer.
	 *
	 * @param string $email_address E-mailadress of the consumer.
	 */
	public function set_email_address( $email_address ) {
		$this->email_address = $email_address;
	}

	/**
	 * Get JSON.
	 *
	 * @return object|null
	 */
	public function get_json() {
		$data = array(
			'emailAddress'    => $this->email_address,
			'dateOfBirth'     => $this->date_of_birth,
			'gender'          => $this->gender,
			'initials'        => $this->initials,
			'telephoneNumber' => $this->telephone_number,
		);

		$data = array_filter( $data );

		if ( empty( $data ) ) {
			return null;
		}

		return (object) $data;
	}
}
