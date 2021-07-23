<html>
	<head>
		<meta charset="utf-8" />
    	<title>App Mail Send</title>

    	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	</head>

	<body>

		<div class="container">  

			<div class="py-3 text-center">
				<img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
				<h2>Send Mail</h2>
				<p class="lead">Seu app de envio de e-mails particular!</p>
			</div>

      		<div class="row">
      			<div class="col-md-12">
  				
					<div class="card-body font-weight-bold">
						<form action="processa_envio.php" method="post" id="form-mail">
							<div class="form-group">
								<label for="para">Para</label>
								<input type="text" class="form-control"  name="para" id="para" placeholder="joao@dominio.com.br">
							</div>

							<div class="form-group">
								<label for="assunto">Assunto</label>
								<input type="text" class="form-control" name="assunto" id="assunto" placeholder="Assundo do e-mail">
							</div>

							<div class="form-group">
								<label for="mensagem">Mensagem</label>
								<textarea class="form-control" name="mensagem" id="mensagem"></textarea>
							</div>

							<button type="submit" class="btn btn-primary btn-lg" id="button-Envia">Enviar Mensagem</button>
						</form>
					</div>
				</div>
      		</div>
      	</div>
		  <script>
				
				
			var form = document.getElementById('form-mail');

			form.addEventListener('submit', function(e) {
				document.getElementById('button-Envia').innerHTML='Carregando...';
				e.preventDefault(); // <--- isto para o envio da form

				var url = this.action; // <--- o url que processa a form
				var formData = new FormData(this); // <--- os dados da form
				var ajax = new XMLHttpRequest();
				ajax.open("POST", url, true);
				ajax.onload = function() {
					if (ajax.status == 200) {
						document.getElementById('button-Envia').innerHTML='Enviar Mensagem';
						var res = ajax.responseText; // a resposta do servidor
						// fazer algo com a resposta do servidor
						alert(res);
					} else {
					alert('Algo falhou...');
					}
				};
				ajax.send(formData);
			});
		</script>
	</body>
</html>