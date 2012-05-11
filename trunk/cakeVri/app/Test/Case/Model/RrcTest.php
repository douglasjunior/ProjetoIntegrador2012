<?php
App::uses('Rrc', 'Model');

/**
 * Rrc Test Case
 *
 */
class RrcTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.rrc', 'app.user');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Rrc = ClassRegistry::init('Rrc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rrc);

		parent::tearDown();
	}

}
