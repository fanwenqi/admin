<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="<?php echo $template;?>/images/favicon.png" type="image/png">

  <title>WeChat Admin</title>

  <link href="<?php echo $template;?>/css/style.default.css" rel="stylesheet">

  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!--[if lt IE 9]>
  <script src="<?php echo $template;?>/js/html5shiv.js"></script>
  <script src="<?php echo $template;?>/js/respond.min.js"></script>
  <![endif]-->
</head>

<body class="signin">


<section>
  
    <div class="signinpanel">
        
        <div class="row">
            
            <div class="col-md-7">
                
                <div class="signin-info">
                    <div class="logopanel">
                        <h1><span>[</span>WeChat Admin<span>]</span></h1>
                    </div><!-- logopanel -->
                
                    <div class="mb20"></div>
                
                    <h5><strong>Welcome to Bracket Bootstrap 3 <?php echo $template;?>!</strong></h5>
                    <ul>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Fully Responsive Layout</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> HTML5/CSS3 Valid</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> Retina Ready</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> WYSIWYG CKEditor</li>
                        <li><i class="fa fa-arrow-circle-o-right mr5"></i> and much more...</li>
                    </ul>
                    <div class="mb20"></div>
                    <strong>Not a member? <a href="signup.html">Sign Up</a></strong>
                </div><!-- signin0-info -->
            
            </div><!-- col-sm-7 -->
            
            <div class="col-md-5">
                
                <?php echo form_open('signin/login');?>
                    <h4 class="nomargin">Sign In</h4>
                    <p class="mt5 mb20">Login to access your account.</p>
                
                    <input type="text" class="form-control uname" name="param[username]" placeholder="UserName" />
                    <input type="password" class="form-control pword" name="param[password]" placeholder="Password" />
                    <input type="hidden" class="form-control" name="param[token]" value="<?php echo $token;?>" />                    
                    <a href=""><small>Forgot Your Password?</small></a>
                    <button class="btn btn-success btn-block">Sign In</button>
				<?php echo form_close();?>
            </div><!-- col-sm-5 -->
            
        </div><!-- row -->
        
        <div class="signup-footer">
            <div class="pull-left">
                &copy; 2014. All Rights Reserved. Bracket Bootstrap 3 Admin <?php echo $template;?>
            </div>
            <div class="pull-right">
                Created By: <a href="http://themepixels.com/" target="_blank">ThemePixels</a>
            </div>
        </div>
        
    </div><!-- signin -->
  
</section>


<script src="<?php echo $template;?>/js/jquery-1.11.1.min.js"></script>
<script src="<?php echo $template;?>/js/jquery-migrate-1.2.1.min.js"></script>
<script src="<?php echo $template;?>/js/bootstrap.min.js"></script>
<script src="<?php echo $template;?>/js/modernizr.min.js"></script>
<script src="<?php echo $template;?>/js/jquery.sparkline.min.js"></script>
<script src="<?php echo $template;?>/js/jquery.cookies.js"></script>

<script src="<?php echo $template;?>/js/toggles.min.js"></script>
<script src="<?php echo $template;?>/js/retina.min.js"></script>

<script src="<?php echo $template;?>/js/custom.js"></script>
<script>
    jQuery(document).ready(function(){
        
        // Please do not use the code below
        // This is for demo purposes only
        var c = jQuery.cookie('change-skin');
        if (c && c == 'greyjoy') {
            jQuery('.btn-success').addClass('btn-orange').removeClass('btn-success');
        } else if(c && c == 'dodgerblue') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        } else if (c && c == 'katniss') {
            jQuery('.btn-success').addClass('btn-primary').removeClass('btn-success');
        }
    });
</script>

</body>
</html>