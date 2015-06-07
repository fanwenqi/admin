{
	"button": [
	{
		"type": "click",
		"name": "验证记录",
		"key": "总结",
		"sub_button": [ ]
	},
	{
		"type": "scancode_waitmsg",
		"name": "防伪查询",
		"key": "5",
		"sub_button": [ ]
	},

   {
            "name": "发图", 
            "sub_button": [
            
            			{
				"type":"view",
				"name":"跳转",
				"url":"http://admin.10acs.com/"
			},
			            			{
				"type":"view",
				"name":"跳转1",
				"url":"http://test.10acs.com/wxapi.php/welcome/show"
			},
                {
                    "type": "pic_sysphoto", 
                    "name": "系统拍照发图", 
                    "key": "rselfmenu_1_0", 
                   "sub_button": [ ]
                 }, 
                {
                    "type": "pic_photo_or_album", 
                    "name": "拍照或者相册发图", 
                    "key": "rselfmenu_1_1", 
                    "sub_button": [ ]
                }, 
                {
                    "type": "pic_weixin", 
                    "name": "微信相册发图", 
                    "key": "rselfmenu_1_2", 
                    "sub_button": [ ]
                }
            ]
        }, 	
	
	]
}