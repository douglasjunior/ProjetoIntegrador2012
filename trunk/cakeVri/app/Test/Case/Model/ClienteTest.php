<?php
App::uses('Cliente', 'Model');

/**
 * Cliente Test Case
 *
 */
class ClienteTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.cliente', 'app.rrc');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Cliente = ClassRegistry::init('Cliente');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Cliente);

		parent::tearDown();
	}

}
