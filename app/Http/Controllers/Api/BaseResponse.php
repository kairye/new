<?php

namespace App\Http\Controllers\Api;

use Response;
use Symfony\Component\HttpFoundation\Response as FoundationResponse;

trait BaseResponse
{
    /**
     * @var int
     */
    protected $success_code = FoundationResponse::HTTP_OK;

    /**
     * @var int
     */
    protected $error_code   = FoundationResponse::HTTP_BAD_REQUEST;

    /**
     * @param       $data
     * @param int $head_code
     *
     * @return mixed
     */
    public function respond($data=[], $head_code=200)
    {
        return \Response::json($data, $head_code)->setEncodingOptions(JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES);
    }

    /**
     * @param array $param
     * @return mixed
     */
    public function code($param=[])
    {
        $data['code'] = $param['code'] ?? 0;
        $data['msg']  = isset($param['msg']) ? $param['msg'] : "";
        $data['data'] = isset($param['data']) ? $param['data'] : null;

        return $this->respond($data);
    }

    public function appResponse($data = null)
    {
        return $this->code(['code'=>0,'msg'=>'成功','data'=>$data]);
    }

    public function appError($msg = null)
    {
        return $this->code(['code'=>4001,'msg'=>$msg]);
    }

}