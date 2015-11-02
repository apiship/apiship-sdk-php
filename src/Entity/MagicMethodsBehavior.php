<?php

namespace Apiship\Entity;

trait MagicMethodsBehavior
{
    public function __set($name, $value)
    {
        $setter = 'set' . $name;

        $extraSetter = 'set' . join('', array_map(function ($piece) {
                return ucfirst($piece);
            }, explode("_", $name)));
        if (method_exists($this, $setter))
            return $this->$setter($value);
        elseif (method_exists($this, $extraSetter))
            return $this->$extraSetter($value);

        throw new \Exception('Property "' . get_class($this) . '.' . $name . '" is not defined.');
    }

    public function __get($name)
    {
        $getter = 'get' . $name;

        $extraGetter = 'get' . join('', array_map(function ($piece) {
            return ucfirst($piece);
        }, explode("_", $name)));

        if (method_exists($this, $getter))
            return $this->$getter();
        elseif (method_exists($this, $extraGetter))
            return $this->$extraGetter();

        throw new \Exception('Property "' . get_class($this) . '.' . $name . '" is not defined.');
    }
}