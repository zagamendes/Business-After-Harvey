$(document).ready(function(){
			
	$("input").blur(e=>{
		let input = e.target;
		
		if(input.value==""){
			$(input).parent().parent().removeClass("has-success has-feedback");
			$(input).parent().parent().addClass("has-error has-feedback");
			$(`span[data-key=${input.name}]`).removeClass("fas fa-check form-control-feedback")
			$(`span[data-key=${input.name}]`).addClass("fas fa-times form-control-feedback")
		
		}else{
			$(input).parent().parent().removeClass("has-error has-feedback");
			$(input).parent().parent().addClass("has-success has-feedback");
			$(`span[data-key=${input.name}]`).removeClass("fas fa-times form-control-feedback")
			$(`span[data-key=${input.name}]`).addClass("fas fa-check form-control-feedback")
		
		}
		
	})


	/*$("form").submit(async e=>{
		try{

			e.preventDefault();
			let auxForm = e.target;
			let form = new FormData(e.target);

			let objReq = {method: "POST",body:form};

			let response = await fetch("process.php",objReq);
			let data = await response.json();
			if(data.ok){
				console.log(data);
				Notification.success("Event registered with success!");
				auxForm.reset();
			}else{
				Notification.erro(data.message);
			}
		}catch(error){
			Notification.erro(error);
		}
		
				
	})*/
			
})