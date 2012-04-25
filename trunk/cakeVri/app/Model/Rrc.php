<?php
App::uses('AppModel', 'Model');
/**
 * Rrc Model
 *
 * @property Cliente $Cliente
 */
class Rrc extends AppModel {
/**
 * Use table
 *
 * @var mixed False or table name
 */
	public $useTable = 'rrc';
/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'id';

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Cliente' => array(
			'className' => 'Cliente',
			'foreignKey' => 'cliente_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
