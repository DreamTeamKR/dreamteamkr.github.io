/*
var begins
_-global function
$-global var

*/
$filter = {}
function _setFilter(o){
	var key = o.attr('filter_id'), val = (o.attr('type') == 'checkbox'? o.prop('checked'): o.val() ), filter_name = o.attr('filter_name')
	if(val && ( filter_name != null, filter_name != undefined ) ){
		if(typeof $filter[filter_name] == 'undefined') $filter[filter_name] = {};
		$filter[filter_name][key] = { 'key' : key, 'val' : val }
	}else{
		if(typeof $filter[filter_name] != 'undefined')delete($filter[filter_name][key])
	}
}
function _search(o){
	_setFilter(o)
	//console.log();
	$.ajax({
		url: "/online_shop/?p=/search",
		type: "POST",
		data: {
			'filter':$filter,//JSON.stringify($filter)
			'url':$_GET
		},
		success: function(msg){
			$('.col-sm-9').html( msg );
		}
	})/*.done(function(data) {
		$('.col-sm-9').html( data );
	});*/ 
}
$(document).ready(function(){
    $('input[group="filter"]').each(function(a,b){
		_setFilter($(b))
	}).change(function(o){
		var o = $(this)
		_search(o) 
    }) 
    $('input[name="search_button"]').click(function(){
		_search($('input[filter_name="search",group="filter"]')) 
    }) 
	$('input[name="load_button"]').on('click',function(){
		$('input[group="load"]').each(function(a,b){
			_setFilter($(b))
		})
		$.ajax({
			url: '/online_shop/?p=/send',
			type: 'POST',
			data: {'filter':$filter},
			function(msg){
				$('.col-sm-9').html( msg );
			}
		});
	})
});
