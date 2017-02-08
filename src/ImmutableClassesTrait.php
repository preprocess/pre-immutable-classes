<?php

namespace Pre\ImmutableClasses;

use InvalidArgumentException;

trait ImmutableClassesTrait
{
    /**
     * @inheritdoc
     *
     * @param string $method
     * @param array $parameters
     */
    public function __call($method, $parameters)
    {
        return $this->handleCallImmutableClassSetters($method, $parameters);
    }

    /**
     * Handles calls to withProperty($value) methods.
     *
     * @param string $method
     * @param array $parameters
     *
     * @return static
     */
    protected function handleCallImmutableClassSetters($method, $parameters)
    {
        if (stripos($method, "with") === 0) {
            if (count($parameters) < 1) {
                throw new InvalidArgumentException("{$method} expects a parameter, none given");
            }

            $property = $this->camel(substr($method, 4));

            if (property_exists($this, $property)) {
                return $this->cloneWith($property, $parameters[0]);
            }

            throw new InvalidArgumentException("{$property} property does not exist");
        }
    }

    /**
     * Replaces "ThisFormat" with "thisFormat".
     *
     * @return string
     */
    private function camel($string)
    {
        return strtolower($string[0]) . substr($string, 1);
    }

    /**
     * Returns a clone of this object, with the specified property changes to a new value.
     *
     * @param string $property
     * @param mixed $value
     */
    protected function cloneWith($property, $value)
    {
        $clone = clone $this;
        $clone->$property = $value;

        return $clone;
    }
}
