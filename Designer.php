<?php

class Designer extends Employee
{
    const GRAPHIC = "gráfico";
    const WEB = "web";
    const TYPES = [ self::WEB, self::GRAPHIC ];

    private $type;

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
        return "";
    }
}
