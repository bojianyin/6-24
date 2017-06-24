<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends Action {
	/**
	 * index模板渲染
	 * @return [type] [description]
	 */
    public function index(){
		//dump(THINK_VERSION);
		$data=M("xuyuan")->order("id desc")->select();
		$this->assign("forlist",$data)->display('Index/Index');
    }
    /**
     * ajax提交地址
     * @return [type] [description]
     */
    Public function handle(){
    	if(!IS_AJAX) halt("404 NOT_found!");
    	$data=array(
    		"title"=>I("title")
    		,"content"=>I("content")
    		,"time"=>time()
    	);
    	if($id=M("xuyuan")->data($data)->add()){
    		$data['id']=$id;
    		$data['content']=faceFilter($data["content"]);
    		$data["time"]=date("Y-m-d H:i:s",$data["time"]);
    		$this->ajaxReturn($data,"success",1);
    	}else{
    		$this->ajaxReturn(array("status"=>"0"),'json');
    	}
    }
}