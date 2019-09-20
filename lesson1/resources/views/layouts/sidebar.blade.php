<!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        
        <li class="active treeview">
          <a href="{{(route('home'))}}">
            <i class="fa fa-dashboard"></i> <span>Product</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          
          <ul class="treeview-menu">
            <li class="active"><a href="{{route('home')}}"><i class="fa fa-circle-o"></i>Danh sách</a></li>
            
            <li class="active"><a href="{{route('product.add')}}"><i class="fa fa-circle-o"></i>Thêm sản phẩm</a></li>
          </ul>
        </li>
        
        <li class="treeview">
          <a href="/post">
            <i class="fa fa-files-o"></i>
            <span>Post</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/post"><i class="fa fa-circle-o"></i>Danh sách</a></li>
            <li><a href="{{route('post.add')}}"><i class="fa fa-circle-o"></i>Thêm bài viết</a></li>
          Collapsed Sidebar</a></li>
          </ul>  
        </li>
      <li class="active treeview">
          <a href="/cate">
            <i class="fa fa-dashboard"></i> <span>Categories</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="/cate"><i class="fa fa-circle-o"></i>Danh sách</a></li>
            <li class="active"><a href="/cate/add-new"><i class="fa fa-circle-o"></i>Thêm Categories</a></li>
          </ul> 
        </li>
        


      </ul>