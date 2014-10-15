jQuery(window).load(function() {

    tamanhoLetra =parseInt($('body').css('font-size').substring(0, 2));
    tamanhoMax = 32;
    tamanhoMin = 8;
    $("#aumenta").click(function(){
        if(tamanhoLetra <= tamanhoMax){
            tamanhoLetra+=2;
            $('#conteudo').css({'fontSize': tamanhoLetra});
        }
    });

    $("#diminui").click(function(){
        if(tamanhoLetra >= tamanhoMin){
            tamanhoLetra-=2;
            $('#conteudo').css({'fontSize': tamanhoLetra});
        }
    });

    $("#normal").click(function(){
            $('#conteudo').animate({'fontSize':"16"});
            tamanhoLetra = 16;
       
    });




/*altera o table-layot para auto e cria uma div englobando a nova tabela com barra de rolagem*/




    if($("table").hasClass("noFixa")){
        $("table.noFixa").before("<div class='englobaTabelaNoFixa'>");
      $("table.noFixa").appendTo(".englobaTabelaNoFixa");

    }


    if($("table").hasClass("fixaCabecalho")){
        $("table.fixaCabecalho").before("<div class='englobaTabelaNoFixa2'>");
      $("table.fixaCabecalho").appendTo(".englobaTabelaNoFixa2");

    }




(function($) {
   $.fn.fixMe = function() {
      return this.each(function() {
         var $this = $(this),
            $t_fixed;
         function init() {
            $this.wrap('<div class="container" />');
            $t_fixed = $this.clone();
            $t_fixed.find("tbody, tfoot").remove().end().addClass("fixed").insertBefore($this);
            resizeFixed();
         }
         function resizeFixed() {
            $t_fixed.find("th").each(function(index) {
               $(this).css("width",$this.find("th").eq(index).outerWidth()+"px");
            });
         }
         function scrollFixed() {
            var offset = $(this).scrollTop(),
            tableOffsetTop = $this.offset().top,
            tableOffsetBottom = tableOffsetTop + $this.height() - $this.find("thead").height();
            if(offset < tableOffsetTop || offset > tableOffsetBottom)
               $t_fixed.hide();
            else if(offset >= tableOffsetTop && offset <= tableOffsetBottom && $t_fixed.is(":hidden"))
               $t_fixed.show();
         }
         $(window).resize(resizeFixed);
         $(window).scroll(scrollFixed);
         init();
      });
   };
})(jQuery);

$(document).ready(function(){
   $("table.fixaCabecalho").fixMe();
});
});