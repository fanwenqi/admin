<?php include VIEWPATH.'public/header.php'?>
<?php include VIEWPATH.'public/dialog.php'?>

<section>
  
  <?php include VIEWPATH.'public/left.php'?>
  
  <div class="mainpanel">
    
	<?php include VIEWPATH.'public/main_head.php'?>
    
    <div class="contentpanel">
     
      <div class="row">
     
        <div class="panel-heading">
          <div class="panel-btns">
            <a href="" class="panel-close">&times;</a>
            <a href="" class="minimize">&minus;</a>
          </div><!-- panel-btns -->
          <h3 class="panel-title">Data Tables</h3>
          <p>DataTables is a plug-in for the jQuery Javascript library. It is a highly flexible tool, based upon the foundations of progressive enhancement, which will add advanced interaction controls to any HTML table.</p>
        </div>
        
        <div class="col-sm-12">
         <div class="table-responsive">
            <table class="table table-success mb30">
            <thead>
              <tr>
              	<th>gid</th>
                <th>群组名称</th>
                <th>状态</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
             <?php foreach ($list as $arr) {?>
              <tr>
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
          
        </div><!-- col-sm-12 -->

      </div><!-- row -->      
    </div><!-- contentpanel -->
    
  </div><!-- mainpanel -->
 
</section>

<?php include VIEWPATH.'public/footer.php'?>