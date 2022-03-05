<!-- Content Header (Page header) -->
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>DataTables</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data user dan admin</h3>
                <br>
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-default">
                <i class = "fa fa-add"> Tambah User </i>
                </button>
                <a href="index.php?page=import_rekapdata">
                <button type="button" class="btn btn-success">
                <i class = "fa fa-save"> Import Data </i>
                </a>
                </button>
                <br><br>

                <a href="page/user/print_user.php">
                <button type="button" class="btn btn-success" >
                  <i class = "fa fa-print"> Print User </i>
                </button>
                </a>
                <a href="page/user/card_user.php">
                <button type="button" class="btn btn-primary" >
                  <i class = "fa fa-print"> Card User </i>
                </button>
                </a>
                <a href="page/user/export.php">
                <button type="button" class="btn btn-danger" >
                  <i class = "fa fa-print"> Export Data </i>
                </button>
                </a>
               
              </div>
              <!-- /.card-header -->
            
              <div style="overflow-x:auto;">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Unit</th>
                        <th>Ex-factory Date</th>
                        <th>Week Number</th>
                        <th>Buyer</th>
                        <th>On</th>
                        <th>Style</th>
                        <th>Description Products</th>
                        <th>Po</th>
                        <th>Color</th>
                        <th>Country</th>
                        <th>Size</th>
                        <th>Qty order</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 0;
                        $admin=$mysqli->query("SELECT * FROM datarekap");
                        while($m=mysqli_fetch_array($admin)){
                        $no++;  
                    ?>
                    <tr>
                        <td><?php echo $m['no']; ?></td>
                        <td><?php echo $m['unit']; ?></td>
                        <td><?php echo $m['exfactorydate']; ?></td>
                        <td><?php echo $m['weeknumber']; ?></td>
                        <td><?php echo $m['buyer']; ?></td>
                        <td><?php echo $m['on']; ?></td>
                        <td><?php echo $m['style']; ?></td>
                        <td><?php echo $m['descriptionproducts']; ?></td>
                        <td><?php echo $m['po']; ?></td>
                        <td><?php echo $m['color']; ?></td>
                        <td><?php echo $m['country']; ?></td>
                        <td><?php echo $m['size']; ?></td>
                        <td><?php echo $m['qtyorder']; ?></td>
                        </td>
                        
                    </tr>
                        <?php } ?>
                </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
      <!-- modal form tambah data -->
      <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">FORM TAMBAH USER</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <form role="form" method="post" action="index.php?page=create_user">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID USER</label>
                    <input type="text" class="form-control" name="iduser" placeholder="type user id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">NAMA</label>
                    <input type="text" class="form-control" name="nama" placeholder="type user id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">STATUS</label>
                    <input type="text" class="form-control" name="status" placeholder="type user id">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" name="pswd" placeholder="Password">
                  </div>
                
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Save</button>
                </div>
              </form>
            </div>
            <div class="modal-footer justify-content-between">
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>

      