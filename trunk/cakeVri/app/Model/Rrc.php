<?php

App::uses('AppModel', 'Model');

/**
 * Rrc Model
 *
 * @property User $User
 */
class Rrc extends AppModel {

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'rrc';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
//		'dataCriacao' => array(
//			'notempty' => array(
//				'rule' => array('notempty'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//			'date' => array(
//				'rule' => array('date'),
//				//'message' => 'Your custom message here',
//				//'allowEmpty' => false,
//				//'required' => false,
//				//'last' => false, // Stop validation after this rule
//				//'on' => 'create', // Limit validation to 'create' or 'update' operations
//			),
//		),
        'descricao' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'setorOuEmpresa' => array(
            'notempty' => array(
                'rule' => array('notempty'),
            //'message' => 'Your custom message here',
            //'allowEmpty' => false,
            //'required' => false,
            //'last' => false, // Stop validation after this rule
            //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Rnc' => array(
            'className' => 'Rnc',
            'foreignKey' => 'rnc_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    public function ehDono($rrcId, $userId) {
        return $this->field('id', array('id' => $rrcId, 'user_id' => $userId)) === $rrcId;
    }

    public function ehDonoRNC($rncId, $userId) {
        return $this->field('id', array('rnc_id' => $rncId, 'user_id' => $userId)) === $rrcId;
    }

}
