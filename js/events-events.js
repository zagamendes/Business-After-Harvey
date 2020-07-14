$(document).ready(function(){
	$("form").submit(e=>{
		e.preventDefault();

		let title = $("#input-event-title").val();

		fetch("process-event-searched.php",{
			method:"post",
			body:JSON.stringify({title:title})
		})
		.then(response=>{
			return response.json();
		})
		.then(events=>{
			if(events.length>0){
				$("#search-events").empty();
				$("#recent-events").hide();
				$("#search-events").show();
				events.forEach(event=>{
					$("#search-events").append(`<li class=list-group-item><a href='gallery'>${event.title}</a><li>`);
				})
			}
		})

	});

	$("#input-event-title").keyup(function(){
		if($(this).val().length<=0){
			$("#recent-events").show();
			$("#search-events").empty();
		}
	})
});