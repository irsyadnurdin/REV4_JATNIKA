<!DOCTYPE html>
<html>
    <head>
        <?= $this->include('layout/head') ?>
    </head>

    <body class="hold-transition skin-blue sidebar-mini"> 
        
        <div class="wrapper"> 
            <?= $this->include('layout/header') ?>
            <?= get_header('pengecekan', $pengguna['nama_pengguna'], session()->get('deskripsi')) ?>

            <?= $this->include('pengecekan/layout/navbar') ?>

            <?= $this->renderSection('content') ?>
            
            <?= $this->include('layout/footer') ?>
        </div>

        <?= $this->include('layout/js') ?>

        <?= $this->renderSection('javascript') ?>
      
    </body>
</html>