<?php
    if (!isset($headerTitle)) {
        $headerTitle = "มหาวิทยาลัยเซนต์จอห์น หลักสูตรปริญญาตรี ปริญญาโท ปริญญาเอก";
    }
?>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?=(isset($headerTitle) ? $headerTitle : "")?></title>

        <META NAME="Description" CONTENT="ปริญญาตรี ปริญญาโท ปริญญาเอก การศึกษา  นานาชาติ ลาดพร้าว สถาบันการศึกษา เซนต์จอห์น University Commerce  International English Program MBA MA M.Ed">

        <META NAME="KeyWords" CONTENT="ปริญญาตรี ปริญญาโท ปริญญาเอก การศึกษา  นานาชาติ ลาดพร้าว สถาบันการศึกษา เซนต์จอห์น University Commerce International English Program MBA MA M.Ed">
        
        <link rel="stylesheet" type="text/css" href="<?=asset_url();?>css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="<?=asset_url();?>css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="<?=asset_url();?>css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" type="text/css" href="<?=asset_url();?>css/sweetalert.css">
        <link rel="stylesheet" type="text/css" href="<?=asset_url();?>css/components.css" />
        <link rel="stylesheet" type="text/css" href="<?=asset_url();?>css/custom.css">

        <script src="<?=asset_url();?>js/jquery.min.js"></script>
        <script src="<?=asset_url();?>js/bootstrap.min.js"></script>
        <script src="<?=asset_url();?>js/bootstrap-datepicker.min.js"></script>
        <script src="<?=asset_url();?>js/sweetalert.min.js"></script>
        <script src="<?=asset_url();?>locales/bootstrap-datepicker.th.min.js"></script>





         <style>
            @font-face {
                font-family: 'Slabo';
                font-style: normal;
                src: url('<?=asset_url();?>fonts/Slabo.ttf');
            }

            @font-face {
                font-family: 'Prompt';
                font-weight: bold;
                src: url('<?=asset_url();?>fonts/Prompt-Light.ttf');
            }

            body {
                font-family: 'Prompt', sans-serif !important;
                font-size: 1.8em;
            }

            h2, h3, h4 {
                font-family: 'Prompt', sans-serif !important;
            }
         </style>
    </head>
    <body>
        <?php
            $headerValues = array();
            if (isset($headerViewData)) {
                $headerValues = $headerViewData;
            }
            
            $this->load->view('templates/header', $headerValues); 
        ?>

        <div id="content" style="margin-bottom: 50px">
            <?php
            if (!isset($contentView) || !file_exists(APPPATH.'views/'.$contentView.'.php'))    {
                show_404();
            }

            $contentData = array();
            if (isset($contentViewData)) {
                $contentData = $contentViewData;
            }
            
            $this->load->view ($contentView, $contentData);
            ?>
        </div>
        <?php $this->load->view('templates/footer'); ?>
    </body>
</html>