<?php
/**
 * Interface TransformerInterface
 *
 * @author Rafael Torres
 */
namespace AppBundle\Transformer;

/**
 * Filter all out-going data
 */
interface TransformerInterface
{
    /**
     * This is a collection of data to be transformed
     *
     * @param array $items
     * @return array $data
     */
    public function transformData($items);

    /**
     * This is a single record of data to be transformed
     *
     * @param array $item
     * @return array
     */
    public function transform($item);
}