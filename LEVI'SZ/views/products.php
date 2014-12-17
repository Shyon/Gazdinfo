<div id="content">
<!DOCTYPE HTML>
<html>
<head>
	<title>Shop</title>
	<meta charset="utf-8">
	<style type="text/css">
		body {
			font: 13px Arial;
		}
		#products {
			text-align: center; float: left;
		}
		#products ul{
			list-style-type: none; margin: 0px;
		}
		#products li {
			width: 150px; padding: 4px; margin: 8px;
			border: 1px solid #dd; background-color: #eee;
			-moz-border-radius: 4px; -webkit-border-radius: 4px;
		}
		#products .name {
			font-size: 15px; margin: 5px; 
		}
		#products .price {
		margin: 5px;
		}
		#cart {
			position:fixed; top:40%; right:30%; }
			padding: 4px; margin: 8px; float: left;
			border: 1px solid #ddd; background-color: #eee;
			-moz-border-radius: 4px; -webkit-border-radius: 4px;
		}
		#cart table{
		 width: 320px; border-collapse: collapse;
		 text-align: left;
		}
		#cart th {
			border-bottom: 1px solid #aaa;
		}
		#cart captain {
			font-size: 15 px; height: 30px; text-align: left;
		}
		#cart .total {
			height: 40px;
			width:220px;
			padding:10px; 
			border:5px solid #fa1d38; 
			margin:0px; 
		}
		#cart .remove a:hover, a:active {
			cursor:hand;
		}
	</style>
</head>
<body>

		<h1>Termékek</h1>
	<form action="<?php echo base_url();?>index.php/shop" method="post">
	Rendezés:<select name="rendezes">
	<option  value="ar" <?php if($rendezes=='ar' || $rendezes==null) echo 'selected="selected"'; ?> >Ár szerinti</option>
	<option  value="nev" <?php if($rendezes=='nev') echo 'selected="selected"'; ?>>Név szerinti</option>
	</select>
	
	
	Megjelenítés
	<select name="megjelenites">
	<option  value="10" <?php if($dbszam=='10' || $dbszam==null) echo 'selected="selected"'; ?>>10 termék / lap</option>
	<option  value="20" <?php if($dbszam=='20') echo 'selected="selected"'; ?>>20 termék / lap</option>
	<option  value="30" <?php if($dbszam=='30') echo 'selected="selected"'; ?>>30 termék / lap</option>
	<option  value="40" <?php if($dbszam=='40') echo 'selected="selected"'; ?>>40 termék / lap</option>
	<option  value="50" <?php if($dbszam=='50') echo 'selected="selected"'; ?>>50 termék / lap</option>
	</select>
	
	<input type="hidden" name="formsub" value="true" />
	
	<button type="submit">Szűrés</button>
	
	</form>
	
	<div id="products">
		<ul>
		<?php foreach ($products as $product):?>
		<li>
			<?php echo form_open('shop/add');?>
			<div class="name"><?php echo $product->pname;?></div>
			<div class="thumb">
			<?php echo img(array(
				'src'=> 'images/img/0000000'.$product->sid.'.jpg',
				'class'=>$product->pname
				)
			);?>
			</div>
			<div class="price"><?php echo $product->purchase;?>,- Ft</div>
			
			<?php echo form_hidden('sid', $product->sid);?>
			<?php echo form_submit('action','Kosárba');?>
			<?php echo form_close();?>
		</li>
		<?php endforeach; ?>
	</ul>
	</div>
	
			<?php if ($cart=$this->cart->contents()):?>

	<div id="cart">
		<table>
		<caption><u><strong>Kosár</strong></u></caption>
		<thead>
			<tr>
				<th>Megnevezés</th>
				<th>Mennyiség</th>
				<th>Ár</th>
				<th></th>
			</tr>
		</thead>
		<?php foreach ($cart as $item):?>
			<tr>
				<td><?php echo $item['name'];?></td>
				<td><div id="mennyiseg">
					<select name="ertek">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
					</select>
				</td>
			
				
				<td>
				<?php
				/*$eredmeny =$ertek*$item['subtotal'];
				echo $eredmeny."--";
				*/
				echo $item['subtotal'];?>,- Ft</td>
				<td class="remove">
				<?php echo anchor('shop/remove/'.$item['rowid'],'<img src="../images/layout/delete.png" name="image" width="25" height="25" value="delete">');?>
				</td>
				</tr>
		<?php endforeach;?>
		<tr class="total">
			<td colspan="2"><strong>Teljes összeg:</strong></td>
			<td><strong><?php echo $this->cart->total();?>,-Ft</strong></td>
		</tr>
		<tr>
			<td>
			<form action="<?php echo base_url();?>index.php/buydata" method="post">
			<?php echo form_submit('action','Megveszem');?>
			<?php echo form_close();?>
			</form>
			</td>
		</tr>
		</table>
	
	</div>
		<?php endif;?>
	
</body>
</html>
</div>