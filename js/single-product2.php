<?php
/**
 * The Template for displaying all single products.
 *
 * Override this template by copying it to yourtheme/woocommerce/single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
get_header('shop'); ?>
	<?php
		/**
		 * woocommerce_before_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
		 * @hooked woocommerce_breadcrumb - 20
		 */
		do_action('woocommerce_before_main_content');
	?>
    <div id="contentSingleProduto">
		<?php while ( have_posts() ) : the_post(); ?>

			<?php woocommerce_get_template_part( 'content', 'single-product' ); ?>

		<?php endwhile; // end of the loop. ?>

	<?php
		/**
		 * woocommerce_after_main_content hook
		 *
		 * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
		 */
		do_action('woocommerce_after_main_content');
	?>
	<?php
		/**
		 * woocommerce_sidebar hook
		 *
		 * @hooked woocommerce_get_sidebar - 10
		 */		 
		//do_action('woocommerce_sidebar');
	?>
    <div id="contentSidebarLateral">
        <div id="todasCategorias">
        </div>
        <div id="categorias" style="display:none;">
            <aside>
                <?php if ( !function_exists('dynamic_sidebar') ||
                       !dynamic_sidebar('Sidebar')) : 
                    endif;
                ?>	
            </aside>
        </div>
        <div id="relacionadosProd">
            <aside>
                <?php if ( !function_exists('dynamic_sidebar') ||
                       !dynamic_sidebar('ProdutosRelacionados')) : 
                    endif;
                ?>	
            </aside>
        </div>
    </div>
    <script>
    var $ = jQuery;
	$(document).ready(function() {
		$("#product_categories-6").removeAttr("style");
		$("#product_options h3").html("Op&ccedil;&otilde;es do produto");
        $("#todasCategorias").click(function(){
			if ($("#categorias").is(":hidden")) {
				$("#categorias").toggle("fast");
				$("#contentSingleProduto").addClass("tamanhoFixo");
			} 
			else 
			{
				$("#categorias").hide();
				$("#contentSingleProduto").removeClass("tamanhoFixo");
			}
		});
		
		var listCat = $("#categorias .cat-item a");
		$.map(listCat, function(cat,index){
			$(cat).attr("name","produtos");
			var catPai = $(cat).parent().find(".children")[0];
			if(catPai != null){
				$(cat).addClass("setaCatPai");	
				var catSubMenu = $(catPai).find(".subMenuLeft");
				if(catSubMenu.length > 0){
					$.map(catSubMenu,function(subM,index){
						$(subM).parent().append("<div class='setaCatSubMenu'></div>");	
					});
				}
			}
		});
		$("#product_image_preview img").attr("width","100%").attr("height","100%");
		


		var aux = 0;
		$($('.variations select option')[1]).attr("selected", true)
		var combo = $(".variations select").val();
		//if(combo == null || combo == ""){
		//	$("#product_price .s_current_price").text("");
		//	$("#product_price .s_old_price").text("");
		//}
			
		try{
			//$('[name*="attribute_tamanho"]').change(function(){
			$(".variations select").change(function(){
				var val = $(this).attr('value');
				if(val != null && val != "" ){
					$("#product_buy .single_variation").css("visibility","hidden");
					var promo = $('#product_price .s_old_price');
					combo = $(this).val();
					aux = 0;
					setInterval(function() {
						if(aux == 0){
								if(combo != null && combo != ""){
									var valorAtual = $("#product_buy .single_variation").find('ins').text();
									var valorAntigo = $("#product_buy .single_variation").find('del').text();
									$("#product_price .s_current_price").text(valorAtual);
									$("#product_price .s_old_price").text(valorAntigo);
								}
								else{
									$("#product_price .s_current_price").text("");
									$("#product_price .s_old_price").text("");
								}
								$("#product_price").show();
						aux++;
						}
					}, 500);
				}
				else
				$("#product_price").hide();
			});
		}
		catch(e){
		}
if(combo != null && combo != "")
	$("#product_price").css("top", ($("#product_buy").position().top + 15) + "px");
else
$("#product_price").css("top", "140px");

$(".name_product_meta").width(340);

var addons = $(".variations_form")[0];

if(addons == null){
	$(".name_product_meta").height(10);
}
			
    });
    </script>
</div>
</section>
<?php get_footer('shop'); ?>