<?php
/**
 * Class ApiHelper
 *
 * @author Rafael Torres
 */
namespace AppBundle\Helper;
use GuzzleHttp\Client;

/**
 * Call 3rd party API's
 */
class ApiHelper
{
    /** @var boolean */
    private $status = false;

    /** @var boolean */
    private $data = [];

    /**
     * Call an api helper
     *
     * @param string $url
     * @param array $data
     * @return string
     */
    public function get($url, $data = [])
    {
        // get the list of servers from the third-party
        $client = new Client();
        $response = $client->get($url, [
            'exceptions' => false,
            'headers'    => [
                'Content-Type' => 'application/json',
            ],
        ]);

        if ($response->getStatusCode() != 200) {
            $this->setStatus(false);
        }

        $this->setStatus(true);
        $this->setData($response->getBody()->getContents());

        return $this;
    }

    /**
     * Set the response data
     *
     * @param array $response
     * @return $this
     */
    private function setData($response = [])
    {
        $this->data = json_decode($response, true);
    }

    /**
     * Get the response data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Check if the response is successful
     *
     * @return boolean
     */
    public function isSuccessful()
    {
        return $this->getStatus();
    }

    /**
     * Set the status of the request
     *
     * @param boolean $status
     */
    private function setStatus($status)
    {
        $this->status = $status;
    }

    /**
     * Get the status of the request
     *
     * @return boolean
     */
    private function getStatus()
    {
        return $this->status;
    }
}
