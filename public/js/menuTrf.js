jQuery(window).load(function() {

		window.onresize = menuRedimensionado;

		$(".navigation  > li > a").click(function (e) { // quando clicar no link dentro da .navigation 
			if ($(this).parent().hasClass('selecionado')) {
				$(".navigation  .selecionado  ul").hide(); // ocultação popups
				$(".navigation  .selecionado").removeClass("selecionado");
			} else {
				$(".navigation  .selecionado  ul").hide(); // ocultação popups
				$(".navigation  .selecionado").removeClass("selecionado");
				if ($(this).next().length) {
					$(this).parent().addClass("selecionado"); // amostrar popup
					$(this).next().slideDown(500);
				}
			}
			e.stopPropagation();
		});
		$(".navigation  ul a ").click(function(){
			//$("ul.subs a + ul").hide("slow");
			$(this).next().toggle("slow");
		})
		$("div#top, div#container").click(function () { //quando clicar no topo ou no container
			$(".navigation  .selecionado  ul").slideUp(500); // ocultação popups
			$(".navigation  .selecionado").removeClass("selecionado");
			$("ul a + ul").hide();
			menuRedimensionado();
		});
		
		$("#menuBtn").click(function(){
			$("ul.navigation").toggle();
		});

		$(document).on('keydown',function (event) { //quando clicar na tecla esc do teclado
			if (event.keyCode === 27){ 
				$(".navigation  .selecionado ul").slideUp(500); // ocultação popups
				$(".navigation  .selecionado").removeClass("selecionado");
				$("ul a + ul").hide();
				menuRedimensionado();
				}
			});

		function menuRedimensionado(){
			var larguraJanela = window.innerWidth;
			if(larguraJanela > 700){
				$("ul.navigation").show();
			}else {
				$("ul.navigation").hide();
				}
		}

		$("#admin a.adminBtn").click(function(){
			$(this).next().toggle();
		});

		$("table tr").click(function(){
			if($(this).hasClass("ativa")){
				$(this).removeClass("ativa");
			}else{
				$(this).addClass("ativa");
			}
			
		});


});

		
		