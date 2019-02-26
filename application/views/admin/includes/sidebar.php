
<div class="page-sidebar-wrapper">
                    <!-- BEGIN SIDEBAR -->
                    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                    <div class="page-sidebar navbar-collapse collapse">
                        <!-- BEGIN SIDEBAR MENU -->
                        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
                        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
                        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
                        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
                        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
                        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
                        <ul class="page-sidebar-menu  page-header-fixed " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                            <li class="nav-item start">
                                <a href="<?php base_url('admin/')?>" class="nav-link nav-toggle">
                                    <i class="icon-home"></i>
                                    <span class="title">Dashboard</span>
                                </a>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Perjalanan</h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="#" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Data Perjalanan</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?= base_url('admin/data_paket')?>" class="nav-link ">
                                            <span class="title">Lihat Perjalanan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?= base_url('admin/tambah_paket')?>" class="nav-link ">
                                            <span class="title">Tambah Perjalanan</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="heading">
                                <h3 class="uppercase">Pemesanan</h3>
                            </li>
                            <li class="nav-item  ">
                                <a href="javascript:;" class="nav-link nav-toggle">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Data Pemesanan</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub-menu">
                                    <li class="nav-item  ">
                                        <a href="<?= base_url('admin/data_pemesanan')?>" class="nav-link ">
                                            <span class="title">Data Pemesanan</span>
                                        </a>
                                    </li>
                                    <li class="nav-item  ">
                                        <a href="<?= base_url('admin/history_pembayaran')?>" class="nav-link ">
                                            <span class="title">Data Pembayaran</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/data_gallery') ?>">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Data Gallery</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/data_testimonial') ?>">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Data Testimoni</span>
                                </a>
                            </li>


                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/laporan') ?>">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Data Laporan</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/user') ?>">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Data User</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/about') ?>">
                                    <i class="icon-diamond"></i>
                                    <span class="title">About</span>
                                </a>
                            </li>
                            <li class="nav-item  ">
                                <a href="<?= base_url('admin/norek') ?>">
                                    <i class="icon-diamond"></i>
                                    <span class="title">Ubah No Rekening</span>
                                </a>
                            </li>
                        </ul>
                        <!-- END SIDEBAR MENU -->
                    </div>
                    <!-- END SIDEBAR -->
                </div>
                <div class="page-fixed-main-content">