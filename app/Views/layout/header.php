<?php

    function get_header($key, $nama, $jabatan) {
        
        echo '
            <header class="main-header">
                <a href="' . base_url($key) . '" class="logo" data-toggle="push-menu">
                    <span class="logo-lg">
                        <b>INVENTARIS</b>
                    </span>
                </a>

                <nav class="navbar navbar-static-top">
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="' . base_url('_img/icon/thumbnail.png') . '" class="user-image" alt="User Image">
                                    <span class="hidden-xs">
                                        ' . $nama . '
                                    </span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-header">
                                        <img src="' . base_url('_img/icon/thumbnail.png') . '" class="img-circle" alt="User Image">

                                        <p>
                                            ' . $nama . '
                                            <small>' . $jabatan . '</small>
                                        </p>
                                    </li>
                                    
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="' . base_url($key.'/profile') . '" class="btn btn-default btn-flat">Profile</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="' . base_url($key.'/logout') . '" class="btn btn-default btn-flat">Sign out</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </div>
                </nav>
            </header>
        ';

    }
    
?>