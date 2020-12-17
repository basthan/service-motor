<!doctype html>
    <html>
        <head>
            <title>Aplikasi Service & SparePart | <?php echo $title;?></title>
            <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
        
        
            <script src="<?php echo base_url('assets/js/jquery-1.8.3.min.js');?>"></script>
            
        </head>
        <body>
            <?php echo $_header;?>
        
            
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <?php echo $_sidebar;?>
                    </div>
                
                    <div class="col-md-9">
                        <?php echo $_content;?>
                    </div>
                </div>
            </div>
       
        
        <!-- Core Scripts - Include with every page -->
        <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js');?>"></script>
        <script src="<?php echo base_url('assets/js/application.js');?>"></script>
        <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
        </body>
    </html>