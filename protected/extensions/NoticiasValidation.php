<?php
class NoticiasValidation extends CValidator
{
     public $valor;
     public function validateAttribute($object,$attribute)
    {
        if(!$object->$attribute)
        {
            return $this->addError($object,$attribute,"El campo <b>".$this->valor."</b> es requerido");
        }
    }
}