<?php 
	/**
	* Clases encargada de imprimir las consulta de la Base de datos
	*/

	class showQuerys
	{	
		/*Datos tabla Categorias*/
			public $id;
			public $categoria;
			public $parent;
		/*Datos tabla Productos*/
			public $titulo;
			public $price;
			public $price_list;
			public $destacado;
			public $img_producto;
			public $tallas;
			public $descripcion;
			public $brand_id;
			public $categorias_id;
			public $subcategoria_id;

			#funcion que muestra las categorias en el menu principal de la tienda
			public function showcategories(){
				/*Solo en caso de ser necesario agregar subcategorias con un while*/
				#$enlace = mysqli_connect('localhost','root','','dbyaxkin');
				$enlace = mysqli_connect('localhost','root','medalofhonor','dbyaxkin');
				$sqlshowcate= mysqli_query($enlace,"SELECT * FROM categorias WHERE parent = '0' ");
						echo "<div class='collapse navbar-collapse' id='MenuResponsive'>
								<ul class='nav navbar-nav centerMenu'>";
									while ($rcategories = mysqli_fetch_array($sqlshowcate)) {
										$idparent= $this->categoria =$rcategories['id'];
										$sqlparent= mysqli_query($enlace,"SELECT * FROM categorias WHERE parent = '$idparent' ");
										echo 	"<li class='dropdownit'>
													<a href='#'>".$this->categoria =$rcategories['categoria']."</a>

													<ul class='dropdownitems'>";
													while ($rparents = mysqli_fetch_array($sqlparent)) {
														echo "<li><a href='#' class='liSubcategorias'>".$this->categoria =$rparents['categoria']."</a></li>";
													}
														
										echo "		</ul>
												</li>";
									}
						echo "  </ul>						
							</div>";

				mysqli_free_result($sqlshowcate);
				mysqli_close($enlace);
			}
			#funcion para mostrar productos destacados
			public function showallproducts(){
				#$enlace = mysqli_connect('localhost','root','','dbyaxkin');
				$enlace = mysqli_connect('localhost','root','medalofhonor','dbyaxkin');
				$productsAll= mysqli_query($enlace,"SELECT * FROM productos");	
						while ($showproducts = mysqli_fetch_array($productsAll)) {
							#$tallasProducto = $this->tallas = $showproducts['tallas'];
							#$arrayTallas = explode(',', $tallasProducto);
							$productsAll2= mysqli_query($enlace,"SELECT tallas,cantidad FROM tallas_cantidades WHERE productos_id='".$this->id=$showproducts['id']."'");
							echo "  <form class='formaddcart'>";
								echo "  <div class='col-xs-12 col-sm-6 col-md-4'>
						    				<div class='thumbnail'>
						     	 				<img src='cpanel/products/".$this->img_producto=$showproducts['img_producto']."' class='img-responsive' alt='guayaberas Yaxkin'>
						      					<div class='caption'>
						        					<h3 class='titleProduct'>".$this->titulo=$showproducts['titulo']."</h3>
						        					<p class='price1'><span class='titlespan'>Precio actual:</span><span class='pricespan'>$".number_format($this->price=$showproducts['price'],2)." Pesos</span></p>
						        					<div class='form-group margincaptioninfo'>
						        						<a data-toggle='modal'  href='#' data-target='#productoitem".$this->id=$showproducts['id']."' class='btn btn-info btn-block'><i class='fa fa-eye faSpace' aria-hidden='true'></i>Detalles del producto</a>
						        					</div>
						        	 ";
												echo "<div class='modal fade ' id='productoitem".$this->id=$showproducts['id']."' role='dialog'>
													    <div class='modal-dialog modal-lg'>
													      <div class='modal-content '>
													        <div class='modal-header'>
													          <button type='button' class='close' data-dismiss='modal'>&times;</button>
													          <h4 class='modal-title'>".$this->titulo=$showproducts['titulo']."</h4>
													        </div>
													        <div class='modal-body'>
																<div class='row'>

													        		<div class='tallascontainer col-md-6'>
													        			<img src='cpanel/products/".$this->img_producto=$showproducts['img_producto']."' alt='guayaberas Yaxkin' class='img-responsive'>
													        		</div>	
													        			";

												echo "				<div class='col-md-6'>
																		<div class='infoitem'>
													        				<p class='last-price'><span class='titlespan'>Precio Anterior:</span><span class='pricespan'>$".number_format($this->price=$showproducts['price_list'],2)." Pesos</span></p>
													        				<p class='price'><span class='titlespan'>Precio Actual:</span><span class='pricespan'>$".number_format($this->price=$showproducts['price'],2)." Pesos</span></p>
													        				<p class='price'>
													        					<span class='titlespan'>Descripción del producto</span></br>
													        					".$this->descripcion=$showproducts['descripcion']."
													        				</p>

															        		<div class='form-group'>
							    												<input type='hidden' class='form-control' name='idproducto' placeholder='Nombre del producto' value='".$this->id=$showproducts['id']."'>
							  												</div>

							  												<!--inputs hidden con info del item-->
							  												<div class='form-group'>
							  												<input type='hidden' name='price' value='".$this->price=$showproducts['price']."'>
							  												<input type='hidden' name='producto' value='".$this->titulo=$showproducts['titulo']."'>
							  												<input type='hidden' name='categoriaid' value='".$this->categorias_id=$showproducts['categorias_id']."'>
							  												</div>
											        						<div class='form-group'>
											        							<select class='form-control' name='TallCant' required>
											        								<option value='default' selected>Selecciona el tipo de producto</option>";
																        				while ($showTC = mysqli_fetch_array($productsAll2)) {
																        					echo"<option>".$this->tallas=$showTC['tallas']."Disponibles(".$this->cantidad=$showTC['cantidad'].")</option>";
																        				}
											        			
												echo "					        </select>
											        						</div>
											        						<div class='form-group'>
											        							<input type='number' value='0' name='cantidadproductos' class='form-group'>
											        						</div>
							  									        <button type='submit' class='btn btn-success btncart' role='button'>
						        												<i class='fa fa-cart-plus' aria-hidden='true'></i>Agregar al carrito
						   													</button>
							  											</div>
						  											</div>
						  										</d
											        	</div>
											        </div>
													        </div>
													        <div class='modal-footer'>
													        	<i class='fa fa-copyright' aria-hidden='true'></i>Yaxkin Guayaberas
													        </div>
													      </div>
													      
													    </div>
													  </div>";
						    echo"				</div>
						  					</div>
						  				</div>
						  			</form>";
						}
				
				mysqli_free_result($productsAll);
				mysqli_close($enlace);
			}
			#Muestra los tipos de productos con las opciones de Eliminar y Editar
			public function showMarcasProducto(){
				#$enlace = mysqli_connect('localhost','root','','dbyaxkin');
				$enlace = mysqli_connect('localhost','root','medalofhonor','dbyaxkin');
				$sqlBrands = mysqli_query($enlace,"SELECT * FROM brand");
					echo "
							<table class='table table-hover'>
    							<thead>
      								<tr>
        								<th><h3 class='titlebrand'><i class='fa fa-list-alt faSpace' aria-hidden='true'></i>Tipos de articulos</h3></th>
      								</tr>
    							</thead>
    							<tbody>
      								";
									while ($rbrands = mysqli_fetch_array($sqlBrands)) {
        							echo "
        							<tr>
        								<td>
        									<div class='col-md-6 alingcenter'>".$this->marca = $rbrands['marca']."</div>
        									<div class='col-md-6'>
        										<a class='btn btn-danger' href='../Servidor/enviosPost/tipoaccionbrand.php?elimina=".$this->id = $rbrands['id']."' role='button'>
        											<i class='fa fa-trash-o' aria-hidden='true'></i>
        										</a>
        										<a class='btn btn-success' data-toggle='modal' data-target='#editabrand".$this->id=$rbrands['id']."' href='#' role='button'>
        											<i class='fa fa-pencil-square' aria-hidden='true'></i>
        										</a>
        									</div>
        								</td>
        							</tr>";
        							echo "
									<div class='modal fade' id='editabrand".$this->id=$rbrands['id']."' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
									  <div class='modal-dialog' role='document'>
									    <div class='modal-content'>
									      <div class='modal-header'>
									        <i class='fa fa-times-circle close' aria-hidden='true'  data-dismiss='modal' aria-label='Close'></i>
									        <h4 class='modal-title' id='myModalLabel'>Editando tipo de marca...</h4>
									      </div>
									      <div class='modal-body'>
									        	<div class='row'>
													<div class='formAddTipoArticuloedit'>
														<form class='form-horizontal' action='../Servidor/enviosPost/tipoaccionbrand.php' method='post'>
														  <div class='form-group'>
														    
														    <div class='col-md-12'>
														      <input type='hidden' class='form-control' value='".$this->id = $rbrands['id']."' name='id'>
														      <input type='text' class='form-control inputbrandedit' id='tproduct' placeholder='Tipo de producto' required name='marca'>
														      	<div class='btnBrand'>
														    		<button type='submit' class='btn btn-success btnBrandedit'>
														    			<i class='fa fa-plus-circle faSpace' aria-hidden='true'></i>Agregar
														    		</button>
														    	</div>
														  </div>
														  </div>
														</form>
													</div>
									        	</div>
									      </div>
									      <div class='modal-footer'>
									      		<i class='fa fa-copyright' aria-hidden='true'></i>Yaxkin Guayaberas
									      </div>
									    </div>
									  </div>
									</div>
        							";
        							}
      				echo"
    							</tbody>
							</table>";
					#modal para actualizar dato de brand

				
				mysqli_free_result($sqlBrands);
				mysqli_close($enlace);
			}
			#Genera tabla dinamica para ver las categorias y ver subcategorias mediante modals
			#Acciones disponibles Eliminar | Modificar 
			public function categoriasview(){
				#$conecta= mysqli_connect("localhost","root","","dbyaxkin");
				$conecta= mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
				$consultaView = mysqli_query($conecta, "SELECT id,categoria,parent FROM categorias WHERE parent ='0'");
				while ($verconsulta = mysqli_fetch_assoc($consultaView)) {
					#Se almace un id para ver las subcategorias asignadas por parent
					$parent = (int)$this->parent=$verconsulta['id'];
					$consultaParent = mysqli_query($conecta, "SELECT id,categoria,parent FROM categorias WHERE parent='".$parent."'");
					#Consulta para traer datos y poder agregar una subcategoria a una categoria
					$consultaView2 = mysqli_query($conecta, "SELECT id,categoria,parent FROM categorias WHERE parent ='0'");
					echo '	<tr>
					        	<td>'.$this->categoria= $verconsulta['categoria'].'</td>
					       		<td>
					       			<a href="#" data-toggle="modal" data-target="#modalversubcategorias'.$this->id=$verconsulta['id'].'" class="btn btn-primary">
					       				<i class="fa fa-eye faSpace" aria-hidden="true"></i>Ver Sub-categorias</a>  | 
					       			<a href="#" data-toggle="modal" data-target="#addCategoria" class="btn btn-success"> 
					       				<i class="fa fa-plus-square faSpace " aria-hidden="true"></i>Agregar Subcategorias</a>
								<!---------MODAL PARA VER SUBCATEGORIAS------>	
									<div class="modal fade closeshowsubcat" id="modalversubcategorias'.$this->id=$verconsulta['id'].'" role="dialog">
									    <div class="modal-dialog modal-sm-custom">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title"><label for="categoria" class="col-md-12 control-label alingcenter">Subcategorias</label></h4>
									        </div>
									        <div class="modal-body">';
									        echo "<div id='opcionesubcat'>";
											echo '<table class="table table-hover alingcenter showtablesubcat" id="hidetable'.$this->id=$verconsulta['id'].'">
												    <thead>
												      	<tr>
												        	<th class="alingcenter">Sub-Categoria</th>
												        	<th class="alingcenter">Opciones</th>
												      	</tr>
												    </thead>
												    <tbody>
												    ';
												    if (mysqli_num_rows($consultaParent)>0) {
												     	while ($versubcategorias = mysqli_fetch_assoc($consultaParent)) {
													      	
														      	echo '
															      		<tr>
															      			<td>'.$this->categoria=$versubcategorias['categoria'].'</td>
															       			<td>
															       				<a href="../servidor/enviosPost/deletesubcategoria.php?subcategoria='.$this->id=$versubcategorias['id'].'" onclick="confirmaDelete()" class="btn btn-warning">
															       						<i class="fa fa-trash faSpace" aria-hidden="true"></i>Eliminar</a>  | 
															       				<a href="#" class="idsub btn btn-info" id="'.$this->id=$versubcategorias['id'].'">
															       					<i class="fa fa-pencil-square faSpace" aria-hidden="true"></i>Modificar</a>
															       			</td>
																
																	<div  id="editformsubcat'.$this->id=$versubcategorias['id'].'" class="noshowoptionupdatecat">
																		        <form class="form-horizontal" action="../servidor/enviosPost/updatesubcategoria.php" method="post">
																				   <div class="form-group"> 
																				    <div class="col-md-12 inputidsubcat'.$this->id=$versubcategorias['id'].'">
																				    	<input type="hidden" name="idsubcategorie" class="form-control"  placeholder="Nuevo nombre para subcategoria" value="'.$this->id=$versubcategorias['id'].'">
																				    </div>
																				  </div>
																				  <div class="form-group">
																				    <div class="col-md-12">
																				      <input type="text" name="renamesubcategoria" class="form-control" id="subcategoria" placeholder="Nuevo nombre para subcategoria">
																				    </div>
																				  </div>
																				  <div class="form-group">
																				    <div class="col-sm-12 ">
																				      	<button type="submit" class="btn btn-success btnBrand btnBrandedit">
																				      		<i class="fa fa-pencil-square faSpace" aria-hidden="true"></i>Actualizar
																				      	</button>
																				    </div>
																				  </div>
																				</form>
																	</div>
																													 
															       		</tr>
														       		 ';
														       		/*Modal para actualizar subcategorias*/

													    }
												     }else{
												     	echo "<tr>Esta categoria no cuenta con subcategorias</tr>";
												     } 

												    echo '</tbody>
												</table>';
											echo '</div>';
									  echo'</div>
									        <div class="modal-footer">
									          <i class="fa fa-copyright" aria-hidden="true"></i>Yaxkin Guayaberas
									        </div>
									      </div> 
									    </div>
									  </div>
									</div>
								<!---------MODAL PARA AGREGAR NUEVA SUBCATEGORIA------>
									<div class="modal fade" id="addCategoria" role="dialog">
									    <div class="modal-dialog modal-sm">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title"><label for="categoria" class="col-md-12 control-label alingcenter">Agregar Subcategoria</label></h4>
									        </div>
									        <div class="modal-body">
										        <form class="form-horizontal" action="../servidor/enviosPost/addcategorie.php" method="post">
												   <div class="form-group"> 
												    <div class="col-md-12">
												    	<select class="form-control" name="parent" required>
												    		<option selected disabled>Asignar a la categoria</option>
												    	';
												    		while ($categoriasRadd= mysqli_fetch_array($consultaView2)) {
												    			echo "<option value=".$this->id= $categoriasRadd["id"].">".$this->categoria= $categoriasRadd["categoria"]."</option>";
												    		}
												    	
												    	echo '
														</select>
												    </div>
												  </div>
												  <div class="form-group">
												    <div class="col-md-12">
												      <input type="text" name="categoria" class="form-control" id="subcategoria" placeholder="Agrega una Sub-categoria">
												    </div>
												  </div>
												  <div class="form-group">
												    <div class="col-sm-12 ">
												      	<button type="submit" class="btn btn-success btnBrand btnBrandedit">
												      		<i class="fa fa-plus-square faSpace" aria-hidden="true"></i>Agregar
												      	</button>
												    </div>
												  </div>
												</form>	
									        </div>
									        <div class="modal-footer">
									          <i class="fa fa-copyright"aria-hidden="true"></i>Yaxkin Guayaberas
									        </div>
									      </div> 
									    </div>
									  </div>
									</div>
								<!---------MODAL PARA Actualiza CATEGORIA------>
									<div class="modal fade" id="editcategoria'.$this->id=$verconsulta['id'].'" role="dialog">
									    <div class="modal-dialog modal-sm">
									      <div class="modal-content">
									        <div class="modal-header">
									          <button type="button" class="close" data-dismiss="modal">&times;</button>
									          <h4 class="modal-title"><label for="categoria" class="col-md-12 control-label alingcenter">Actualizar Categoria</label></h4>
									        </div>
									        <div class="modal-body">
										        <form class="form-horizontal" action="../servidor/enviosPost/updatecategoria.php" method="post">
												   <div class="form-group"> 
												    <div class="col-md-12">
												    	<input type="hidden" name="idcategoria" value="'.$this->id=$verconsulta['id'].'">
												    </div>
												  </div>
												  <div class="form-group">
												    <div class="col-md-12">
												      <input type="text" name="renamecategoria" class="form-control" id="subcategoria" placeholder="Nuevo nombre de categoria">
												    </div>
												  </div>
												  <div class="form-group">
												    <div class="col-sm-12 ">
												      	<button type="submit" class="btn btn-success btnBrand btnBrandedit">
												      		<i class="fa fa-pencil-square faSpace" aria-hidden="true"></i>Actualizar
												      	</button>
												    </div>
												  </div>
												</form>	
									        </div>
									        <div class="modal-footer">
									          <i class="fa fa-copyright"aria-hidden="true"></i>Yaxkin Guayaberas
									        </div>
									      </div> 
									    </div>
									  </div>
									</div>
								
					       		</td>
					        	<td>
								    <a href="../servidor/enviosPost/deletecategorie.php?idcategoria='.$this->id= $verconsulta['id'].'" data-toggle="modal" data-target="#" onclick="confirmaDelete()" class="btn btn-warning">
								    		<i class="fa fa-trash faSpace" aria-hidden="true"></i>Eliminar</a>  | 
								    <a href="#" data-toggle="modal" data-target="#editcategoria'.$this->id=$verconsulta['id'].'" class="btn btn-info">
								    		<i class="fa fa-pencil-square faSpace" aria-hidden="true"></i>Modificar</a>
								</td>
					      	</tr>									
						 ';
					mysqli_free_result($consultaParent);
				}

				mysqli_free_result($consultaView);
				mysqli_close($conecta);
			}
			#genera genera la consulta para mostrar todos los datos de la tabla brand
			public function productype(){
				#$conecta= mysqli_connect("localhost","root","","dbyaxkin");
				$conecta= mysqli_connect("localhost","root","medalofhonor","dbyaxkin");

				$sqlproductype = mysqli_query($conecta,"SELECT id,marca FROM brand");
				while ($rconsultabrand = mysqli_fetch_assoc($sqlproductype)) {
					$this->resultado[]=$rconsultabrand;
				}
				return $this->resultado;
				mysqli_free_result($sqlproductype);
				mysqli_close();
			}
			#genera las categorias a mostrar
			public function listacategorias(){
				#$conecta= mysqli_connect("localhost","root","","dbyaxkin");
				$conecta= mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
				$sqlistcategorias= mysqli_query($conecta, "SELECT id,categoria FROM categorias  WHERE parent='0' ");
				while ($listacategories=mysqli_fetch_assoc($sqlistcategorias)) {
					$this->resultcategories[] =$listacategories;
				}
				return $this->resultcategories;
				mysqli_free_result($sqlistcategorias);
				mysqli_close();
			}
			public function listasubcaterias(){
				#$conectar= mysqli_connect("localhost","root","","dbyaxkin");
				$conectar= mysqli_connect("localhost","root","medalofhonor","dbyaxkin");
				$sqlsubcategorieslist = mysqli_query($conectar,"SELECT id,categoria FROM categorias WHERE parent <> 0");
				while ($listasubcategories= mysqli_fetch_assoc($sqlsubcategorieslist)) {
					$this->resultsubcategories[] =$listasubcategories;
				}
				return $this->resultsubcategories;
				mysqli_free_result($sqlsubcategorieslist);
				mysqli_close();
			}
			#funcion encargada de mostrar una lista de los productos agregados
			public function showlistproductos(){
				#$conecta= mysqli_connect("localhost","root","","dbyaxkin");
				$conecta= mysqli_connect("localhost","root","medalofhonor","dbyaxkin");

				$listaproductos = mysqli_query($conecta,"SELECT * FROM Productos");

				if (mysqli_num_rows($listaproductos)>0) {
					while ($showlistproductos= mysqli_fetch_assoc($listaproductos)) {
						$sqlproductype2 = mysqli_query($conecta,"SELECT id,marca FROM brand");
						$sqlistcategorias2 = mysqli_query($conecta, "SELECT id,categoria FROM categorias  WHERE parent='0' ");
						$sqlsubcategorieslist2 = mysqli_query($conecta,"SELECT id,categoria FROM categorias WHERE parent <> 0");
						$sqltallascantidades = mysqli_query($conecta,"SELECT tallas,cantidad FROM tallas_cantidades WHERE productos_id = '".$this->id=$showlistproductos['id']."' ");
						#$tallass = $this->tallas=$showlistproductos['tallas'];
						#$arrayTallas2 = explode(',', $tallass);
						
						echo "<tr>";
							echo "<td>".$this->titulo=$showlistproductos['titulo']."</td>";
							echo "<td>$".$this->price=$showlistproductos['price']."</td>";
							echo "<td>$".$this->price_list=$showlistproductos['price_list']."</td>";
							echo "<td class='tdwidth'>";
								if ($this->destacado=$showlistproductos['destacado']== 1) {
									echo "si";
								}else{
									echo "no";
								}
							echo "</td>";
							echo "<td>";
								while ($tallascantidades = mysqli_fetch_array($sqltallascantidades)) {
			        				echo $this->tallas= $tallascantidades['tallas']."".$this->cantidad = $tallascantidades['cantidad']."</br>";
								}
							echo "</td>";
							echo "<td>".$this->descripcion=$showlistproductos['descripcion']."</td>";
							echo '<td>
									<a href="../servidor/enviosPost/deleteproducto.php?productodelete='.$this->id=$showlistproductos['id'].'" onclick="confirmaDelete()" class="btn btn-warning">
											<i class="fa fa-trash faSpace" aria-hidden="true"></i>Eliminar</a>

									<a href="#" class="btn btn-info" data-toggle="modal" data-target="#editproducto'.$this->id=$showlistproductos['id'].'" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i>Modificar</a>
								  </td>';
						echo "</tr>";
						echo '<div id="editproducto'.$this->id=$showlistproductos['id'].'" class="modal fade" role="dialog">
									  <div class="modal-dialog modal-md">
									    <!-- Modal content-->
									    <div class="modal-content">
									      <div class="modal-header">
									        <button type="button" class="close" data-dismiss="modal">&times;</button>
									        <h4 class="modal-title"><i class="fa fa-product-hunt faSpace" aria-hidden="true"></i>Modificando producto...</h4>
									      </div>
									      <div class="modal-body">
									        <div class="formaddproduct">
									        	<form action="../Servidor/enviosPost/updateproductos.php" method="POST" enctype="multipart/form-data">
										        	<div class="row">
											        	<div class="col-md-12">
											           		<div class="form-group">
			    												<input name="foto" type="file" class="form-control" value="'.$this->img_producto=$showlistproductos['img_producto'].'" placeholder="selecciona una imagen">
			  												</div>
											        		<div class="form-group">
			    												<input type="text" class="form-control" name="nameproducto" placeholder="Nombre del producto" value="'.$this->titulo=$showlistproductos['titulo'].'">
			    												<input type="hidden" class="form-control" name="idproducto" placeholder="Nombre del producto" value="'.$this->id=$showlistproductos['id'].'">
			    												<input type="hidden" class="form-control" name="fotodefault" placeholder="Nombre del producto" value="'.$this->id=$showlistproductos['img_producto'].'">
			  												</div>
			  												<div class="form-group">
			  													<div class="input-group">
			  														<div class="input-group-addon">$</div>
														        	<input type="number" class="form-control" name="price" placeholder="Precio" value="'.$this->price=$showlistproductos['price'].'">
			  													</div>
											        		</div>
											        		<div class="form-group">
			  													<div class="input-group">
			  														<div class="input-group-addon">$</div>
														        	<input type="number" class="form-control" name="price-promo" placeholder="Precio-Promo" value="'.$this->price_list=$showlistproductos['price_list'].'">
			  													</div>
											        		</div>
											        		<div class="form-group">
											        			<select class="form-control" name="brand" required>
											        				<option value="'.$this->id=$showlistproductos['brand_id'].'" selected>Selecciona el tipo de producto</option>
											        				';
											        				while ($showbrand = mysqli_fetch_array($sqlproductype2)) {
											        					echo"<option value=".$this->id=$showbrand['id'].">".$this->id=$showbrand['marca']."</option>";
											        				}
											        			
						echo '					        			</select>
											        		</div>
											        		<div class="form-group">
											        			<select class="form-control" name="categoria">
											        				<option value="'.$this->id=$showlistproductos['categorias_id'].'" selected>Selecciona una categoria</option>';
											        				while ($showcategoria= mysqli_fetch_array($sqlistcategorias2)) {
											        					echo"<option value=".$this->id=$showcategoria['id'].">".$this->id=$showcategoria['categoria']."</option>";
											        				}	
						echo '					        		</select>
											        		</div>
											           		<div class="form-group">
											        			<select class="form-control" name="subcategoria">
											        				<option value="'.$this->id=$showlistproductos['subcategoria_id'].'" selected>Selecciona una sub-categoria</option>';
											        				while ($showsubcat=mysqli_fetch_array($sqlsubcategorieslist2)) {
											        					echo"<option value=".$this->id=$showsubcat['id'].">".$this->id=$showsubcat['categoria']."</option>";
											        				}
						echo '					        			</select>
											        		</div>
			  												<div class="form-group">
			  													<textarea class="form-control  ctrlsize" rows="3" name="descripcion" placeholder="Descripcion del producto">'.$this->descripcion=$showlistproductos['descripcion'].'</textarea>
			  												</div>
											        		<div class="tallascontainer col-md-7">
											        			<h3 class="titleopciones">Agregar Tallas y Cantidad de articulos</h3>';
																#foreach ($arrayTallas2 as $valuetallas2) {
																#	$stringArray = explode(':', $valuetallas2);													
																#	$tallaR =$stringArray[0];
																#	$cantidad = $stringArray[1];
																#	$sizes= $stringArray[2];
																#	$cants= $stringArray[3];
																#	echo '<div class="form-group spacesizes">
														        #			<div class="col-md-6">
															  	#				<label class="checkbox-inline paddingespace">
							  									#					<input type="checkbox"  name="'.$sizes.'" class="hidebtncheck" checked value="'.$tallaR.':">'.$tallaR.'
																#				</label>								        				
														        #			</div>
														        #			<div class="col-md-6">
														        #				<input type="number" min="0" max="30" class="form-control" name="'.$cants.'" id="inlineCheckbox1" placeholder="cantidad" value="'.$cantidad.'">
														        #			</div>
																#		  </div>';
																	
																#}


						echo '					        	</div>
											        		<div class="form-group col-md-5">
											        			<h3 class="titleopciones">Producto Destacado</h3>
											        			<div class="contentradio">
												        			<input type="radio" name="destacado"  value="1" class="inputdestacado">SI
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
							  </div>';
							
					
					}
				}else{
						echo "Sin productos agregados";
				}
				

				mysqli_free_result($listaproductos);

				mysqli_close($conecta);

			}
	}

?>