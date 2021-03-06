<?php
namespace Admin\Model;
use Think\Model;

class MenuModel extends Model{
	protected $insertFields = array('path','pid','app','module','controller','action','data','status','type','name','icon','remark','listorder');
	protected $updateFields = array('path','pid','app','module','controller','action','data','status','type','name','icon','remark','listorder');

	protected $_validate = array(	//自动验证
			array('app','require','请填写应用名称!',self::MUST_VALIDATE),
			array('module','require','请填写模块名称!',self::MUST_VALIDATE),
			array('controller','require','请填写控制器名称!',self::MUST_VALIDATE),
			array('action','require','请填写方法名称!',self::MUST_VALIDATE),
			array('name','require','请填写菜单名称!',self::MUST_VALIDATE),
			array('listorder','number','请填写数字',self::VALUE_VALIDATE),
			array('data','/(^\?.*)|(^\/.*)/','格式不正确',self::VALUE_VALIDATE,'regex'),
		);	
	protected $patchValidate = true;	//开启批量验证
	protected $_auto = array(
				array('module','strtolower',3,'function'),
				array('module','ucfirst',3,'function'),
				array('controller','strtolower',3,'function'),
				array('controller','ucfirst',3,'function'),
				array('listorder','intval',3,'function')
		);

}
	