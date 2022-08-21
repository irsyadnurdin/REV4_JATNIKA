<!DOCTYPE html>
<html>
    <head>
        <?= $this->include('layout/head') ?>
    </head>

    <body class="hold-transition skin-blue sidebar-mini"> 
        
        <div class="wrapper"> 
            <?= $this->include('layout/header') ?>
            <?= get_header('pendataan', $pengguna['nama_pengguna'], session()->get('deskripsi')) ?>

            <?= $this->include('pendataan/layout/navbar') ?>

            <?= $this->renderSection('content') ?>
            
            <?= $this->include('layout/footer') ?>
        </div>

        <?= $this->include('layout/js') ?>

        <?= $this->renderSection('javascript') ?>
      
    </body>
</html>