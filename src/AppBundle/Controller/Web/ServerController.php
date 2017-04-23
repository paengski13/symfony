<?php
/**
 * Class ServerController
 *
 * @author Rafael
 */

namespace AppBundle\Controller\Web;

use GuzzleHttp\Client;
use Sensio\Bundle\FrameworkExtraBundle\Templating;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

/**
 * All related web server requests
 */
class ServerController extends Controller
{
    /**
     * @Route("/servers")
     * @Method("GET")
     */
    public function index()
    {
        try {
            $templating = $this->container->get("templating");
            $html = $templating->render('server/index.html.twig', []);

            return new Response($html);
        } catch (\Exception $e) {
            var_dump($e->getMessage());
        }
    }
}