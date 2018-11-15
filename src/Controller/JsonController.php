<?php

namespace Anax\Controller;

use Anax\Commons\ContainerInjectableInterface;
use Anax\Commons\ContainerInjectableTrait;

/**
 * A controller for flat file markdown content.
 */
class JsonController implements ContainerInjectableInterface
{
    use ContainerInjectableTrait;

    public function indexAction()
    {
        //$page = $this->di->get("page");
        $res = "";
        $adress = $this->di->get("request")->getGet("ipadress");
        $jsoninfo = [];

        if ($adress != "") {
            if (filter_var($adress, FILTER_VALIDATE_IP)) {
                $res = "$adress är en giltig IP adress";
            } else {
                $res = "$adress är inte en giltig IP adress";
            }
        }
        $jsoninfo = [
            "ip" => $adress,
            "valid" => $res
        ];

        return [$jsoninfo];
    }
}
