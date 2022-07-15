<?php

namespace ZnDomain\Сomponents\EnumRepository\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * @see EnumValidator
 */
class Enum extends Constraint
{

    public $class;
    public $prefix;
    public $message = 'The value you selected is not a valid choice';
}
