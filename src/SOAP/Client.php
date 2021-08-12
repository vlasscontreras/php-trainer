<?php

namespace Trainer\SOAP;

use Trainer\Executable;

class Client extends Executable
{
    /**
     * @inheritdoc
     */
    public const SIGNATURE = 'soap:client';

    /**
     * WebService URL
     *
     * A free web service for testing purposes.
     *
     * @link https://documenter.getpostman.com/view/8854915/Szf26WHn#intro
     *
     * @var string
     */
    public const URL = 'https://www.dataaccess.com/webservicesserver/NumberConversion.wso?WSDL';

    /**
     * @inheritdoc
     */
    public static function run(): void
    {
        $client = new \SoapClient(self::URL);

        // Array of all the SOAP service functions/methods.
        $methods = $client->__getFunctions();

        // Array of all the SOAP service types, including requests and responses.
        $types = $client->__getTypes();

        // Based on $methods and $types, we can build a request.
        $request = ['ubiNum' => $_SERVER['argv'][2] ?? 15665];

        // Make the call.
        $response = $client->NumberToWords($request); // Based on $methods, we know there's a NumberToWords().

        // Also works, but $request needs to be in an additional array.
        // $response = $client->__soapCall('NumberToWords', [$request]);

        echo $response->NumberToWordsResult; // Based on $types, we know there's a NumberToWordsResult property.
        echo PHP_EOL;
    }
}
