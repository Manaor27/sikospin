<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master Data Pengajuan</title>
</head>
<body>
@extends('layouts.app')
@section('content')
<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="fas fa-user"></i> {{ Auth::user()->name }}
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-user mr-2"></i> Profile
          </a>
          <div class="dropdown-divider"></div>
          <a href="{{ route('logout') }}" class="dropdown-item">
            <i class="fas fa-power mr-2"></i> Logout
          </a>
        </div>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Master Data Pengajuan</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/home">Dashboard</a></li>
              <li class="breadcrumb-item">Master Data</li>
              <li class="breadcrumb-item active">Master Data Pengajuan</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
        <div class="col-12">
            <div class="card">
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No Pinjam</th>
                    <th>Tanggal Pinjam</th>
                    <th>Jumlah Pinjam</th>
                    <th>Jenis Pinjaman</th>
                    <th>Lama Angsur</th>
                    <th>Jumlah Angsuran</th>
                    <th>Status</th>
                    <th>Jatuh Tempo</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($angsur as $a)
                    <tr>
                      <td>{{ $a->angsur->no_pinjam }}</td>
                      <td>{{ $a->angsur->tgl_pengajuan }}</td>
                      <td>
                        <?php 
                          echo "Rp. " .number_format($a->angsur->jum_pinjaman, 0, '', '.');
                        ?>
                      </td>
                      <td>{{ $a->angsur->jenis->jenis_pinjaman }}</td>
                      <td>{{ $a->lama }} Bulan dari 12 Bulan</td>
                      <td>
                        <?php
                          if (date('Y-m-d') > $a->jatuh_tempo) {
                            $angsuran = $a->angsur->besar_angsuran + ($a->angsur->jum_pinjaman * (10/100));
                            echo "Rp. " .number_format($angsuran, 0, '', '.');
                          } else {
                            echo "Rp. " .number_format($a->angsur->besar_angsuran, 0, '', '.');
                          }
                        ?>
                      </td>
                      @if($a->lama == '12')
                      <td><span class="badge bg-success">Lunas</span></td>
                      @else
                      <td><span class="badge bg-danger">Belum Lunas</span></td>
                      @endif
                      <td>{{ $a->jatuh_tempo }}</td>
                      <td>
                        @if($a->lama <> '12')
                          <a href="angsur{{$a->id}}" class="btn btn-primary">ANGSUR</a>
                        @endif
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</body>
</html>