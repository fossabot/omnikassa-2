<?php
/**
 * Customer information.
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2018 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay\Gateways\OmniKassa2
 */

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa2;

use DateTimeInterface;

/**
 * Customer information.
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
	 * @var DateTimeInterface
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
	 * Set date of birth.
	 *
	 * @param DateTimeInterface $date_of_birth Date of birth.
	 */
	public function set_date_of_birth( DateTimeInterface $date_of_birth ) {
		$this->date_of_birth = $date_of_birth;
	}

	/**
	 * Set gender.
	 *
	 * @param string $gender Gender.
	 */
	public function set_gender( $gender ) {
		$this->gender = $gender;
	}

	/**
	 * Set initials.
	 *
	 * @param string $initials Initials.
	 */
	public function set_initials( $initials ) {
		$this->initials = $initials;
	}

	/**
	 * Set telephone number.
	 *
	 * @param string $telephone_number Telephone number.
	 */
	public function set_telephone_number( $telephone_number ) {
		$this->telephone_number = $telephone_number;
	}

	/**
	 * Get JSON.
	 *
	 * @return object|null
	 */
	public function get_json() {
		$object = (object) array();

		if ( null !== $this->email_address ) {
			$object->emailAddress = $this->email_address;
		}

		if ( null !== $this->date_of_birth ) {
			$object->dateOfBirth = $this->date_of_birth->format( 'd-m-Y' );
		}

		if ( null !== $this->gender ) {
			$object->gender = $this->gender;
		}

		if ( null !== $this->initials ) {
			$object->initials = $this->initials;
		}

		if ( null !== $this->telephone_number ) {
			$object->telephoneNumber = $this->telephone_number;
		}

		return (object) $data;
	}

	/**
	 * Get signature fields.
	 *
	 * @param array $fields Fields.
	 * @return array
	 */
	public function get_signature_fields( $fields = array() ) {
		$fields[] = $this->email_address;
		$fields[] = ( null === $this->date_of_birth ) ? null : $this->date_of_birth->format( 'd-m-Y' );
		$fields[] = $this->gender;
		$fields[] = $this->initials;
		$fields[] = $this->telephone_number;

		return $fields;
	}
}
