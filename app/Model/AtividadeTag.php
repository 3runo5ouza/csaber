<?php
App::uses('AppModel', 'Model');


class AtividadeTag extends AppModel {

    //para mudar o padrao DogsTag
    public $useTable = 'atividades_tags';
    public $belongsTo = array('Atividade','Tag');
}