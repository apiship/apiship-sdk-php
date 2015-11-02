<?php

namespace Apiship\Entity;

trait JsonRequest
{
    use AsArrayBehavior;
    use MagicMethodsBehavior;

    /**
     * @return string
     */
    public function asJson()
    {
        $result = $this->asArrayRecursive();

        return json_encode($result, JSON_UNESCAPED_UNICODE);
    }

    /**
     * @return string
     */
    public function asArrayRecursive()
    {
        $asArray = $this->asArray();
        foreach ($asArray as $key => $value) {
            if (is_object($value)) {
                $asArray[$key] = method_exists($value, 'asArrayRecursive') ? $value->asArrayRecursive() : (array)$value;
            }

            if (is_array($value)) {
                foreach ($value as $sub_key => $sub_value){
                    $value[$sub_key] = method_exists($sub_value, 'asArrayRecursive') ? $sub_value->asArrayRecursive() : $sub_value;
                }
                $asArray[$key] = $value;
            }

            if (!isset($value))
                unset($asArray[$key]);
        }

        return $asArray;
    }
}