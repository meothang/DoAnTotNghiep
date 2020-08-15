<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
  <!-- START X-NAVIGATION -->
  <ul class="x-navigation">
    <li class="xn-logo">
      <a href="{{route('admin.home')}}">
      </a>
      <a href="#" class="x-navigation-control"></a>
    </li>
    <li class="xn-profile">
      <a href="#" class="profile-mini">
        <img src="admin/assets/images/users/avatar.jpg" alt="John Doe"/>
      </a>
      <div class="profile">
        <div class="profile-image">
          <img src="admin/assets/images/users/avatar.jpg" alt="John Doe"/>
        </div>
        <div class="profile-data">
         <p class="name">{{Auth()->user()->name}}</p>
         <p class="designation">

           @php
           $roleUser = \DB::table('users')
           ->join('user_roles','users.id','=','user_roles.user_id')
           ->join('roles','user_roles.role_id','=','roles.id')
           ->where('users.id','=',\Auth()->user()->id)
           ->select('*')
           ->first();

           $listRoleOfUser = \DB::table('users')
            ->join('user_roles', 'users.id', '=', 'user_roles.user_id')
            ->join('roles', 'user_roles.role_id', '=', 'roles.id')
            ->where('users.id',Auth()->user()->id)
            ->select('roles.*')
            ->get()->pluck('id')->toArray();

          
            $listRoleOfUser = DB::table('roles')
            ->join('role_permissions', 'roles.id', '=', 'role_permissions.role_id')
            ->join('permissions','role_permissions.permission_id', '=', 'permissions.id')
            ->whereIn('roles.id',$listRoleOfUser) // lấy giá trị tại id
            ->select('permissions.*')
            ->get()->pluck('id')->unique();
             

            $checkPermissionAddCategory = \DB::table('permissions')->where('name','create-category')->value('id');
            $checkPermissionViewCategory = \DB::table('permissions')->where('name','view-category')->value('id');

            $checkPermissionAddProduct = \DB::table('permissions')->where('name','create-product')->value('id');
            $checkPermissionViewProduct = \DB::table('permissions')->where('name','view-product')->value('id');

            $checkPermissionViewReportDay = \DB::table('permissions')->where('name','view-report-day')->value('id');
            $checkPermissionViewReportMonth = \DB::table('permissions')->where('name','view-report-month')->value('id');

            $checkPermissionViewUser = \DB::table('permissions')->where('name','view-user')->value('id');

            $checkPermissionViewRoleEmployee = \DB::table('permissions')->where('name','view-role-employee')->value('id');
           @endphp
           
           {{ $roleUser->name}} 
         </div>

       </div>                                                                        
     </li>
     
     <li class=" {{\Request::route()->getName() == 'admin.home' ? 'active' : ''}}">
      <a href="{{route('admin.home')}}"><span class="fa fa-desktop"></span> <span class="xn-text">Dashboard</span></a>                        
    </li>   
    
    @if($listRoleOfUser->contains($checkPermissionViewCategory))
    
    <li class="xn-openable  {{\Request::route()->getName() == 'admin.get.list.category' || \Request::route()->getName() == 'admin.get.create.category' ? 'active' : ''}}">
      <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Danh mục</span></a>
      <ul>  
      <li><a href="{{ route('admin.get.list.category')}}"><span class="fa fa-align-justify"></span> Danh sách danh mục</a></li>
        
      @if($listRoleOfUser->contains($checkPermissionAddCategory))
        <li><a href="{{ route('admin.get.create.category')}}"><span class="fa fa-plus"></span> Thêm danh mục</a></li>
      @endif()  

      </ul>
    </li>

    @endif()
    
    @if($listRoleOfUser->contains($checkPermissionViewProduct))

    <li class="xn-openable  {{\Request::route()->getName() == 'admin.get.list.product' || \Request::route()->getName() == 'admin.get.create.product' ? 'active' : ''}}">
      <a href="#"><span class="fa fa-laptop"></span> <span class="xn-text">Sản phẩm</span></a>
      <ul>     
      <li><a href="{{ route('admin.get.list.product')}}"><span class="fa fa-align-justify"></span> Danh sách sản phẩm</a></li>
       

       @if($listRoleOfUser->contains($checkPermissionAddProduct))
       <li><a href="{{route('admin.get.create.product')}}"><span class="fa fa-plus"></span> Thêm sản phẩm</a></li>
       @endif()
       
      </ul>
    </li>
    @endif()

    <li class="xn-openable  {{\Request::route()->getName() == 'admin.get.list.order.not' || \Request::route()->getName() == 'admin.get.list.order' ? 'active' : ''}}">
      <a href="#"><span class="fa fa-shopping-cart"></span> <span class="xn-text">Đơn hàng</span></a>
      <ul>                            
        <li><a href="{{ route('admin.get.list.order.not')}}"><span class="fa fa-times"></span> Đơn hàng chưa duyệt</a></li>
        <li><a href="{{ route('admin.get.list.order')}}"><span class="fa fa-check"></span> Đơn hàng đã duyệt</a></li>
      </ul>
    </li>
    
    @if($listRoleOfUser->contains($checkPermissionViewReportDay) || $listRoleOfUser->contains($checkPermissionViewReportMonth))       
    <li class="xn-openable  {{\Request::route()->getName() == 'admin.get.list.day-report' || \Request::route()->getName() == 'admin.get.list.month-report' ? 'active' : ''}}">
      <a href="#"><span class="fa fa-table"></span> <span class="xn-text">Báo cáo</span></a>
      <ul>  
        
      @if($listRoleOfUser->contains($checkPermissionViewReportDay))                          
        <li><a href="{{ route('admin.get.list.day-report')}}"><span class="fa fa-calendar"></span> Báo cáo theo ngày</a></li>
      @endif()

      @if($listRoleOfUser->contains($checkPermissionViewReportMonth))
        <li><a href="{{ route('admin.get.list.month-report')}}"><span class="fa fa-calendar-o"></span> Báo cáo theo tháng</a></li>
      @endif()

      </ul>
    </li>
    @endif()
      
   
    @if($listRoleOfUser->contains($checkPermissionViewUser)) 
    <li>
      <a href="#"><span class="fa fa-users"></span> <span class="xn-text">Tài khoản</span></a>
      <ul>            
                    
        <li><a href="{{ route('get.backend.list.user') }}"><span class="fa fa-users"></span>Danh sách khách hàng</a></li>
        <li><a href="{{ route('get.backend.list.admin') }}"><span class="fa fa-users"></span>Danh sách quản trị viên</a></li>
        
      </ul>
    </li>
    @endif()
  
    @if($listRoleOfUser->contains($checkPermissionViewRoleEmployee)) 
      <li >
        <a href="{{ route('get.backend.list.employee') }}"><span class="fa fa-user"></span>Quản lý quyền nhân viên</a></li>
      </li>
    @endif()

    <li class=" {{\Request::route()->getName() == 'admin.frontend' ? 'active' : ''}}">
      <a href="{{route('admin.frontend')}}"><span class="fa fa-home"></span> <span class="xn-text">Trở về website</span></a>                        
    </li> 
  </ul>
  <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->