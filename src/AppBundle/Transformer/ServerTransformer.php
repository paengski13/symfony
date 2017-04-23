<?php
/**
 * Class ServerTransformer
 *
 * @author Rafael Torres
 */
namespace AppBundle\Transformer;
use AppBundle\Helper\DateTimeHelper;
use Symfony\Component\Validator\Constraints\DateTime;

/**
 * Filter all out-going data
 */
class ServerTransformer implements TransformerInterface
{
    /**
     * {@inheritDoc}
     */
    public function transformData($items)
    {
        $data = [];

        // iterate all records
        foreach ($items as $item) {
            $data[] = $this->transform($item);
        }

        return $data;
    }

    /**
     * {@inheritDoc}
     */
    public function transform($item)
    {
        $data = [];
        $data['server'] = isset($item['s_system']) ? $item['s_system'] : null;
        $data['label']  = '';
        $data['value']  = isset($item['data_value']) ? $item['data_value'] : null;

        return $data;
    }
}