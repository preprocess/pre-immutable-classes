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
        if ($result·1 = $this->handleCallImmutableClassSetters($method, $parameters)) {
            return $result·1;
        }

        print "fallback";
    }
}
