<?php
	include('../cpanel/includesAdmin/checksession.php');
	include ('../servidor/clases/classcontroler.php');
	$infoshow = new showQuerys;
	$datosbrand= $infoshow->productype();
	$datoscateries = $infoshow->listacategorias();
	$datossubcategories = $infoshow->listasubcaterias();
?>
<!DOCTYPE html>
<html>
<head>
	<title>Panel Administrador | Productos</title>
	<?php include('../cpanel/includesAdmin/head.php');?>
</head>
<body>
	<section class="container-fluid">
		<!--Include menu acciones admin-->
		<?php include('../cpanel/includesAdmin/navadmin.php');?>
		<section class="row">
			<div class="col-md-2 panelBorde">
				<?php include('../cpanel/includesAdmin/menuactions.php');?>
			</div>
			<div class="col-md-10">
				<div class="row">
						<div class="col-md-12">
							<div class="containeraddproduct">
								<button class="btn btn-success btnaddproduct" data-toggle="modal" data-target="#addproducto"><i class="fa fa-plus faSpace" aria-hidden="true"></i>Agregar Producto</button>
								<div id="addproducto" class="modal fade" role="dialog">
								  <div class="modal-dialog modal-md">

								    <!-- Modal content-->
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title"><i class="fa fa-product-hunt faSpace" aria-hidden="true"></i>Agregando nuevo producto...</h4>
								      </div>
								      <div class="modal-body">
								        <div class="formaddproduct">
								        	<form action="../servidor/enviosPost/addproduct.php" method="POST"  enctype="multipart/form-data">
									        	<div class="row">
										        	<div class="col-md-12">
										           		<div class="form-group">
		    												<input name="foto" type="file" class="form-control" required placeholder="selecciona una imagen" required>
		  												</div>
										        		<div class="form-group">
		    												<input type="text" class="form-control" name="nameproducto" placeholder="Nombre del producto" required>
		  												</div>
		  												<div class="form-group">
		  													<div class="input-group">
		  														<div class="input-group-addon">$</div>
													        	<input type="number" class="form-control" name="price" placeholder="Precio" required>
		  													</div>
										        		</div>
										        		<div class="form-group">
		  													<div class="input-group">
		  														<div class="input-group-addon">$</div>
													        	<input type="number" class="form-control" name="price-promo" placeholder="Precio -Promo" required>
		  													</div>
										        		</div>
										        		<div class="form-group">
										        			<select class="form-control" name="brand" required>
										        				<option disabled selected value>Selecciona el tipo de producto</option>
										        				<?php for ($i=0; $i<count($datosbrand); $i++){ ?>
																<option value="<?php echo $datosbrand[$i]['id']?>"><?php echo $datosbrand[$i]['marca']?></option>   
																<?php } ?>
										        			</select>
										        		</div>
										        		<div class="form-group">
										        			<select class="form-control" name="categoria" required>
										        				<option disabled selected value>Selecciona una categoria</option>
										        				<?php for($i=0; $i<count($datoscateries); $i++){?>
										        					<option value="<?php echo $datoscateries[$i]['id']?>"><?php echo $datoscateries[$i]['categoria']?></option>
										        				<?php }?>
										        			</select>
										        		</div>
		  												<div class="form-group">
		  													<textarea class="form-control  ctrlsize" rows="3" name="descripcion" placeholder="Descripcion del producto" required></textarea>
		  												</div>
										        		<div class="tallascontainer col-md-7">
										        			<h3 class="titleopciones">Agregar Tallas y Cantidad de articulos</h3>
											        		<div class="form-group spacesizes">
											        			<div class="col-md-6">
												  					<label class="checkbox-inline paddingespace">
				  														<input type="checkbox"  name="size1" class="hidebtncheck" checked value="XS (34)">XS (34)
																	</label>								        				
											        			</div>
											        			<div class="col-md-6">
											        				<input type="number" min="0" max="30" class="form-control" name="cantidad1" id="inlineCheckbox1" placeholder="cantidad" value="0">
											        			</div>
															</div>
											        		<div class="form-group spacesizes">
											        			<div class="col-md-6">
												  					<label class="checkbox-inline paddingespace">
				  														<input type="checkbox"  name="size2" class="hidebtncheck" checked value="S (36)">S (36)
																	</label>								        				
											        			</div>
											        			<div class="col-md-6">
											        				<input type="number" min="0" max="30" class="form-control" name="cantidad2" id="inlineCheckbox1" placeholder="cantidad" value="0">
											        			</div>
															</div>
											        		<div class="form-group spacesizes">
											        			<div class="col-md-6">
												  					<label class="checkbox-inline paddingespace">
				  														<input type="checkbox"  name="size3" class="hidebtncheck" checked value="M (38)">M (38)
																	</label>								        				
											        			</div>
											        			<div class="col-md-6">
											        				<input type="number" min="0" max="30" class="form-control" name="cantidad3" id="inlineCheckbox1" placeholder="cantidad" value="0">
											        			</div>
															</div>
											        		<div class="form-group spacesizes">
											        			<div class="col-md-6">
												  					<label class="checkbox-inline paddingespace">
				  														<input type="checkbox"  name="size4" class="hidebtncheck" checked value="L (40)">L (40)
																	</label>								        				
											        			</div>
											        			<div class="col-md-6">
											        				<input type="number" min="0" max="30" class="form-control" name="cantidad4" id="inlineCheckbox1" placeholder="cantidad" value="0">
											        			</div>
															</div>
											        		<div class="form-group spacesizes">
											        			<div class="col-md-6">
												  					<label class="checkbox-inline paddingespace">
				  														<input type="checkbox"  name="size5" class="hidebtncheck" checked value="XL (42)">XL (42)
																	</label>								        				
											        			</div>
											        			<div class="col-md-6">
											        				<input type="number" min="0" max="30" class="form-control" name="cantidad5" id="inlineCheckbox1"  placeholder="cantidad" value="0">
											        			</div>
											        		</div>
											        		<div class="form-group spacesizes">
											        			<div class="col-md-6">
												  					<label class="checkbox-inline paddingespace">
				  														<input type="checkbox"  name="size6" class="hidebtncheck" checked value="2XL (44)">2XL (44)
																	</label>								        				
											        			</div>
											        			<div class="col-md-6">
											        				<input type="number" min="0" max="30" class="form-control" name="cantidad6" id="inlineCheckbox1"  placeholder="cantidad" value="0">
											        			</div>
											        		</div>
											        		<div class="form-group spacesizes">
											        			<div class="col-md-6">
												  					<label class="checkbox-inline paddingespace">
				  														<input type="checkbox"  name="size7" class="hidebtncheck" checked value="3XL (46)">3XL (46)
																	</label>								        				
											        			</div>
											        			<div class="col-md-6">
											        				<input type="number" min="0" max="30" class="form-control" name="cantidad7" id="inlineCheckbox1"  placeholder="cantidad" value="0">
											        			</div>
											        		</div>
											        		<div class="form-group spacesizes">
											        			<div class="col-md-6">
												  					<label class="checkbox-inline paddingespace">
				  														<input type="checkbox"  name="size8" class="hidebtncheck" checked value="4XL (42)">4XL (42)
																	</label>								        				
											        			</div>
											        			<div class="col-md-6">
											        				<input type="number" min="0" max="30" class="form-control" name="cantidad8" id="inlineCheckbox1"  placeholder="cantidad" value="0">
											        			</div>
											        		</div>
										        		</div>
										        		<div class="form-group col-md-5">
										        			<h3 class="titleopciones">Producto Destacado</h3>
										        			<div class="contentradio">
											        			<input type="radio" name="destacado"  value="1" class="inputdestacado" >SI
											        			<input type="radio" name="destacado"  value="0" class="inputdestacado" checked>NO
										        			</div>
										        		</div>


										        	</div>
										        </div>
										        <div class="row">
										        	<div class="form-group col-md-6">
										        		<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancelar</button>
										       		</div>
										       		<div class="form-group col-md-6">
										       			<button type="submit" class="btn btn-success btn-block" >Agregar</button>
										       		</div>
										       	</div>
								        	</form>							        
								        </div>
								      </div>
								      <div class="modal-footer">
								        <i class="fa fa-copyright" aria-hidden="true"></i>Yaxkin Guayaberas
								      </div>
								    </div>

								  </div>
								</div>

							</div>
							<div class="infoproductos">
								<table class="table table-hover">
								    <thead>
								      <tr>
								      	<th></th>
								        <th>Producto</th>
								        <th>Precio</th>
								        <th>Precio Promo</th>
								        <th>Producto Destacado</th>
								        <th>Tallas</th>
								        <th>Descripción</th>
								        <th>Opciones</th>
								      </tr>
								    </thead>
								    <tbody>
									    <?php $datossubcategories = $infoshow->showlistproductos(); ?>
								    </tbody>
								</table>
							</div>
						</div>
				</div>
			</div>
		</section>
	</section>
	<?php include('../cpanel/includesAdmin/jsfiles.php'); ?>
</body>
</html>