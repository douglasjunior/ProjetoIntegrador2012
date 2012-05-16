<?php
App::uses('Rnc', 'Model');

/**
 * Rnc Test Case
 *
 */
class RncTestCase extends CakeTestCase {
/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array('app.rnc');

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Rnc = ClassRegistry::init('Rnc');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Rnc);

		parent::tearDown();
	}

}
