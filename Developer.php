<?php

class Developer extends Employee
{
    const PHP = "PHP";
    const NET = ".Net";
    const PYTHON = "Python";
    const LANGUAGES = [self::PHP, self::NET, self::PYTHON];

    private $language;

    public function __construct($name, $surname, $age, $lang)
    {
        if (!in_array($lang, self::LANGUAGES)) {
            throw new Exception("Error! The 'language' received is invalid.");
        }
        $this->language = $lang;
        parent::__construct($name, $surname, $age);
    }

    /**
     * @return string The developer data
     */
    public function __toString() {
        return "";
    }
    
}
