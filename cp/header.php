
<div class="row">
<div class="col-md-4">
<h2 style="color:#fff; text-shadow:#000 1px 1px 3px;">Control Panel</h2>
</div>
<div class="col-md-8" style="text-align:right; line-height: 30px; color:white;">
  <form method="post" action="logout.php" >
 <span class="glyphicon glyphicon-user"></span> ยินดีต้อนรับคุณ : <b><?php echo $_SESSION[user]; ?></b> <input type="submit" value="ออกจากระบบ" onClick="return confirm('คุณต้องการออกจากระบบจริงหรือไม่')" class="btn btn-default btn-xs" />
  | <a href="../index.php" target="_blank">เรียกดูเว็บไซต์ </a>
  </form>
  </div>
</div>

<nav class="navbar navbar-default" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="cp.php">C9Wap</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="cp-news.php">จัดการข่าว</a></li>
        
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการหน้า<span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="cp-page.php?id_edit=1">Download</a></li>
            <!--<li><a href="cp-page.php?id_edit=2">Server info</a></li>
            <li class="divider"></li>
            <li><a href="cp-page.php?id_edit=3">Fix bug</a></li>
            <li><a href="cp-page.php?id_edit=4">Change Class</a></li>-->

            
          </ul>
        </li>
        <li class="dropdown">
         <a href="#" class="dropdown-toggle" data-toggle="dropdown">จัดการรายการไอเท็ม<span class="caret"></span></a>
         <ul class="dropdown-menu" role="menu">
         <li><a href="edit-shopgold.php">จัดการ Gold Shop</a></li>
         <li><a href="edit-shopcash.php">จัดการ Cash Shop</a></li>
         </ul>
         </li>
        <li><a href="cp-slide.php">จัดการสไลด์รูปภาพ</a></li>
        <li><a href="cp-user.php">จัดการผู้ใช้</a></li>
      </ul>
      
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>