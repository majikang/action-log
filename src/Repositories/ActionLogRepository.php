<?php
namespace majikang\ActionLog\Repositories;

use majikang\ActionLog\Services\clientService;
class ActionLogRepository {


    /**
     * 记录用户操作日志
     * @param $type
     * @param $content
     * @param ActionLog $actionLog
     * @return bool
     */
    public function createActionLog($type,$content)
    {
    	$actionLog = new \majikang\ActionLog\Models\ActionLog();
    	if(auth()->check()){
    		$actionLog->uid = auth()->user()->id;
    		$actionLog->username = auth()->user()->name;
    	}else{
    		$actionLog->uid=0;
    		$actionLog->username ="访客";
    	}
         //请求操作类型
        $actionLog->type = $type;
       	//系统版本
        $actionLog->system = clientService::getPlatForm($_SERVER['HTTP_USER_AGENT'],true);
        //请求的ip
        $actionLog->ip = request()->getClientIp();

        $actionLog->ip = request()->getClientIp();
        //请求的ip
        $region=clientService::getRegionFromIp(request()->getClientIp());
        $actionLog->country = $region['country'] ? $region['country'] : '';
        $actionLog->province = $region['province'] ? $region['province'] : '';
        $actionLog->city = $region['city'] ? $region['city'] : '';
        //请求url
        $actionLog->url = request()->getRequestUri();
        //请求内容
        $actionLog->content = $content;
        $res = $actionLog->save();

        return $res;
    }

    /**
     * 接口请求记录日志
     * @param $type
     * @param $content
     * @param ActionLog $actionLog
     * @return bool
     */
    public function apiLog($type,$content,$result)
    {
        $actionLog = new \majikang\ActionLog\Models\ActionLog();
        if(auth()->check()){
            $actionLog->uid = auth()->user()->id;
            $actionLog->username = auth()->user()->name;
        }else{
            $actionLog->uid=0;
            $actionLog->username ="访客";
        }

         //请求操作类型
        $actionLog->type = $type;
        //系统版本
        $actionLog->system = clientService::getPlatForm($_SERVER['HTTP_USER_AGENT'],true);
        //请求的ip
        $actionLog->ip = request()->getClientIp();
        //请求的ip
        $region=clientService::getRegionFromIp(request()->getClientIp());
        $actionLog->country = $region['country'] ? $region['country'] : '';
        $actionLog->province = $region['province'] ? $region['province'] : '';
        $actionLog->city = $region['city'] ? $region['city'] : '';
        //请求url
        $actionLog->url = request()->getRequestUri();
        //请求内容
        $actionLog->content = $content;

        //终端型号
        $actionLog->TermType = request()->TermType;
        //终端版本号
        $actionLog->TermVer = request()->TermVer;
        //IMEI号
        $actionLog->TermIMEI = request()->TermIMEI;
        //终端ID号
        $actionLog->TermID = request()->TermID;

        //请求结果
        $actionLog->result = $result;
        $res = $actionLog->save();

        return $res;
    }
}