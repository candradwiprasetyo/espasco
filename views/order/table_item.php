<span class="tooltip-text2 scrollpanel no4 content">
<table width="100%" border="0" cellspacing="0" cellpadding="5" class="table_item" style="margin-right:10px;">
 <thead>
 <tr>
    <td align="center">No</td>
    <td>Menu</td>
    <td align="right">Qty</td>
    <td align="right">Harga</td>
    <td align="right">Jumlah</td>
  </tr>
  </thead>
  <?php
  $no_item = 1;
  $total_price = 0;
  $query_item = mysqli_query($mysqli, "select b.*, c.menu_name 
							  from transactions_tmp a
							  join transaction_tmp_details b on b.transaction_id = a.transaction_id
							  join menus c on c.menu_id = b.menu_id
							  where table_id = '".$row['table_id']."'");
  while($row_item = mysqli_fetch_array($query_item)){
  ?>
  <tr>
    <td align="center" valign="top"><?= $no_item ?></td>
    <td valign="top"><?= $row_item['menu_name'] ?></td>
    <td align="right" valign="top"><?= $row_item['transaction_detail_qty'] ?></td>
    <td align="right" valign="top"><?= $row_item['transaction_detail_grand_price'] ?></td>
    <td align="right" valign="top"><?= $row_item['transaction_detail_total'] ?></td>
  </tr>
  
 <?php
 $no_item++;
 $total_price = $total_price + $row_item['transaction_detail_total'];
  }
 ?>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="6" class="table_total_item">
  <tr>
    <td>TOTAL</td>
    <td align="right"><?= $total_price ?></td>
  </tr>
</table>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="25%"><a href="transaction_new.php?page=list_edit&table_id=<?= $row['table_id']?>" style="text-decoration:none;"><div class="btn_edit_item">EDIT </div></a></td>
    <td width="25%">
    <a href="payment.php?table_id=<?= $row['table_id']?>&building_id=<?= $building_id?>" style="text-decoration:none;"><div class="btn_payment">BAYAR</div></a>
      
    
    </td>
    <td width="25%">
    <a href="#" onclick="javascript: cancel_order(<?= $row['table_id']?>)"><div class="btn_payment" style="background:#f56954">CANCEL</div></a>
      
    
    </td>
     <td width="25%">
    <a href="print_order.php?table_id=<?= $row['table_id']?>&building_id=<?= $building_id?>" style="text-decoration:none;"><div class="btn_print">PRINT</div></a>
      
    
    </td>
  </tr>
</table>
</span>
