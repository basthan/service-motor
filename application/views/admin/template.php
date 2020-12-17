<!doctype html>
    <html>
        <head>
            <title>Aplikasi Service & SparePart | <?php echo $title;?></title>
            <link href="<?php echo base_url('assets/css/bootstrap.min.css');?>" rel="stylesheet">
            <link href="<?php echo base_url('assets/font-awesome/css/font-awesome.css');?>" rel="stylesheet">
            
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
        </body>
    </html>