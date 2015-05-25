<?php include VIEWPATH.'public/header.php'?>

<section>
  
  <?php include VIEWPATH.'public/left.php'?>
  
  <div class="mainpanel">
    
	<?php include VIEWPATH.'public/main_head.php'?>
    
    <div class="contentpanel">
     
      <div class="row">
        
        <div class="col-sm-12">
          
          <div class="table-responsive">
            <table class="table table-success mb30">
            <thead>
              <tr>
                <th>会员名称</th>
                <th>群组名称</th>
                <th>公众号</th>
                <th>所属公司</th>
                <th>注册时间</th>
                <th>操作</th>
              </tr>
            </thead>
            <tbody>
             <?php foreach ($list as $arr) {?>
              <tr>
                <td><a><?php echo $arr['username']?><a/></td>
                <td><?php echo $arr['gid']?></td>
                <td><?php echo $arr['wechat']?></td>
                <td><a><?php echo $arr['company']?></a></td>
                <td><a><?php echo $arr['timestamp']?></a></td>
                <td><a>切换</a></td>
              </tr>
            <?php } ?>            
            </tbody>
          </table>
          </div><!-- table-responsive -->
          
          <?php include VIEWPATH.'public/page.php'?>
          
        </div><!-- col-sm-12 -->

      </div><!-- row -->      
    </div><!-- contentpanel -->
    
  </div><!-- mainpanel -->

  
  
</section>


<?php include VIEWPATH.'public/footer.php'?>