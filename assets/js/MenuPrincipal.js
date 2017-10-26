var sidebar = false;
	
	//Funcao utilizada para quando abrir a pagina aparecer uma mensagem Conectado com sucesso!
	/*$( document ).ready(function() {
		$.alert({
			theme: 'dark',
			animation: 'zoom',
		    closeAnimation: 'scale',
			title: '',
		    content: 'Conectado com sucesso!',
		});
	});*/

	// Menu Toggle Script
	function menuToggle(){ 
      $("#wrapper").toggleClass("toggled");
      sidebar == false ?  rigthDiv() : leftDiv();
    }
    
	function rigthDiv(){
		sidebar = true;
		  $("#campos-form").removeClass("offset-lg-1 offset-md-1 col-lg-10 col-md-10");
		  $("#campos-form" ).addClass("offset-lg-2 offset-md-4 col-lg-10 col-md-8");
	}

	function leftDiv(){
		sidebar = false;
		$("#campos-form").removeClass("offset-lg-2 offset-md-4 col-lg-10 col-md-8");
		$("#campos-form" ).addClass("offset-lg-1 offset-md-1 col-lg-10 col-md-10");
	}