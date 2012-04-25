<?php
App::uses('AppModel', 'Model');
/**
 * Cliente Model
 *
 * @property Rrc $Rrc
 */
class Cliente extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'cliente';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Rrc' => array(
			'className' => 'Rrc',
			'foreignKey' => 'cliente_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
