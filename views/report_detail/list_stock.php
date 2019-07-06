              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                              <div class="box-body2 table-responsive">
                              <div class="box-header" style="cursor: move;">
                              <h3 class="box-title"><strong>Detail Stock</strong></h3>
                              </div>
                                    <table id="example4" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                              <th rowspan="2">No</th>
                                              <th rowspan="2" style="width: 100px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;NamaMenu&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</th>
                                              <th rowspan="2" style="width: 100px;">StokGudang</th>

                                              <?php
                                              $date_awal = $date1;

                                              while(strtotime($date_awal) <= strtotime($date2)){
                                              ?>
                                              <th colspan="3" style="text-align: center;"><?= format_date($date_awal) ?></th>
                                              <?php 
                                              $date_awal = date("Y-m-d", strtotime("+1 day", strtotime($date_awal)));
                                              } 
                                              ?>
                                                
                                            </tr>
                                            
                                            <tr>
                                              <?php
                                              $date_awal_content = $date1;
                                              while(strtotime($date_awal_content) <= strtotime($date2)){
                                              ?>
                                                <th width="10%">Counter</th>
                                                <th width="10%">Terjual</th>
                                                <th width="10%">Sisa</th>
                                              <?php 
                                              $date_awal_content = date("Y-m-d", strtotime("+1 day", strtotime($date_awal_content)));
                                              } 
                                              ?>
                                            </tr>

                                        </thead>
                                        <tbody>
                                          <?php
                                          $no_item = 1;
                                          $total_gudang = 0;
                                          while($row_menu = mysqli_fetch_array($query_menu)){
                                            $total_gudang = $total_gudang + $row_menu['menu_stock'];
                                          ?>
                                          <tr>
                                            <td><?= $no_item; ?></td>
                                            <td><?= $row_menu['menu_name']; ?></td>
                                            <td><?= $row_menu['menu_stock']; ?></td>

                                            <?php
                                            $date_awal_value = $date1;
                                            $total_counter = 0;
                                            $total_terjual = 0;
                                            $total_sisa = 0;
                                            while(strtotime($date_awal_value) <= strtotime($date2)){
                                            ?>
                                              <td>
                                              <?php
                                              $date_yesterday = date("Y-m-d", strtotime("-1 day", strtotime($date_awal_value)));
                                              $counter_yesterday = get_stock_counter_yesterday($row_menu['menu_id'], $date_yesterday);
                                              $counter = get_stock_counter($row_menu['menu_id'], $date_awal_value);
                                              $counter = $counter + $counter_yesterday;
                                              echo $counter;
                                               ?>
                                              </td>
                                              <td>
                                                <?php
                                                $terjual = get_stock_terjual($row_menu['menu_id'], $date_awal_value);
                                                echo $terjual;
                                                 ?>
                                              </td>
                                              <td>
                                                <?php
                                                $sisa = $counter - $terjual;
                                                echo $sisa;
                                                ?>
                                              </td>
                                            <?php 
                                            $date_awal_value = date("Y-m-d", strtotime("+1 day", strtotime($date_awal_value)));
                                            $total_counter = $total_counter + $counter;
                                            $total_terjual = $total_terjual + $terjual;
                                            $total_sisa = $total_sisa + $sisa;
                                            } 
                                            ?>

                                          </tr>
                                          <?php
                                          $no_item++;
                                          }
                                          ?>
                                        </tbody>

                                        
                                           
                                        
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                