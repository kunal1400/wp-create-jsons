<div>
	<table width="100%" class="form-table">
		<thead>
			<tr>
				<td>Add Structure</td>
				<td>
					<select onchange="appendToBody(this)">
						<option value="">--Select--</option>
						<option value="centerMap">Center Map</option>
						<option value="fullbgimage">Full Background Image</option>
						<option value="fullmap">Full Map</option>
						<option value="leftcontentrightmap">Left Content + Right Map</option>
						<option value="rightcontentleftimage">Left Image + Right Content</option>
						<option value="rightcontentrightimage">Left Content + Right Image</option>
						<option value="formSection">Next Step Form Section</option>
					</select>
				</td>
			</tr>			
		</thead>
		<tbody id="_choosen_fields_response">
			<?php
				global $post;
				$createdJson = get_post_meta( $post->ID, "_wp_created_json", true);
				if ($createdJson) {
					$jsonArray = json_decode($createdJson, true);
					foreach ($jsonArray as $key => $value) {
						switch(true) {

							case ($key == 'centerMap' || $key == 'leftcontentrightmap' || $key == 'fullmap'):
								$returnHtml = '<tr class="mainrow">
									<td colspan="2">
										<table width="100%">
											<thead>
												<th width="20%">'.$key.'</th>
												<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
											</thead>
											<tbody>
												<tr class="form-field">
													<td width="20%">Heading</td>
													<td width="80%">
														<input 
														value="'.$value['heading'].'" 
														name="_create_json['.$key.'][heading]"type="text" /></td>								
												</tr>
												<tr class="form-field">
													<td width="20%">Content</td>
													<td width="80%">
														<textarea 
														name="_create_json['.$key.'][content]"
														>'.$value['content'].'</textarea>
													</td>
												</tr>
												<tr class="form-field">
													<td width="20%">Map Url</td>
													<td width="70%">
														<input 
														value="'.$value['mapurl'].'" 
														name="_create_json['.$key.'][mapurl]" 
														type="text" />
													</td>								
												</tr>
											</tbody>
										</table>
									</td>
								</tr>';
							break;

							case ($key == 'fullbgimage' || $key == 'leftimagerightcontent' || $key == 'rightcontentleftimage'):
								$returnHtml = '<tr class="mainrow">
									<td colspan="2">
										<table width="100%">
											<thead>
												<th width="20%">'.$key.'</th>
												<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
											</thead>
											<tbody>
												<tr class="form-field">
													<td width="20%">Heading</td>
													<td width="80%">
														<input 
														name="_create_json['.$key.'][heading]"
														value="'.$value['heading'].'" 
														type="text" 
														/></td>								
												</tr>
												<tr class="form-field">
													<td width="20%">Content</td>
													<td width="80%">
														<textarea			
														name="_create_json['.$key.'][content]">'.$value['content'].'</textarea>
														</td>
												</tr>
												<tr class="form-field">
													<td width="20%">Image Url</td>
													<td width="70%">
														<input 
														name="_create_json['.$key.'][imageurl]" 
														value="'.$value['imageurl'].'" 
														type="text" 
														/>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>';
							break;

							case $key == 'formSection':
								$returnHtml = '<tr class="mainrow">
									<td colspan="2" width="100%">
									<table width="100%">
											<thead>
												<th width="20%">'.$key.'</th>
												<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
											</thead>
											<tbody>						
												<tr class="form-field">
													<tr class="form-field">
														<td width="20%">Answer</td>
														<td width="80%">
															<input 
															name="_create_json['.$key.'][answer]" 
															value="'.$value['answer'].'" 
															type="text" 
															/>
														</td>								
													</tr>
													<tr class="form-field">
														<td width="20%">Next Page ID</td>
														<td width="80%">
															<input 
															name="_create_json['.$key.'][nextpageid]" 
															type="text"
															value="'.$value['nextpageid'].'" 
															/>
														</td>		
													</tr>
												</tr>								
											</tbody>
										</table>
									</td>
								</tr>';
							break;

							default:
								$returnHtml = '<tr class="mainrow">
									<td colspan="2">
										<table width="100%">
											<thead>
												<th width="20%">'.$key.'</th>
												<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
											</thead>
											<tbody>						
												<tr class="form-field">
													<td width="20%">Heading</td>
													<td width="80%">
														<input 
														name="_create_json['.$key.'][heading]"
														value="'.$value['heading'].'" 
														type="text" 
														/>
													</td>								
												</tr>
												<tr class="form-field">
													<td width="20%">Content</td>
													<td width="80%">
														<textarea 
														name="_create_json['.$key.'][content]" 
														>'.$value['content'].'</textarea>
													</td>
												</tr>
											</tbody>
										</table>
									</td>
								</tr>';
						}
						echo $returnHtml;
					}
				}
			?>
		</tbody>
	</table>
</div>