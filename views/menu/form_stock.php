<!-- Content Header (Page header) -->
        
                 <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Simpan gagal !</b>
               Password dan confirm password tidak sama
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                          
                          <div class="title_page"> <?= $title ?></div>

                             <form action="<?= $action?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-cokelat">
                                
                               
                                <div class="box-body">
                                    
                                    
                                        <div class="col-md-9">
                                        
                                        <div class="form-group">
                                            <label>Nama Menu</label>
                                            <input disabled="" required type="text" name="i_name" class="form-control" placeholder="Masukkan nama menu ..." value="<?= $row->menu_name ?>"/>
                                        </div>
                                      
                                        <div class="form-group">
                                          <label>Tipe</label>
                                           <select disabled="" id="basic" name="i_menu_type_id" size="1" class="selectpicker show-tick form-control" data-live-search="true" />
                                           <?php
                                           while($r_type = mysqli_fetch_array($query_menu_type)){
										   ?>
                                             <option value="<?= $r_type['menu_type_id'] ?>" <?php if($row->menu_type_id == $r_type['menu_type_id']){ ?> selected="selected"<?php } ?>><?= $r_type['menu_type_name']?></option>
                                             <?php
										   }
											 ?>
                                           </select>                                    
                                  		</div>

										    <div class="form-group">
                                            <label>Harga Original</label>
                                            <input readonly required type="number" name="i_original_price" class="form-control" placeholder="Masukkan harga original ..." value="<?= $row->menu_original_price ?>"/>
                                        </div>
                                        
                                            <div class="form-group">
                                            <label>Margin</label>
                                            <input required readonly type="number" name="i_margin_price" class="form-control" placeholder="Masukkan margin ..." value="<?= $row->menu_margin_price ?>"/>
                                        </div>
                                        
                                          <div class="form-group">
                                            <label>Harga Jual</label>
                                            <input required readonly type="number" name="i_price" class="form-control" placeholder="Masukkan harga ..." value="<?= $row->menu_price ?>"/>
                                        </div>

                                        <div class="form-group">
                                            <label>Stok Sekarang</label>
                                            <input required type="number" readonly name="i_stock" class="form-control" placeholder="Masukkan tambah stok ..." value="<?= @$row->menu_stock ?>"/>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label>Tambah Stok</label>
                                            <input required type="number" name="i_stock_add" class="form-control" placeholder="Masukkan tambah stok ..." value="<?= @$row->menu_stock_add ?>"/>
                                        </div>
                                       
                                          
                                        
                                        </div>
                                        <div class="col-md-3">
                                         <div class="form-group">
                                         <label>Images</label>
                                          <?php
                                        if($id){
											 $gambar = ($row->menu_img) ? $row->menu_img : "default.jpg";
										?>
                                        <br />
                                        <img src="<?= "../img/menu/".$gambar ?>" style="width:100%;"/>
                                        <?php
										}
										?>
                                           <input type="file" name="i_img" id="i_img" />
                                        </div>
                                        </div>
                                        <div style="clear:both;"></div>
                                     
                                </div><!-- /.box-body -->
                                
                                  <div class="box-footer">
                                <input class="btn btn-success" type="submit" value="Simpan"/>
                                <a href="<?= $close_button?>" class="btn btn-success" >Close</a>
                             
                             </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->