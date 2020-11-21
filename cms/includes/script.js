/*$("#submit").click( function(){
	var data = $("formField :input").serializeArray();

	$.post( $("#formField").attr("action"), data , function(info){ $("#result").html(info);});
	clearInput();
});

$("#formField").submit(function(){
	return false;
});

function clearInput(){
	$("#formField :input").each(function(){
		$(this).val('');
	});
}
*/
$('#select').editableSelect();
$('#symptom').editableSelect();
$('#search').editableSelect();

