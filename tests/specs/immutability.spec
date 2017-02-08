--DESCRIPTION--

Test immutability

--GIVEN--

immutable class MyImmutableClass
{
    // nothign to see here
}

--EXPECT--

class MyImmutableClass
{
    use \Pre\ImmutableClasses\ImmutableClassesTrait;
}
