<?php
/**
 * Statuses test
 *
 * @author    Pronamic <info@pronamic.eu>
 * @copyright 2005-2019 Pronamic
 * @license   GPL-3.0-or-later
 * @package   Pronamic\WordPress\Pay\Gateways\OmniKassa2
 */

namespace Pronamic\WordPress\Pay\Gateways\OmniKassa2;

/**
 * Statuses test
 *
 * @author  Remco Tolsma
 * @version 2.0.2
 * @since   2.0.2
 */
class StatusesTest extends \PHPUnit_Framework_TestCase {
	/**
	 * Test transform.
	 *
	 * @param string $omnikassa_2_status OmniKassa 2.0 status string.
	 * @param string $expected           Expected Pronamic Pay status string.
	 *
	 * @dataProvider status_matrix_provider
	 */
	public function test_transform( $omnikassa_2_status, $expected ) {
		$pronamic_pay_status = Statuses::transform( $omnikassa_2_status );

		$this->assertEquals( $expected, $pronamic_pay_status );
	}

	/**
	 * Status matrix provider.
	 *
	 * @return array
	 */
	public function status_matrix_provider() {
		return array(
			array( Statuses::CANCELLED, \Pronamic\WordPress\Pay\Core\Statuses::CANCELLED ),
			array( Statuses::COMPLETED, \Pronamic\WordPress\Pay\Core\Statuses::SUCCESS ),
			array( Statuses::EXPIRED, \Pronamic\WordPress\Pay\Core\Statuses::EXPIRED ),
			array( Statuses::IN_PROGRESS, \Pronamic\WordPress\Pay\Core\Statuses::OPEN ),
			array( 'not existing status', null ),
		);
	}
}
