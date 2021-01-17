function removethisrow(e) {
	jQuery(e).closest("tr.mainrow").remove();	
}

function appendToBody(e) {
	var choosenOption = jQuery(e).val()
	var choosenText = jQuery(e).find("option:selected").text()

	if (choosenOption) {
		console.log(choosenOption, "choosenOption")
		var returnHtml = ""
		switch(true) {
			case (choosenOption == 'centerMap' || choosenOption == 'leftcontentrightmap' || choosenOption == 'fullmap'):
				returnHtml = `<tr class="mainrow">
					<td colspan="2">
						<table width="100%">
							<thead>
								<th width="20%">${choosenText}</th>
								<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
							</thead>
							<tbody>
								<tr class="form-field">
									<td width="20%">Heading</td>
									<td width="80%"><input name="_create_json[${choosenOption}][heading]" type="text" /></td>								
								</tr>
								<tr class="form-field">
									<td width="20%">Content</td>
									<td width="80%"><textarea name="_create_json[${choosenOption}][content]"></textarea></td>
								</tr>
								<tr class="form-field">
									<td width="20%">Map Url</td>
									<td width="70%"><input name="_create_json[${choosenOption}][mapurl]" type="text" /></td>								
								</tr>
							</tbody>
						</table>
					</td>
				</tr>`
			break;
			case (choosenOption == 'fullbgimage' || choosenOption == 'leftimagerightcontent' || choosenOption == 'rightcontentleftimage'):
				returnHtml = `<tr class="mainrow">
					<td colspan="2">
						<table width="100%">
							<thead>
								<th width="20%">${choosenText}</th>
								<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
							</thead>
							<tbody>
								<tr class="form-field">
									<td width="20%">Heading</td>
									<td width="80%"><input name="_create_json[${choosenOption}][heading]" type="text" /></td>								
								</tr>
								<tr class="form-field">
									<td width="20%">Content</td>
									<td width="80%"><textarea name="_create_json[${choosenOption}][content]"></textarea></td>
								</tr>
								<tr class="form-field">
									<td width="20%">Image Url</td>
									<td width="70%"><input name="_create_json[${choosenOption}][imageurl]" type="text" /></td>								
								</tr>
							</tbody>
						</table>
					</td>
				</tr>`
			break;
			case choosenOption == 'formSection':
				returnHtml = `<tr class="mainrow">
					<td colspan="2" width="100%">
					<table width="100%">
							<thead>
								<th width="20%">${choosenText}</th>
								<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
							</thead>
							<tbody>						
								<tr class="form-field">
									<tr class="form-field">
										<td width="20%">Answer</td>
										<td width="80%"><input name="_create_json[${choosenOption}][answer]" type="text" /></td>								
									</tr>
									<tr class="form-field">
										<td width="20%">Next Page ID</td>
										<td width="80%"><input name="_create_json[${choosenOption}][nextpageid]" type="text" /></td>								
									</tr>
								</tr>								
							</tbody>
						</table>
					</td>
				</tr>`
			break;
			default:
				returnHtml = `<tr class="mainrow">
					<td colspan="2">
						<table width="100%">
							<thead>
								<th width="20%">${choosenText}</th>
								<th width="80%"><span onclick="removethisrow(this)" class="dashicons dashicons-trash"></span></th>
							</thead>
							<tbody>						
								<tr class="form-field">
									<td width="20%">Heading</td>
									<td width="80%"><input name="_create_json[${choosenOption}][heading]" type="text" /></td>								
								</tr>
								<tr class="form-field">
									<td width="20%">Content</td>
									<td width="80%"><textarea name="_create_json[${choosenOption}][content]"></textarea></td>
								</tr>
							</tbody>
						</table>
					</td>
				</tr>`			
		}
		jQuery("#_choosen_fields_response").append(returnHtml)
	}
}

jQuery(document).ready(function() {
	console.log('this is the admin js')
})