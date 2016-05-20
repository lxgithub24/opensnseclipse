<?php
/**
 * Created by PhpStorm.
 * User: Alan
 * Date: 14-3-19
 * Time: 下午2:19
 */
namespace Addons\Support\Controller;

use Home\Controller\AddonsController;

class SupportController extends AddonsController
{


    /*
     *签到
     */

    public function doSupport()
    {
        if (!is_login()) {
            exit(json_encode(array('status' => 0, 'info' => '请登陆后再点赞。')));
        }
        $appname = I('POST.appname');
        $table = I('POST.table');
        $row = I('POST.row');
        $aJump = I('POST.jump');

        $message_uid = intval(I('POST.uid'));
        $support['appname'] = $appname;
        $support['table'] = $table;
        $support['row'] = $row;
        $support['uid'] = is_login();
        
        
//         $support['row'] = 260;
//         $support['uid'] = 100;
        

        if (D('Support')->where($support)->count()) {

            exit(json_encode(array('status' => 0, 'info' => '您已经赞过，不能再赞了。')));
        } else {
            $support['create_time'] = time();
            if (D('Support')->where($support)->add($support)) {

                $this->clearCache($support);

                $user = query_user(array('nickname'),get_uid());

                D('Message')->sendMessage($message_uid,$title = $user['nickname'] . '赞了您。', $user['nickname'] . '给您点了个赞。',  $aJump , array('id' => $row));
                exit(json_encode(array('status' => 1, 'info' => '感谢您的支持。')));
            } else {
                exit(json_encode(array('status' => 0, 'info' => '写入数据库失败。')));
            }

        }
    }

    
    /*
     *签到
     */
    
    public function doSupport1()
    {
    	if (!is_login()) {
    		exit(json_encode(array('status' => 0, 'info' => '请登陆后再点赞。')));
    	}
    	$appname = I('POST.appname');
    	$table = I('POST.table');
    	$row = I('POST.row');
    	$aJump = I('POST.jump');
    
    	$message_uid = intval(I('POST.uid'));
    	$support['appname'] = $appname;
    	$support['table'] = $table;
    	//         $support['row'] = $row;
    	//         $support['uid'] = is_login();
    	
    	$support['row'] = array(262);
    	$support['uid'] = array(100);
    	$supportRow = array(268,269,270,269,270,271);
    	$supportUid = array(1,1,1,103,104,105);
    	
    	for($i = 0 ; $i < 3 ; $i++ ){
    		$support['row'] = $supportRow[$i];
    		$support['uid'] = $supportUid[$i];
    		D('Support')->where($support)->add($support);
//     	if (D('Support')->where($support)->count()) {
    
//     		exit(json_encode(array('status' => 0, 'info' => '您已经赞过，不能再赞了。')));
//     	} else {
//     		$support['create_time'] = time();
//     		if (D('Support')->where($support)->add($support)) {
    
//     			$this->clearCache($support);
    
//     			$user = query_user(array('nickname'),get_uid());
    
//     			D('Message')->sendMessage($message_uid,$title = $user['nickname'] . '赞了您。', $user['nickname'] . '给您点了个赞。',  $aJump , array('id' => $row));
//     			exit(json_encode(array('status' => 1, 'info' => '感谢您的支持。')));
//     		} else {
//     			exit(json_encode(array('status' => 0, 'info' => '写入数据库失败。')));
//     		}
    
//     	}
    	}
    	$this->clearCache($support);
    	
    	$user = query_user(array('nickname'),get_uid());
    	
    	D('Message')->sendMessage($message_uid,$title = $user['nickname'] . '赞了您。', $user['nickname'] . '给您点了个赞。',  $aJump , array('id' => $row));
    	exit(json_encode(array('status' => 1, 'info' => '感谢您的支持。')));
    }
    
    
    
    /**
     * @param $support
     * @auth 陈一枭
     */
    private function clearCache($support)
    {
        D('Support')->clearCache($support['appname'], $support['table'], $support['row']);
    }
}

