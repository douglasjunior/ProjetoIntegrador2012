<?php

App::uses('AppModel', 'Model');

/**
 * Rnc Model
 *
 */
class Rnc extends AppModel {

    /**
     * Use database config
     *
     * @var string
     */
    public $useDbConfig = 'defaultjsf';

    /**
     * Use table
     *
     * @var mixed False or table name
     */
    public $useTable = 'rnc';

    /**
     * hasMany associations
     *
     * @var array
     */
    public $hasMany = array(
        'Rrc' => array(
            'className' => 'Rrc',
            'foreignKey' => 'rnc_id',
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
