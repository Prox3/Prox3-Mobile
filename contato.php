<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Prox3 - Contato</title>
<meta name="viewport" content="width=device-width,user-scalable=no">
<meta name="viewport" content="width=device-width, minimum-scale=1,maximum-scale=1">
<style type="text/css">
	body{background:#2c2c2b; margin:0}
	.content{width:281px; margin:20px auto;}
	.left{float:left !important} .right{float:right !important}
	.font{font-family:Helvetica, "Trebuchet MS"}
	.breadcrumbs{width:75%; height:20px; color:#6c6c6b; margin-bottom:56px}
	.contact{width:100%; height:21px; background:#dcdb00; color:#7e7d08; text-align:center; padding-top:4px; font-size:12px; margin-bottom:43px; text-decoration:none}
	label{width:100%; height:auto; float:left; font-family:Helvetica, "Trebuchet MS"; font-size:12px; color:#727272; font-weight:bold; margin-bottom:2px}
	input{width:96%; height:26px; background:#555554; border:none; padding-left:6px; color:#FFF; font-family:Helvetica, "Trebuchet MS"; font-size:12px; margin-bottom:20px; border-radius:0; float:left}
	textarea{width:98%; height:109px; background:#555554; border:none; border-radius:0; float:left; font-family:Helvetica, "Trebuchet MS"; color:#FFF}
	button{width:74px; height:26px; border:none; background:url(images/bt_send.jpg) no-repeat; text-indent:-9000px; float:right; margin:15px 2px 55px 0; padding-bottom:35px;}
	.bt_back{width:52px; height:52px; background:url(images/back_contato.jpg) no-repeat; margin-top:-20px}
	#alert{width:70%; height:20px; color:#FFF; font-size:12px; display:none; margin-top:21px}
	@media screen and (min-width:320px) {}
	@media screen and (min-width:480px) {}
	@media screen and (min-width:768px) {}
	@media screen and (min-width:600px) {}
	@media screen and (min-width:992px) {}
</style>
<script src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
    $("button").click(function(){
			var v_name = $("#name").val();
			var v_email = $("#email").val();
			var v_msg = $("#msg").val();
			
			// Valida e-mail
			er = /^[a-zA-Z0-9][a-zA-Z0-9\._-]+@([a-zA-Z0-9\._-]+\.)[a-zA-Z-0-9]{2}/;
			if(er.exec(v_email)){
				email_validate = 1;
			}else{
				email_validate = 0;
			}
			
			if(v_name == "" || v_email == "" || v_msg == ""){
				$("#alert").text("Todos os campos são obrigatórios!");
				$("#alert").show();
			}else if(email_validate == 0){
				$("#alert").text("E-mail inválido!");
				$("#alert").show();
			}else{
				$("#alert").text("Mensagem enviada. Obrigado!");
				$("#alert").show();
				$.post("email/send_message.php", {name: v_name, email: v_email, msg: v_msg});
			}
		});
  });
</script>
</head>

<body>
	<div class="content">
  	<a target="_self" href="./" class="bt_back right"></a>
  	<span class="breadcrumbs font left">prox3 &gt; <font color="#cbcb49">contato</font></span>
    <a class="contact font left" href="mailto:contato@prox3.com.br">contato@prox3.com.br</a>
    <label>Nome</label>
    <input type="text" id="name" />
    <label>E-mail</label>
    <input type="email" id="email" />
    <label>Mensagem</label>
    <textarea id="msg"></textarea>
    <span id="alert" class="font left"></span>
    <button type="button">Enviar</button>
  </div>
</body>
</html>