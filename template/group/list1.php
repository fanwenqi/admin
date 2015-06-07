<?php include VIEWPATH.'public/header.php'?>
<?php include VIEWPATH.'public/dialog.php'?>

<section>
  
  <?php include VIEWPATH.'public/left.php'?>
  
  <div class="mainpanel">
    
	<?php include VIEWPATH.'public/main_head.php'?>
    
    <div class="contentpanel">     
  	   <div class="panel panel-default">
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">群组管理</h3>
          <p><a class="btn btn-white" id="add-dialog" data-toggle="modal" data-target=".bs-example-modal-lg" >添加新群组</a></p>
        </div>
        
        <div class="panel-body">
          <div class="table-responsive">
            <table class="table" id="table1">
              <thead>
                 <tr>
	              	<th>群组ID</th>
	                <th>群组名称</th>
	                <th>状态</th>
	                <th>操作</th>
                 </tr>
              </thead>
              <tbody>
	           <?php foreach ($list as $arr) {?>
	              <tr class="odd gradeX">
	               <td width="20%"><?=$arr['gid']?></td>
	                <td width="30%"><?=$arr['groupname']?></td>
	                <td width="20%"><?=get_status($arr['status'])?></td>
	                <td>
	                	<a href="<?=site_url("group/update/{$arr['gid']}")?>">修改</a>
	                	<a href="<?=site_url("group/delete/{$arr['gid']}")?>">删除</a>
	                	<a href="<?=site_url("group/check/{$arr['gid']}")?>">审核</a>
	                </td>
	              </tr>
	            <?php } ?>  
              </tbody>
           </table>
          </div><!-- table-responsive -->
          <?php echo $page;?>
        </div><!-- panel-body -->
      </div><!-- panel -->
    </div><!-- contentpanel -->
    
  </div><!-- mainpanel -->
 
</section>

<?php include VIEWPATH.'public/footer.php'?>