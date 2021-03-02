<?php  
//export.php  
$connect = mysqli_connect("localhost", "govinda_mhd", "nmF0WUH5Y", "govinda_mhd");
$output = '';
if(isset($_POST["export"]))
{
 $query = "SELECT * FROM mhd_member";
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
                         <th>id</th>  
                         <th>oldref</th>  
                         <th>is_waiting</th>  
                        <th>member_no</th>
                        <th>email</th>
                        <th>password</th>
                        <th>firstname</th>
                        <th>lastname</th>
                        <th>telephone</th>
                        <th>forget_code</th>
                        <th>del</th>
                        <th>date_login</th>
                        <th>data_added</th>
                        <th>date_modify</th>
                        <th>confirm</th>
                        <th>transfer_oldweb</th>
                    </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>  
                         <td>'.$row["id"].'</td>  
                         <td>'.$row["oldref"].'</td>  
                         <td>'.$row["is_waiting"].'</td>  
                        <td>'.$row["member_no"].'</td>  
                        <td>'.$row["email"].'</td>
                        <td>'.$row["password"].'</td>
                        <td>'.$row["firstname"].'</td>
                        <td>'.$row["telephone"].'</td>
                        <td>'.$row["forget_code"].'</td>
                        <td>'.$row["del"].'</td>
                        <td>'.$row["date_login"].'</td>
                        <td>'.$row["data_added"].'</td>
                        <td>'.$row["date_modify"].'</td>
                        <td>'.$row["confirm"].'</td>
                        <td>'.$row["transfer_oldweb"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }
}
?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?php echo $heading_title;?></h1>
                </div>
                <div class="col-sm-6">
                    <?php if ($breadcrumbs) : ?>
                    <ol class="breadcrumb float-sm-right">
                        <?php foreach ($breadcrumbs as $title => $link) { ?>
                        <li class="breadcrumb-item"><a href="<?php echo $link;?>"><?php echo $title; ?></a></li>
                        <?php } ?>
                    </ol>
                    <?php endif; ?>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <?php if (!empty($success)) : ?>
                    <div class="alert alert-success alert-dismissible"><?php echo $success;?></div>
                    <?php endif;?>
                    <?php if (!empty($error)) : ?>
                    <div class="alert alert-danger alert-dismissible"><?php echo $error;?></div>
                    <?php endif;?>
                    <div class="card">
						<div class="card-body">
								<form action="<?php echo $action; ?>" method="post">
									<div class="row">
                                        <div class="col-3 mb-3">
                                            <label>เลขสมาชิก</label>
                                            <input type="text" name="filter_memberno" value="<?php echo $filter_memberno;?>" class="form-control" placeholder="ค้นหา เลขสมาชิก เก่า/ใหม่" />
                                        </div>

                                        <div class="col-3 mb-3">
                                            <label>อีเมล</label>
                                            <input type="text" name="filter_email" value="<?php echo $filter_email;?>" class="form-control" placeholder="ค้นหา อีเมล" />
                                        </div>

                                        <div class="col-3 mb-3">
                                            <label>ชื่อ</label>
                                            <input type="text" name="filter_name" value="<?php echo $filter_name;?>" class="form-control" placeholder="ค้นหา ชื่อ" />
                                        </div>
                                        <div class="col-12">
                                            <input type="submit" class="btn btn-primary" value="ค้นหา" />
                                            <a href="<?php echo $action; ?>" class="btn btn-default">ล้าง</a>
                                        </div>
                                        <div class="col-12">
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <input type="submit" name="export" class="btn btn-success" value="Export-excel" />
                                            </form>
                                        </div>
                                    </div>

								</form>
						</div>
					</div>

                    <div class="card">
                        <div class="card-body">

                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>เลขสมาชิก</th>
                                        <th>ชื่อ</th>
                                        <th>อีเมล</th>
                                        <th>โรงพยาบาล</th>
                                        <th width="15%">สถานะ</th>
                                        <th width="15%" class="text-center">การจัดการ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (count($lists)>0) : ?>
                                    <?php foreach ($lists as $key => $value) : ?>
                                    <tr>
                                        <td><?php echo $value->member_no;?></td>
                                        <td><?php echo $value->firstname.' '.$value->lastname.($value->transfer_oldweb==1?' <span class="badge badge-secondary">เว็บเก่า</span>':'');?></td>
                                        <td><?php echo $value->email;?></td>
                                        <td><?php echo $value->hospital;?></td>
                                      
                                        <td>
                                        <?php if(empty($value->member_no)): ?>
                                            <span class="text-danger"><i class="fas fa-times-circle"></i> ยังไม่ได้สมัคร</span><br />
                                        <?php elseif ($value->is_waiting==1): ?>
                                            <span class="text-info"><i class="fas fa-tasks"></i> เชิญแล้ว รอสมัคร</span><br />
                                        <?php elseif(!empty($value->member_no)&&!empty($value->date_login)): ?>
                                            <span class="text-success">
                                                <i class="fas fa-check-circle"></i> เข้าระบบล่าสุด<br>
                                                <?php echo date('d/m/Y H:i',strtotime($value->date_login));?>
                                            </span>
                                        <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    จัดการ
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right" role="menu">
                                                    <a class="dropdown-item" href="<?php echo base_url('admin/member/edit/'.$value->id);?>">แก้ไข ข้อมูลผู้สมัคร</a>
                                                    <a class="dropdown-item" href="#">แก้ไข โปรแกรมที่สมัคร</a>
                                                    <!-- <a class="dropdown-item" href="#">ตรวจสอบ การชำระเงิน</a> -->
                                                    <!-- <a class="dropdown-item" href="#">Export Excel</a> -->
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="<?php echo base_url('admin/member/sendEmailConfirm/'.$value->id);?>" onclick="return confirm('การส่งเมลไม่ควรกดส่งถี่ๆ จะทำให้อีเมลระบบโดนแจ้งเป็นสแปมเมลได้ ยืนยันการส่งเมล?');">ส่งอีเมลยืนยันการสมัคร</a>
                                                    <a class="dropdown-item" href="<?php echo base_url('admin/member/sendEmailForgot/'.$value->id);?>" onclick="return confirm('การส่งเมลไม่ควรกดส่งถี่ๆ จะทำให้อีเมลระบบโดนแจ้งเป็นสแปมเมลได้ ยืนยันการส่งเมล?');">ส่งอีเมลรีเซทรหัสผ่าน</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="<?php echo base_url('admin/member/del/'.$value->id);?>" onclick="return confirm('ยืนยันการลบ');">ลบ ข้อมูลผู้สมัคร</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                    <?php endif;?>
                                </tbody>
                            </table>

                            <?php echo $pagination; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->