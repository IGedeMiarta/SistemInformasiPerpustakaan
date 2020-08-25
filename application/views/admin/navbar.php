 <!-- Navbar -->
 <nav class="main-header navbar navbar-expand navbar-white navbar-light ">
     <!-- Left navbar links -->
     <ul class="navbar-nav">
         <li class="nav-item">
             <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>

     </ul>


     <!-- Right navbar links -->
     <ul class="navbar-nav ml-auto">

         <!-- Messages Dropdown Menu -->
         <li class="nav-item">
             <a class="nav-link"><?= "Administrator"; ?></a>

         </li>
         <li class="nav-item dropdown">
             <a class="nav-link" data-toggle="dropdown" href="#">
                 <i class="far fa-user"></i>
             </a>
             <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">

                 <a class="dropdown-item" href="<?php echo base_url() . 'admin/ubah_password' ?>">
                     <i class="fas fa-unlock-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                     Ubah Password
                 </a>
                 <div class="dropdown-divider"></div>
                 <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                     <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                     Logout
                 </a>
             </div>
         </li>
         <!-- Notifications Dropdown Menu -->


     </ul>
 </nav>
 <!-- /.navbar -->