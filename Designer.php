<?php

namespace Excercise;
use Exception;

class Designer extends Employee
{
    const GRAPHIC = "gráfico";
    const WEB = "web";
    const TYPES = [ self::WEB, self::GRAPHIC ];

    protected $type;

    public function __construct($name, $surname, $age, $type)
    {
        if (!in_array($type, self::TYPES)) {
            throw new Exception("Error! The 'type' received is invalid.");
        }
        $this->type = $type;
        parent::__construct($name, $surname, $age);
    }

    /**
     * @return string The designer data
     */
    public function __toString() {
        return __CLASS__ . " #$this->id: $this->surname, $this->name ($this->age) - $this->type";
    }
}
