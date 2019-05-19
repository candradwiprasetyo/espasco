              
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                              <div class="box-body2 table-responsive">
                              <div class="box-header" style="cursor: move;">
<h3 class="box-title"><strong>Detail Per Menu</strong></h3>
</div>
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            <th width="5%">No</th>
                                                <th>Nama Menu</th>
                                                <!-- <th>Owner</th> -->
                                                <th>Qty</th>
                                                <th>Pokok</th>
                                                <th>Keuntungan</th>
                                                <th>Omset</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                                 <?php
                                           $no_item = 1;
										   $grand_total_dasar = 0;
										   $grand_total_omset = 0;
                       $grand_total_keuntungan = 0;
                                            while($row_item = mysqli_fetch_array($query_item)){
												$jumlah = ($row_item['jumlah']) ? $row_item['jumlah'] : 0;
												$total = $jumlah * $row_item['menu_price'];
                                       ?>
                                            <tr>
                                            <td><?= $no_item ?></td>
												<td><?= $row_item['menu_name']; ?></td>
                                              	<!-- <td><?= $row_item['partner_name']; ?></td> -->
                                                <td><?= tool_format_number($jumlah)?></td>
                                                <td><?= tool_format_number($row_item['jumlah_dasar'])?></td>
                                                <td>
                                                  <?php 
                                                  $keuntungan = $row_item['jumlah_omset'] - $row_item['jumlah_dasar'];
                                                  echo tool_format_number($keuntungan);
                                                  ?>
                                                    
                                                  </td>
                                             	<td><?= tool_format_number($row_item['jumlah_omset'])?></td>
                                                 </tr>
                                        

                                              <?php
											  $grand_total_dasar = $grand_total_dasar + $row_item['jumlah_dasar'];
											   $grand_total_omset = $grand_total_omset + $row_item['jumlah_omset'];
                         $grand_total_keuntungan = $grand_total_keuntungan + $keuntungan;
											$no_item++;
                                            }
                                            ?>
                                            </tbody>
                                            <tfoot>
											<tr>
                                            
                                                 <td colspan="3" align="right"  style="font-size:22px; font-weight:bold;">TOTAL</td>
                                                <td><?= tool_format_number_report($grand_total_dasar)?></td>
                                                <td><?= tool_format_number_report($grand_total_keuntungan)?></td>
                                              <td><?= tool_format_number_report($grand_total_omset)?></td>
                                              </tr>
                                          </tfoot>
                                        
                                         
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                  

                