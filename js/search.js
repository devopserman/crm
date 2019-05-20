$(function(){
//firm    
	
$('.who').bind("change keyup input click", function() {
    if(this.value.length >= 2){
        $.ajax({
            type: 'post',
            url: "search.php", 
            data: {'referal':this.value, 'data-firm-id':this.value},
            response: 'text',
            success: function(data){
                $(".search_result").html(data).fadeIn(); 
           }
       })
    }
})
    
$(".search_result").hover(function(){
    $(".who").blur(); 
})
    
$(".search_result").on("click", "li", function(){
				
		sel = $(this).text();
		
		$(".who").val(sel).attr('enabled', 'enabled');
		$(".search_result").fadeOut();
		
		
		const firm_id2 = $(this).attr('data-firm-id');
		
		
		$('[name="id_value"]').val(firm_id2);
	})

})	



