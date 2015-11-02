<?php

namespace Apiship\Entity;

use ReflectionClass;
use ReflectionProperty;

trait AsArrayBehavior
{
    /**
     * @return array - массив свойств объекта
     */
    public function asArray()
    {
        $reflectionClass = new ReflectionClass($this);
        $array = [];
        foreach ($reflectionClass->getProperties(
            ReflectionProperty::IS_PUBLIC | ReflectionProperty::IS_PROTECTED
        ) as $property) {
            $property->setAccessible(true);
            if ($property->isStatic()) {
                continue;
            }
            // аналог для поля fieldName: $array["fieldName"] = $this->getFieldName();
            $value = $this->{$property->getName()};
            if(!is_null($value)){
                $array[$property->getName()] = $value;
            }
            $property->setAccessible(false);
        }

        return $array;
    }
}