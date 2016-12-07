<?php

class ClassWithPrivateData
{
    /**
     * @var string private field for testing
     */
    private $secret = 'SECRET2345';
    /**
     * @var string private static field for testing
     */
    private static $staticSecret = 'STATICSECRET123';

    /**
     * private method for testing
     *
     * @param $arg1
     * @param $arg2
     * @return string
     * @internal param $whatever
     */
    private function doSomethingSecret($arg1, $arg2)
    {
        return $arg1 . '!' . $arg2;
    }

    /**
     * private method for testing - no arguments
     *
     * @return string
     */
    private function doSomethingElseSecret()
    {
        return $this->secret;
    }

    private static function doStaticSecret($arg)
    {
        return self::$staticSecret . $arg;
    }

    /**
     * some public method to avoid IDE warnings
     *
     * @return string
     */
    public function reveal()
    {
        return $this->doSomethingSecret(self::doStaticSecret(''), $this->doSomethingElseSecret());
    }
}
