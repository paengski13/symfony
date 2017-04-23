<?php
/**
 * Class ServerController
 *
 * @author Rafael
 */

namespace AppBundle\Controller\Api;

use AppBundle\Helper\ApiHelper;
use AppBundle\Transformer\ServerTransformer;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * All related API server requests
 */
class ServerController extends Controller
{

    const SERVER_URL = 'https://services.mysublime.net/st4ts/data/get/type/servers/';
    const SERVER_STATISTIC_URL = 'https://services.mysublime.net/st4ts/data/get/type/iq/server/[SERVER]/';

    /**
     * @Route("/api/servers")
     * @Method("GET")
     */
    public function getList()
    {
        $helper = new ApiHelper();
        $helper->get(self::SERVER_URL);

        // check if the api is successful
        if ($helper->isSuccessful()) {
            $transform = new ServerTransformer();
            $data = $transform->transformData($helper->getData());
            return new Response(json_encode($data));
        }

        return new Response([]);
    }

    /**
     * @Route("/api/server/{serverName}")
     * @Method("GET")
     */
    public function getServer($serverName)
    {
        $helper = new ApiHelper();
        $helper->get(str_replace('[SERVER]', $serverName, self::SERVER_STATISTIC_URL));

        // check if the api is successful
        if ($helper->isSuccessful()) {
            $transform = new ServerTransformer();
            $data = $transform->transformData($helper->getData());

            return new Response(json_encode($data));
        }

        return new Response([]);
    }
}