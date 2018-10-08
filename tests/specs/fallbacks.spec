immutable class MyImmutableClass
{
    public function __call($method, $parameters)
    {
        immutability;

        print "fallback";
    }
}

~~~

class MyImmutableClass
{
    use \Pre\ImmutableClasses\ImmutableClassesTrait;

    public function __call($method, $parameters)
    {
        if (
            ($result = $this->handleCallImmutableClassSetters(
                $method,
                $parameters
            ))
        ) {
            return $result;
        }

        print "fallback";
    }
}
