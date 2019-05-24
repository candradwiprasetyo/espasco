
                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                             <div class="title_page"> <?= $title ?></div>
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">
                                    <div class="row" style="padding-top: 10px;">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Counter </label>
                                            <select name="i_table_id" id="i_table_id"  class="selectpicker show-tick form-control" data-live-search="true" >
                                            <?php
                                            $query_table = mysqli_query($mysqli, "select a.*, b.building_name
                                                                        from tables a
                                                                        left join buildings b on b.building_id = a.building_id
                                                                        order by table_id
                                                                        ");
                                            while($row_table = mysqli_fetch_array($query_table)){
                                            ?>
                                            <option value="<?= $row_table['table_id']?>"><?php
                                            if($row_table['table_id'] != 0){
                                                $building = " (".$row_table['building_name'].")";
                                            }else{
                                                $building= "";
                                            }
                                            echo $row_table['table_name'].$building; ?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                        </div> 
                                        </div>
                                    </div>

                                    
                                    <table id="" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Menu</th>
                                                   
                                                   <th>Stok</th>
                                                   <th>Ambil</th> 
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                           $no = 1;
                                            while($row = mysqli_fetch_array($query)){
                                            ?>
                                            <tr>
                                            <td><?= $no?></td>
                                               <td><?= $row['menu_name']?></td>
                                                
                                               <td><?= $row['menu_stock']?></td>
                                              <td style="text-align:center;">

                                                    <input type="number" class="form-control" name="i_stock_<?= $row['menu_id']?>" value="0" style="width: 60px;" required max="<?= $row['menu_stock']?>">

                                                </td> 
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <td colspan="7"><input class="btn btn-success btn-block" type="submit" value="Simpan"/></td>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>
                                    </form>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

                </section><!-- /.content -->
