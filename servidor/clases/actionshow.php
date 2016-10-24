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
			
			#funcion para mostrar productos destacados
			public function showallproducts(){
				#$enlace = mysqli_connect('localhost','root','','dbyaxkin');
				$enlace = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
				$productsAll= mysqli_query($enlace,"SELECT * FROM productos");

						while ($showproducts = mysqli_fetch_array($productsAll)) {
							#$tallasProducto = $this->tallas = $showproducts['tallas'];
							#$arrayTallas = explode(',', $tallasProducto);
							$productsAll2= mysqli_query($enlace,"SELECT tallas,cantidad FROM tallas_cantidades WHERE productos_id='".$this->id=$showproducts['id']."'");
							#IF encargado de validar el tipo de formulario a mostrar
							if ($this->img_producto=$showproducts['categorias_id'] ==1) {
								/*Formulario de productos de stock*/
								echo "  <form class='formaddcart'>";
									echo "  <div class='col-xs-12 col-sm-4 col-md-3 col-md-4'>
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
																			<div class='form-group'>
																				<img src='cpanel/custom/medidas2.png' class='img-responsive'>
																			</div>
																			<div class='form-group'>
																				<img src='cpanel/custom/medidas.png' class='img-responsive'>
																			</div>
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
																					<input type='hidden' name='color' value='s/n'>
																					<input type='hidden' name='t_cuello' value='s/n'>
																					<input type='hidden' name='t_manga' value='s/n'>
																					<input type='hidden' name='t_punio' value='s/n'>
																					<input type='hidden' name='mangas' value='s/n'>
																					<input type='hidden' name='bordado' value='s/n'>
																					<input type='hidden' name='altura' value='s/n'>
																					<input type='hidden' name='peso' value='s/n'>
																					<input type='hidden' name='complex' value='s/n'>
																					<input type='hidden' name='torax' value='s/n'>
																					<input type='hidden' name='cadera' value='s/n'>
																					<input type='hidden' name='hombros' value='s/n'>
																					<input type='hidden' name='longitud' value='s/n'>
																					<input type='hidden' name='punios' value='s/n'>
																					<input type='hidden' name='biceps' value='s/n'>
																					<input type='hidden' name='tipo' value='s/n'>
																					<input type='hidden' name='cuello' value='s/n'>



								  												<input type='hidden' name='tipo' value='stock'>

								  												<input type='hidden' name='price' value='".$this->price=$showproducts['price']."'>
								  												<input type='hidden' name='producto' value='".$this->titulo=$showproducts['titulo']."'>
								  												<input type='hidden' name='categoriaid' value='".$this->categorias_id=$showproducts['categorias_id']."'>
								  												</div>
												        						<div class='form-group'>
												        							<select class='form-control' name='TallCant' required >
												        								<option disabled selected value>Selecciona el tipo de producto</option>";
																	        				while ($showTC = mysqli_fetch_array($productsAll2)) {
																	        					echo"<option value='".$this->tallas=$showTC['tallas']."'>".$this->tallas=$showTC['tallas']."Disponibles(".$this->cantidad=$showTC['cantidad'].")</option>";
																	        				}
												        			
													echo "					        </select>
												        						</div>
												        						<div class='form-group'>
												        							<input type='number' value='1' min='1' max='40' name='cantidadproductos' class='form-control' required>
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
							}else{
								/*Formulario para productos personalizados*/
									echo "  <form class='formaddcart'>";
										echo "  <div class='col-xs-12 col-sm-4 col-md-3 col-md-4'>
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
																				<div class='infoitemcustom'>
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
									  												<input type='hidden' name='TallCant'>
									  												<input type='hidden' name='tipo' value='custom'>
									  												<input type='hidden' name='price' value='".$this->price=$showproducts['price']."'>
									  												<input type='hidden' name='producto' value='".$this->titulo=$showproducts['titulo']."'>
									  												<input type='hidden' name='categoriaid' value='".$this->categorias_id=$showproducts['categorias_id']."'>
									  												</div>
									  												<!--Form colores-->
													        						<div class='form-group marginFG'>
																						<div class='container-fluid'>
																						  	<div class='row'>
																						  		<h3 class='txtcolor'>Selecciona un color:</h3>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='color' value='color1_03.jpg' required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/color1_03.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='color' value='color1_05.jpg' required>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/color1_05.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='color' value='color1_07.jpg' required>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/color1_07.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='color' value='color1_09.jpg' required>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/color1_09.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='color' value='color1_16.jpg' required>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/color1_16.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>


																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='color' value='color1_17.jpg' required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/color1_17.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='color' value='color1_18.jpg' required>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/color1_18.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='color' value='color1_19.jpg' required>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/color1_19.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='color' value='color1_20.jpg' required>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/color1_20.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='color' value='color1_21.jpg' required>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/color1_21.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>
																						  	</div>
																						</div>
													        						</div>
													        						<!--Form tipo cuello-->
													        						<div class='form-group marginFG'>
																						<div class='container-fluid'>
																						  	<div class='row'>
																						  		<h3 class='txtcolor'>Tipo de cuello:</h3>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='t_cuello' value='cuello_03.jpg' required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/cuello_03.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							        <input type='radio' name='t_cuello' value='cuello_05.jpg'>
																							        <div class='thumbnailformcustom'>
																							          <img src='cpanel/custom/cuello_05.jpg' class='img-responsive'/>
																							        </div>
																							      </label>
																							    </div>
																						  	</div>
																						</div>
													        						</div>
													        						<!--Tipo manga,puño y bordado-->
													        						<div class='form-group'>
													        							<div class='row'>
													        								<diV class='col-md-4'>
															        							<select class='form-control' name='t_manga' required='required'>
															        								<option disabled selected value>Selecciona un tipo de manga</option>
															        								<option>Manga-Larga</option>
															        								<option>Manga-Corta</option>
															        							</select>											        						
													        								</div>
													        								<diV class='col-md-4'>
															        							<select class='form-control' name='t_punio' required='required'>
															        								<option disabled selected value>Selecciona un tipo de puño</option>
															        								<option>Estandar</option>
															        								<option>Gemelos (Doble puño con ojal)</option>
															        								<option>Doble uso (Doble puño con ojal y boton)</option>
															        							</select>
													        								</div>
													        								<diV class='col-md-4'>
															        							<select class='form-control' name='bordado' required='required'>
															        								<option disabled selected value>Selecciona un tipo de Bordado</option>
															        								<option>Blanco</option>
															        								<option>Negro</option>
															        								<option>Tono</option>
															        							</select>
													        								</div>
													        							</diV>
													        						</div>
													        						<!--Estimado de medidas-->
													        						<div class='form-group'>
													        							<div class='row'>
													        								<div class='col-md-12'><h3 class='txtcolor' style='margin-bottom:10px;'>Estimado de tus medidas:</h3></div>
													        								<diV class='col-md-6 spaceCF'>

																								<input type='text' name='altura' required class='form-control' placeholder='Ingresa tu altura' required>			
																							</div>
													        								<diV class='col-md-6 spaceCF'>
																								<input type='text' name='peso' required class='form-control' placeholder='Ingresa tu Peso' required>
													        								</div>
													        								<diV class='col-md-12 '>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='complex' value='complex1.jpg'  required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/complex1.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='complex' value='complex2.jpg'  required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/complex2.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='complex' value='complex3.jpg'  required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/complex3.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='complex' value='complex4.jpg'  required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/complex4.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='complex' value='complex5.jpg' required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/complex5.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
																							    <div class='ColFormCustom'>
																							      <label class='text-center radio-thumbnail'>
																							          <input type='radio' name='complex' value='complex6.jpg' required>
																							          <div class='thumbnailformcustom'>
																							            <img src='cpanel/custom/complex6.jpg' class='img-responsive'/>
																							          </div>
																							      </label>
																							    </div>
													        								</div>
													        							</diV>
													        						</div>
													        						<!--Medidas a detalle-->
													        						<div class='form-group'>
													        							<h3 class='txtcolor' style='margin-bottom:10px;'>Estimado de tus medidas:</h3>
													        							<diV class='col-md-12 spaceCF'>
																							<input type='text' name='cuello' required class='form-control' placeholder='Ingresa tu Cuello' required>			
																						</div>
													        						</div>
													        						<div class='form-group'>
													        							<diV class='col-md-12 spaceCF'>
																							<input type='text' name='torax' required class='form-control' placeholder='Ingresa tu Toráx' required>
													        							</div>
													        						</div>
													        						<div class='form-group'>
													        							<diV class='col-md-12 spaceCF'>
																							<input type='text' name='cadera' required class='form-control' placeholder='Ingresa tu Cadera' required>
													        							</div>
													        						</div>
													        						<div class='form-group'>
													        							<diV class='col-md-12 spaceCF'>
																							<input type='text' name='mangas' required class='form-control' placeholder='Ingresa tu Mangas' required>
													        							</div>
													        						</div>
													        						<div class='form-group'>
													        							<diV class='col-md-12 spaceCF'>
																							<input type='text' name='hombros' required class='form-control' placeholder='Ingresa tu Hombros' required>
													        							</div>
													        						</div>
													        						<div class='form-group'>
													        							<diV class='col-md-12 spaceCF'>
																							<input type='text' name='longitud' required class='form-control' placeholder='Ingresa tu Longitud' required>
													        							</div>
													        						</div>
													        						<div class='form-group'>
													        							<diV class='col-md-12 spaceCF'>
																							<input type='text' name='punios' required class='form-control' placeholder='Ingresa tu Puños' required>
													        							</div>
													        						</div>
													        						<div class='form-group'>
													        							<diV class='col-md-12 spaceCF'>
																							<input type='text' name='biceps' required class='form-control' placeholder='Ingresa tu Biceps' required>
													        							</div>
													        						</div>

													        						<div class='form-group'>
													        							<h3 class='txtcolor' style='margin-bottom:10px;'>Cantidad:</h3>
													        							<input type='number' value='1' min='1' max='40' name='cantidadproductos' class='form-control' required>
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

						}
				
				mysqli_free_result($productsAll);
				mysqli_close($enlace);
			}
			#Muestra los tipos de productos con las opciones de Eliminar y Editar-->Listo
			public function showMarcasProducto(){
				#$enlace = mysqli_connect('localhost','root','','dbyaxkin');
				$enlace = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
				$sqlBrands = mysqli_query($enlace,"SELECT * FROM brand");
					echo "<div class='table-responsive'>
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
        								<td class='alingcenter'>".$this->marca = $rbrands['marca']."</td>
        								<td class='alingcenter'>
        										<a class='btn btn-danger'  onclick='return confirmaDelete()' href='../servidor/enviosPost/tipoaccionbrand.php?elimina=".$this->id = $rbrands['id']."' role='button'>
        											<i class='fa fa-trash-o' aria-hidden='true'></i>
        										</a>
        										<a class='btn btn-success' data-toggle='modal' data-target='#editabrand".$this->id=$rbrands['id']."' href='#' role='button'>
        											<i class='fa fa-pencil-square' aria-hidden='true'></i>
        										</a>
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
														<form class='form-horizontal' action='../servidor/enviosPost/tipoaccionbrand.php' method='post'>
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
							</table>
						</div>";
					#modal para actualizar dato de brand

				
				mysqli_free_result($sqlBrands);
				mysqli_close($enlace);
			}
			#Genera tabla dinamica para ver las categorias y ver subcategorias mediante modals
			#Acciones disponibles Eliminar | Modificar 
			public function categoriasview(){
				#$conecta= mysqli_connect("localhost","root","","dbyaxkin");
				$conecta =mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
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
															       				<a href="../servidor/enviosPost/deletesubcategoria.php?subcategoria='.$this->id=$versubcategorias['id'].'" onclick="return confirmaDelete()" class="btn btn-warning">
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
																				      <input type="text" name="renamesubcategoria" class="form-control" id="subcategoria" placeholder="Nuevo nombre para subcategoria" required>
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
												    		<option disabled selected value>Asignar a la categoria</option>
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
												      <input type="text" name="categoria" class="form-control" id="subcategoria" placeholder="Agrega una Sub-categoria" required>
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
												      <input type="text" name="renamecategoria" class="form-control" id="subcategoria" placeholder="Nuevo nombre de categoria" required>
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
								    <a href="../servidor/enviosPost/deletecategorie.php?idcategoria='.$this->id= $verconsulta['id'].'" data-toggle="modal" data-target="#" onclick="return confirmaDelete()" class="btn btn-warning">
								    		<i class="fa fa-trash faSpace" aria-hidden="true"></i>Eliminar</a>  | 
								    <a href="#" data-toggle="modal" data-target="#editcategoria'.$this->id=$verconsulta['id'].'" class="btn btn-info">
								    		<i class="fa fa-pencil-square faSpace" aria-hidden="true"></i>Modificar</a>
								</td>
					      	</tr>									
						 ';
					mysqli_free_result($consultaParent);
					mysqli_free_result($consultaView2);
				}

				mysqli_free_result($consultaView);
				mysqli_close($conecta);
			}
			#genera genera la consulta para mostrar todos los datos de la tabla brand
			public function productype(){
				#$conecta= mysqli_connect("localhost","root","","dbyaxkin");
				$conecta = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');

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
				$conecta =mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
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
				$conectar= mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
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
				$conecta= mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');

				$listaproductos = mysqli_query($conecta,"SELECT * FROM productos");

				if (mysqli_num_rows($listaproductos)>0) {
					while ($showlistproductos= mysqli_fetch_assoc($listaproductos)) {
						$sqlproductype2 = mysqli_query($conecta,"SELECT id,marca FROM brand");
						$sqlistcategorias2 = mysqli_query($conecta, "SELECT id,categoria FROM categorias  WHERE parent='0' ");
						$sqlsubcategorieslist2 = mysqli_query($conecta,"SELECT id,categoria FROM categorias WHERE parent <> 0");
						$sqltallascantidades = mysqli_query($conecta,"SELECT tallas,cantidad FROM tallas_cantidades WHERE productos_id = '".$this->id=$showlistproductos['id']."' ");
						$cantidades = mysqli_query($conecta,"SELECT id_tc,tallas,cantidad FROM tallas_cantidades WHERE productos_id = '".$this->id=$showlistproductos['id']."' ");
						#$tallass = $this->tallas=$showlistproductos['tallas'];
						#$arrayTallas2 = explode(',', $tallass);
						
						echo "<tr>";
							echo "<td> <img class='imgthumLP' src='../cpanel/products/".$this->img_producto= $showlistproductos['img_producto']."'></td>";
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
			        				echo $this->tallas= $tallascantidades['tallas']." : ".$this->cantidad = $tallascantidades['cantidad']."</br>";
								}
							echo "</td>";
							echo "<td width='160px'>".$this->descripcion=$showlistproductos['descripcion']."</td>";
							echo '<td>
									<a href="../servidor/enviosPost/deleteproducto.php?productodelete='.$this->id=$showlistproductos['id'].'&imgdelete='.$this->img_producto= $showlistproductos['img_producto'].'" onclick="return confirmaDelete()" class="btn btn-warning">
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
									        	<form action="../servidor/enviosPost/updateproductos.php" method="POST" enctype="multipart/form-data">
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
											        			<h3 class="titleopciones">Agregar Tallas y Cantidad de articulos</h3>
												        		';

												        		$i=1;
					        									while ($tcantidades = mysqli_fetch_array($cantidades)) {
					        										echo '
																	<div class="form-group spacesizes">
													        			<div class="col-md-6">
														  					<label class="checkbox-inline paddingespace">
														  						<input type="hidden" name="idtc'.$i.'" value="'.$this->tallas = $tcantidades["id_tc"].'">
						  														<input type="checkbox"  name="size'.$i.'" class="hidebtncheck" checked value="'.$this->tallas = $tcantidades["tallas"].'">'.$this->tallas = $tcantidades["tallas"].'
																			</label>								        				
													        			</div>
													        			<div class="col-md-6">
													        				<input type="number" min="0" max="30" class="form-control" name="cantidad'.$i.'" id="inlineCheckbox" placeholder="cantidad" value="'.$this->cantidad =$tcantidades["cantidad"].'">
													        			</div>
																	</div>
					        										';
					        										$i++;
																}

						echo '						
					        								</div>
											        		<div class="form-group col-md-5">
											        			<h3 class="titleopciones">Producto Destacado</h3>
											        			<div class="contentradio">
												        			';
												        			if ($this->destacado=$showlistproductos['destacado']== 1) {
												        				echo "
												        					<input type='radio' name='destacado'  value='1' class='inputdestacado' checked>SI
												        					<input type='radio' name='destacado'  value='0' class='inputdestacado' >NO";
												        			}else{
												        				echo "
												        					<input type='radio' name='destacado'  value='1' class='inputdestacado' >SI
												        					<input type='radio' name='destacado'  value='0' class='inputdestacado' checked>NO";	
												        			}
						echo '					        			</div>
											        		</div>


											        	</div>
											        </div>
											        <div class="row">
											        	<div class="form-group col-md-6">
											        		<button type="button" class="btn btn-default btn-block" data-dismiss="modal">Cancelar</button>
											       		</div>
											       		<div class="form-group col-md-6">
											       			<button type="submit" class="btn btn-success btn-block" >Actualizar</button>
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
							
						mysqli_free_result($sqlproductype2);
						mysqli_free_result($sqlistcategorias2);
						mysqli_free_result($sqlsubcategorieslist2);
						mysqli_free_result($sqltallascantidades);
						mysqli_free_result($cantidades);
					}
				}else{
						echo "Sin productos agregados";
				}
				

				mysqli_free_result($listaproductos);

				mysqli_close($conecta);

			}
			public function productsbycategorie(){
				$enlace = mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
				$productcategorie2= mysqli_query($enlace,"SELECT * FROM productos WHERE categorias_id ='{$this->idcategorie}'");
						
					if($this->idcategorie ==1){
						while ($showproductscat = mysqli_fetch_array($productcategorie2)) {
							$productscat2= mysqli_query($enlace,"SELECT tallas,cantidad FROM tallas_cantidades WHERE productos_id='".$this->id=$showproductscat['id']."'");
							echo "  <form class='formaddcart'>";
								echo "  <div class='col-xs-12 col-sm-6 col-md-3 col-md-4'>
						    				<div class='thumbnail'>
						     	 				<img src='cpanel/products/".$this->img_producto=$showproductscat['img_producto']."' class='img-responsive' alt='guayaberas Yaxkin'>
						      					<div class='caption'>
						        					<h3 class='titleProduct'>".$this->titulo=$showproductscat['titulo']."</h3>
						        					<p class='price1'><span class='titlespan'>Precio actual:</span><span class='pricespan'>$".number_format($this->price=$showproductscat['price'],2)." Pesos</span></p>
						        					<div class='form-group margincaptioninfo'>
						        						<a data-toggle='modal'  href='#' data-target='#productoitem".$this->id=$showproductscat['id']."' class='btn btn-info btn-block'><i class='fa fa-eye faSpace' aria-hidden='true'></i>Detalles del producto</a>
						        					</div>
						        	 ";
												echo "<div class='modal fade ' id='productoitem".$this->id=$showproductscat['id']."' role='dialog'>
													    <div class='modal-dialog modal-lg'>
													      <div class='modal-content '>
													        <div class='modal-header'>
													          <button type='button' class='close' data-dismiss='modal'>&times;</button>
													          <h4 class='modal-title'>".$this->titulo=$showproductscat['titulo']."</h4>
													        </div>
													        <div class='modal-body'>
																<div class='row'>

													        		<div class='tallascontainer col-md-6'>
													        			<img src='cpanel/products/".$this->img_producto=$showproductscat['img_producto']."' alt='guayaberas Yaxkin' class='img-responsive'>
													        		</div>	
													        			";

												echo "				<div class='col-md-6'>
																			<div class='form-group'>
																				<img src='cpanel/custom/medidas2.png' class='img-responsive'>
																			</div>
																			<div class='form-group'>
																				<img src='cpanel/custom/medidas.png' class='img-responsive'>
																			</div>
																		<div class='infoitem'>
													        				<p class='last-price'><span class='titlespan'>Precio Anterior:</span><span class='pricespan'>$".number_format($this->price=$showproductscat['price_list'],2)." Pesos</span></p>
													        				<p class='price'><span class='titlespan'>Precio Actual:</span><span class='pricespan'>$".number_format($this->price=$showproductscat['price'],2)." Pesos</span></p>
													        				<p class='price'>
													        					<span class='titlespan'>Descripción del producto</span></br>
													        					".$this->descripcion=$showproductscat['descripcion']."
													        				</p>

															        		<div class='form-group'>
							    												<input type='hidden' class='form-control' name='idproducto' placeholder='Nombre del producto' value='".$this->id=$showproductscat['id']."'>
							  												</div>

							  												<!--inputs hidden con info del item-->
							  												<div class='form-group'>
																				<input type='hidden' name='color' value='s/n'>
																				<input type='hidden' name='t_cuello' value='s/n'>
																				<input type='hidden' name='t_manga' value='s/n'>
																				<input type='hidden' name='t_punio' value='s/n'>
																				<input type='hidden' name='mangas' value='s/n'>
																				<input type='hidden' name='bordado' value='s/n'>
																				<input type='hidden' name='altura' value='s/n'>
																				<input type='hidden' name='peso' value='s/n'>
																				<input type='hidden' name='complex' value='s/n'>
																				<input type='hidden' name='torax' value='s/n'>
																				<input type='hidden' name='cadera' value='s/n'>
																				<input type='hidden' name='hombros' value='s/n'>
																				<input type='hidden' name='longitud' value='s/n'>
																				<input type='hidden' name='punios' value='s/n'>
																				<input type='hidden' name='biceps' value='s/n'>
																				<input type='hidden' name='tipo' value='s/n'>
																				<input type='hidden' name='cuello' value='s/n'>
							  													<input type='hidden' name='price' value='".$this->price=$showproductscat['price']."'>
							  													<input type='hidden' name='producto' value='".$this->titulo=$showproductscat['titulo']."'>
							  													<input type='hidden' name='categoriaid' value='".$this->categorias_id=$showproductscat['categorias_id']."'>
							  												</div>
											        						<div class='form-group'>
											        							<select class='form-control' name='TallCant' required >
											        								<option disabled selected value>Selecciona el tipo de producto</option>";
																        				while ($showTC2 = mysqli_fetch_array($productscat2)) {
																        					echo"<option value='".$this->tallas=$showTC2['tallas']."'>".$this->tallas=$showTC2['tallas']."Disponibles(".$this->cantidad=$showTC2['cantidad'].")</option>";
																        				}
											        			
												echo "					        </select>
											        						</div>
											        						<div class='form-group'>
											        							<input type='number' value='1' min='1' max='40' name='cantidadproductos' class='form-control' required>
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
					}else{
						while ($showproductscat = mysqli_fetch_array($productcategorie2)) {
							$productscat2= mysqli_query($enlace,"SELECT tallas,cantidad FROM tallas_cantidades WHERE productos_id='".$this->id=$showproductscat['id']."'");
							echo "  <form class='formaddcart'>";
								echo "  <div class='col-xs-12 col-sm-6 col-md-3 col-md-4'>
						    				<div class='thumbnail'>
						     	 				<img src='cpanel/products/".$this->img_producto=$showproductscat['img_producto']."' class='img-responsive' alt='guayaberas Yaxkin'>
						      					<div class='caption'>
						        					<h3 class='titleProduct'>".$this->titulo=$showproductscat['titulo']."</h3>
						        					<p class='price1'><span class='titlespan'>Precio actual:</span><span class='pricespan'>$".number_format($this->price=$showproductscat['price'],2)." Pesos</span></p>
						        					<div class='form-group margincaptioninfo'>
						        						<a data-toggle='modal'  href='#' data-target='#productoitem".$this->id=$showproductscat['id']."' class='btn btn-info btn-block'><i class='fa fa-eye faSpace' aria-hidden='true'></i>Detalles del producto</a>
						        					</div>
						        	 ";
												echo "<div class='modal fade ' id='productoitem".$this->id=$showproductscat['id']."' role='dialog'>
													    <div class='modal-dialog modal-lg'>
													      <div class='modal-content '>
													        <div class='modal-header'>
													          <button type='button' class='close' data-dismiss='modal'>&times;</button>
													          <h4 class='modal-title'>".$this->titulo=$showproductscat['titulo']."</h4>
													        </div>
													        <div class='modal-body'>
																<div class='row'>

													        		<div class='tallascontainer col-md-6'>
													        			<img src='cpanel/products/".$this->img_producto=$showproductscat['img_producto']."' alt='guayaberas Yaxkin' class='img-responsive'>
													        		</div>	
													        			";

												echo "				<div class='col-md-6'>
																		<div class='infoitemcustom'>
													        				<p class='last-price'><span class='titlespan'>Precio Anterior:</span><span class='pricespan'>$".number_format($this->price=$showproductscat['price_list'],2)." Pesos</span></p>
													        				<p class='price'><span class='titlespan'>Precio Actual:</span><span class='pricespan'>$".number_format($this->price=$showproductscat['price'],2)." Pesos</span></p>
													        				<p class='price'>
													        					<span class='titlespan'>Descripción del producto</span></br>
													        					".$this->descripcion=$showproductscat['descripcion']."
													        				</p>

															        		<div class='form-group'>
							    												<input type='hidden' class='form-control' name='idproducto' placeholder='Nombre del producto' value='".$this->id=$showproductscat['id']."'>
							  												</div>

							  												<!--inputs hidden con info del item-->
							  												<div class='form-group'>
							  												<input type='hidden' name='TallCant'>
							  												<input type='hidden' name='price' value='".$this->price=$showproductscat['price']."'>
							  												<input type='hidden' name='producto' value='".$this->titulo=$showproductscat['titulo']."'>
							  												<input type='hidden' name='categoriaid' value='".$this->categorias_id=$showproductscat['categorias_id']."'>
							  												</div>
							  												<!--Form colores-->
											        						<div class='form-group marginFG'>
																				<div class='container-fluid'>
																				  	<div class='row'>
																				  		<h3 class='txtcolor'>Selecciona un color:</h3>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='color' value='color1_03.jpg' required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/color1_03.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='color' value='color1_05.jpg' required>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/color1_05.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='color' value='color1_07.jpg' required>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/color1_07.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='color' value='color1_09.jpg' required>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/color1_09.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='color' value='color1_16.jpg' required>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/color1_16.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>


																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='color' value='color1_17.jpg' required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/color1_17.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='color' value='color1_18.jpg' required>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/color1_18.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='color' value='color1_19.jpg' required>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/color1_19.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='color' value='color1_20.jpg' required>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/color1_20.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='color' value='color1_21.jpg' required>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/color1_21.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>
																				  	</div>
																				</div>
											        						</div>
											        						<!--Form tipo cuello-->
											        						<div class='form-group marginFG'>
																				<div class='container-fluid'>
																				  	<div class='row'>
																				  		<h3 class='txtcolor'>Tipo de cuello:</h3>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='t_cuello' value='cuello_03.jpg' required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/cuello_03.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					        <input type='radio' name='t_cuello' value='cuello_05.jpg'>
																					        <div class='thumbnailformcustom'>
																					          <img src='cpanel/custom/cuello_05.jpg' class='img-responsive'/>
																					        </div>
																					      </label>
																					    </div>
																				  	</div>
																				</div>
											        						</div>
											        						<!--Tipo manga,puño y bordado-->
											        						<div class='form-group'>
											        							<div class='row'>
											        								<diV class='col-md-4'>
													        							<select class='form-control' name='t_manga' required='required'>
													        								<option disabled selected value>Selecciona un tipo de manga</option>
													        								<option>Manga-Larga</option>
													        								<option>Manga-Corta</option>
													        							</select>											        						
											        								</div>
											        								<diV class='col-md-4'>
													        							<select class='form-control' name='t_punio' required='required'>
													        								<option disabled selected value>Selecciona un tipo de puño</option>
													        								<option>Estandar</option>
													        								<option>Gemelos (Doble puño con ojal)</option>
													        								<option>Doble uso (Doble puño con ojal y boton)</option>
													        							</select>
											        								</div>
											        								<diV class='col-md-4'>
													        							<select class='form-control' name='bordado' required='required'>
													        								<option disabled selected value>Selecciona un tipo de Bordado</option>
													        								<option>Blanco</option>
													        								<option>Negro</option>
													        								<option>Tono</option>
													        							</select>
											        								</div>
											        							</diV>
											        						</div>
											        						<!--Estimado de medidas-->
											        						<div class='form-group'>
											        							<div class='row'>
											        								<div class='col-md-12'><h3 class='txtcolor' style='margin-bottom:10px;'>Estimado de tus medidas:</h3></div>
											        								<diV class='col-md-6 spaceCF'>

																						<input type='text' name='altura' required class='form-control' placeholder='Ingresa tu altura' required>			
																					</div>
											        								<diV class='col-md-6 spaceCF'>
																						<input type='text' name='peso' required class='form-control' placeholder='Ingresa tu Peso' required>
											        								</div>
											        								<diV class='col-md-12 '>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='complex' value='complex1.jpg'  required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/complex1.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='complex' value='complex2.jpg'  required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/complex2.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='complex' value='complex3.jpg'  required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/complex3.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='complex' value='complex4.jpg'  required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/complex4.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='complex' value='complex5.jpg' required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/complex5.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
																					    <div class='ColFormCustom'>
																					      <label class='text-center radio-thumbnail'>
																					          <input type='radio' name='complex' value='complex6.jpg' required>
																					          <div class='thumbnailformcustom'>
																					            <img src='cpanel/custom/complex6.jpg' class='img-responsive'/>
																					          </div>
																					      </label>
																					    </div>
											        								</div>
											        							</diV>
											        						</div>
											        						<!--Medidas a detalle-->
											        						<div class='form-group'>
											        							<h3 class='txtcolor' style='margin-bottom:10px;'>Estimado de tus medidas:</h3>
											        							<diV class='col-md-12 spaceCF'>
																					<input type='text' name='cuello' required class='form-control' placeholder='Ingresa tu Cuello' required>			
																				</div>
											        						</div>
											        						<div class='form-group'>
											        							<diV class='col-md-12 spaceCF'>
																					<input type='text' name='torax' required class='form-control' placeholder='Ingresa tu Toráx' required>
											        							</div>
											        						</div>
											        						<div class='form-group'>
											        							<diV class='col-md-12 spaceCF'>
																					<input type='text' name='cadera' required class='form-control' placeholder='Ingresa tu Cadera' required>
											        							</div>
											        						</div>
											        						<div class='form-group'>
											        							<diV class='col-md-12 spaceCF'>
																					<input type='text' name='mangas' required class='form-control' placeholder='Ingresa tu Mangas' required>
											        							</div>
											        						</div>
											        						<div class='form-group'>
											        							<diV class='col-md-12 spaceCF'>
																					<input type='text' name='hombros' required class='form-control' placeholder='Ingresa tu Hombros' required>
											        							</div>
											        						</div>
											        						<div class='form-group'>
											        							<diV class='col-md-12 spaceCF'>
																					<input type='text' name='longitud' required class='form-control' placeholder='Ingresa tu Longitud' required>
											        							</div>
											        						</div>
											        						<div class='form-group'>
											        							<diV class='col-md-12 spaceCF'>
																					<input type='text' name='punios' required class='form-control' placeholder='Ingresa tu Puños' required>
											        							</div>
											        						</div>
											        						<div class='form-group'>
											        							<diV class='col-md-12 spaceCF'>
																					<input type='text' name='biceps' required class='form-control' placeholder='Ingresa tu Biceps' required>
											        							</div>
											        						</div>

											        						<div class='form-group'>
											        							<h3 class='txtcolor' style='margin-bottom:10px;'>Cantidad:</h3>
											        							<input type='number' value='1' min='1' max='40' name='cantidadproductos' class='form-control' required>
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
					}

				
				mysqli_free_result($productcategorie2);
				mysqli_close($enlace);
			}
			/*Funcionando al 100%*/
			public function ventasList(){
				$conecta= mysqli_connect('localhost','yaxkingu_ecommer','medalofhonor1993yaxkin','yaxkingu_ecommerce');
				$showventas = mysqli_query($conecta,"SELECT * FROM ventas");

				if (mysqli_num_rows($showventas)>0) {
					while ($rshowventas = mysqli_fetch_array($showventas)) {
						if ($rshowventas["status"]==1) {
							echo "<tr class='bg-success'>";
						}else{
							echo "<tr>";
						}
							echo "<td>".$rshowventas["NumCompra"]."</td>";
							echo "<td>".$rshowventas["producto"]."</td>";
							if ($rshowventas["tipo"]=='stock') {
								echo "<td>".$rshowventas["tipo"]."</td>";
							}else{
								echo "<td>Personalizado</td>";
							}

							if ($rshowventas["status"] ==1) {
								echo "<td>Pagado</td>";
							}else{
								echo "<td>No Pagado</td>";
							}
							echo "<td>".$rshowventas["talla"]."</td>";
							echo "<td>".$rshowventas["cantidad_venta"]."</td>";
							echo "<td>".$rshowventas["fecha_compra"]."</td>";
							if ($rshowventas["color"]== "s/n") {
							echo "<td><i class='fa fa-times' aria-hidden='true'></i></td>";
							}else{
							echo "<td> <img src='custom/".$rshowventas["color"]."' class='img-responsive' ></td>";
							}
							if ($rshowventas["t_cuello"]="s/n") {
							echo "<td><i class='fa fa-times' aria-hidden='true'></i></td>";
							}else{
							echo "<td><img src='custom/".$rshowventas["t_cuello"]."' class='img-responsive' ></td>";
							}

							echo "<td>".$rshowventas["manga"]."</td>";
							echo "<td>".$rshowventas["t_punio"]."</td>";
							echo "<td>".$rshowventas["bordado"]."</td>";
							echo "<td>".$rshowventas["altura"]."</td>";
							echo "<td>".$rshowventas["peso"]."</td>";
							if ($rshowventas["complex"]=="s/n") {
							echo "<td><i class='fa fa-times' aria-hidden='true'></i></td>";
							}else{
							echo "<td><img src='custom/".$rshowventas["complex"]."' class='img-responsive' ></td>";	
							}
							
							echo "<td>".$rshowventas["torax"]."</td>";
							echo "<td>".$rshowventas["cadera"]."</td>";
							echo "<td>".$rshowventas["mangas"]."</td>";
							echo "<td>".$rshowventas["hombros"]."</td>";
							echo "<td>".$rshowventas["longitud"]."</td>";
							echo "<td>".$rshowventas["punios"]."</td>";
							echo "<td>".$rshowventas["biceps"]."</td>";
							echo "<td>".$rshowventas["price"]."</td>";
							echo "<td>".$rshowventas["payer_email"]."</td>";
							echo "<td>".$rshowventas["address_name"]."</td>";
							echo "<td>".$rshowventas["address_country"]."</td>";
							echo "<td>".$rshowventas["address_country_code"]."</td>";
							echo "<td>".$rshowventas["address_state"]."</td>";
							echo "<td>".$rshowventas["address_city"]."</td>";
							echo "<td>".$rshowventas["address_street"]."</td>";
							echo "<td>".$rshowventas["txtid"]."</td>";
						echo "</tr>";
					}

				}
				mysqli_free_result($showventas);
				mysqli_close($conecta);
			}
	}

?>