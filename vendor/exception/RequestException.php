<?php
/**
 * Created by PhpStorm.
 * User: sqtech
 * Date: 2018/11/16
 * Time: 11:29 AM
 */
namespace vendor\exception;

use Throwable;
use vendor\base\BaseException;

/**
 * 请求异常处理
 * Class RequestException
 * @package vendor\exception
 */
class RequestException extends BaseException {

    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }

}