@extends('layouts.main')
@section('content')


    <!-- Main content -->
    
    <section class="content">
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3>10</h3>

              <p>Post</p>
            </div>
            <div class="icon">
              <i class="fa fa-list"></i>
            </div>

            <a href="/post" class="small-box-footer">Quản lý Post<i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3>10</h3>

              <p>Tổng số sản phẩm</p>
            </div>
            <div class="icon">
              <i class="fa fa-cubes"></i>
            </div>
            <a href="{{route('home')}}" class="small-box-footer">Quản lý sản phẩm <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3>4</h3>

              <p>Danh mục</p>
            </div>
            <div class="icon">
              <i class="fa fa-mail-forward"></i>
            </div>
            <a href="/cate" class="small-box-footer">Danh sách danh mục <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        
@endsection
        
