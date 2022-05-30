<?php

namespace Apiship\Entity;

use RuntimeException;

trait MagicMethodsBehavior
{
    public function __get($name)
    {
        $getter = 'get' . $name;

        $extraGetter = 'get' . implode(
                '',
                array_map(static function ($piece) {
                    return ucfirst($piece);
                }, explode("_", $name))
            );

        if (method_exists($this, $getter)) {
            return $this->$getter();
        }

        if (method_exists($this, $extraGetter)) {
            return $this->$extraGetter();
        }

        throw new RuntimeException('Property "' . get_class($this) . '.' . $name . '" is not defined.');
    }

    /**
     * @throws RuntimeException
     */
    public function __set($name, $value)
    {
        $setter = 'set' . $name;

        $extraSetter = 'set' . implode(
                '',
                array_map(static function ($piece) {
                    return ucfirst($piece);
                }, explode("_", $name))
            );
        if (method_exists($this, $setter)) {
            return $this->$setter($value);
        }

        if (method_exists($this, $extraSetter)) {
            return $this->$extraSetter($value);
        }

        throw new RuntimeException('Property "' . get_class($this) . '.' . $name . '" is not defined.');
    }

    public function __isset($name)
    {
        $getter = 'get' . $name;

        $extraGetter = 'get' . implode(
                '',
                array_map(static function ($piece) {
                    return ucfirst($piece);
                }, explode("_", $name))
            );

        if (method_exists($this, $getter)) {
            return $this->$getter() !== null;
        }

        if (method_exists($this, $extraGetter)) {
            return $this->$extraGetter() !== null;
        }

        return false;
    }
}