<?php

namespace App\Base;

class Object
{
    /**
     * Returns the value of an object property.
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing `$value = $object->property;`.
     *
     * @param string $name the property name
     *
     * @return mixed the property value
     * @see __set()
     */
    public function __get($name)
    {
        $getter = 'get' . $name;

        return $this->$getter();
    }

    /**
     * Sets value of an object property.
     *
     * Do not call this method directly as it is a PHP magic method that
     * will be implicitly called when executing `$object->property = $value;`.
     *
     * @param string $name the property name or the event name
     * @param mixed $value the property value
     *
     * @see __get()
     */
    public function __set($name, $value)
    {
        $setter = 'set' . $name;

        $this->$setter($value);
    }
}