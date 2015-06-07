<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
            <button aria-hidden="true" data-dismiss="modal" class="close" type="button">&times;</button>
            <h4 class="modal-title">添加新群组</h4>
        </div>
        
        <div class="modal-body">
          <form id="basicForm" action="form-validation.html" class="form-horizontal">
                <div class="form-group">
                  <label class="col-sm-1 control-label">Name <span class="asterisk">*</span></label>
                  <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" placeholder="Type your name..." required />
                  </div>
                </div>
                
                <div class="form-group">
                  <label class="col-sm-1 control-label">Email <span class="asterisk">*</span></label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="Type your email..." required />
                  </div>
                </div>

                <div class="form-group">
                  <label class="col-sm-1 control-label">Email <span class="asterisk">*</span></label>
                  <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" placeholder="Type your email..." required />
                  </div>
                </div>                
              </div><!-- panel-body -->
              
              <div class="panel-footer">
                <div class="row">
                  <div class="col-sm-9 col-sm-offset-3">
                    <button class="btn btn-primary">提交</button>
                     <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                  </div>
                </div>
              </div>
          </form>    
        
        </div>
    </div>
  </div>