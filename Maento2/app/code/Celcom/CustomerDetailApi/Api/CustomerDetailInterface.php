<?php
namespace Celcom\CustomerDetailApi\Api;
/**
 * Interface CustomerDetailInterface
 * @package Celcom\CustomerDetailApi\Api
 */
interface CustomerDetailInterface
{
    /**
     * @param $id
     * @return mixed
     */
    public function customerDetail($id);
}
