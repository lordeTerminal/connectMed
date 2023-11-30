<!DOCTYPE html>
<hmtl lang="pt">
<head>
        <meta charset="utf-8">
        <title>GMUD Matarazzo</title>

 <!-- <style>
body {
background-image: url('imagens/logo.jpeg');
background-repeat: no-repeat;
background-position: center center;
background-attachment: fixed;
background-size: cover;
}
</style>
-->
</head>
<body>
<h1>gestão de mudanças Matarazzo</h1>

<form>
<fieldset>
	<legend>descrição:</legend>
	<table>
		<tr>
			<td>
				<label for="change_title">Titulo da Mudança:</label>
			</td>
			<td>
				<input type="text" id="change_title" name="change_title">
			</td>
			</tr>
		<tr>
			<td>
				<label for="change_number">Numero:</label>
  			</td>
			<td>
				<input type="text" id="change_number" name="change_number">
			</td>
		</tr>
		<tr>
			<td>
				<label for="change_reason">Razão da mudança:</label>
			</td>
			<td>
				<textarea id="change_reason" name="change_reason"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<label for="change_description">Detalhamento sobre a execução:</label>
			</td>
			<td>
				<textarea id="change_description" name="change_description"></textarea>
			</td>
		</tr>
		<tr>
			<td>
				<label for="change_type">Tipo da Change:</label>
				<select id="change_type" name="change_type">
					<option value="programada">programada</option>
					<option value="padrao">padrão</option>
					<option value="emergencial">Emergencial</option>
					<option value="Outro">Outro</option>
				</select>
			</td>
			<td>
				<label for="affected_areas">Origem:</label>
				<input type="radio" id="area1" name="affected_areas" value="requisicao">Requisição
				<input type="radio" id="area2" name="affected_areas" value="incidentes">Incidente
				<input type="radio" id="area3" name="affected_areas" value="problema">Problema
				<input type="radio" id="area4" name="affected_areas" value="projeto">Projeto
			</td>
		</tr>
		<tr>
			<td>
				<label for="celula">Celula:</label>
				<input type="radio" id="celula1" name="celula" value="operacoes">operações
				<input type="radio" id="celula2" name="celula" value="sap">SAP
				<input type="radio" id="celula3" name="celula" value="infraestrutura">Infraestrutura
				<input type="radio" id="celula4" name="celula" value="superapp">Super App
			</td>
			<td>
				<label for="ambiente">Ambiente:</label>
				<input type="radio" id="ambiente1" name="ambiente" value="producao">produção
				<input type="radio" id="ambiente2" name="ambiente" value="preprod">pre-produção
				<input type="radio" id="ambiente3" name="ambiente" value="desenvolvimento">desenvolvimento
			</td>
		</tr>
		<tr>
			<td>
				<label for="finalidade">Finalidade:</label>
				<input type="radio" id="finalidade1" name="finalidade" value="fisco">Melhoria Fiscal/Legal
				<input type="radio" id="finalidade2" name="finalidade" value="funcional">Melhoria Funcional
				<input type="radio" id="finalidade3" name="finalidade" value="corretiva">Corretiva
				<input type="radio" id="finalidade4" name="finalidade" value="preventiva">Preventiva
				<input type="radio" id="finalidade3" name="finalidade" value="correcaomudanca">Correção de Mudança Upgrade
				<input type="radio" id="finalidade3" name="finalidade" value="projeto">Projeto
			</td>
			<td>
				<label for="change_previous_number">Numero da change anterior:</label>
				<input type="text" id="change_previous_number" name="change_previous_number">
			</td>
		</tr>
		<table>
  </fieldset>
  
  <fieldset>
	  <legend>prioridade</legend>
	      <label for="prioridade">Prioridade:</label>
  <input type="radio" id="finalidade1" name="prioridade" value="critica">Crítica
  <input type="radio" id="finalidade2" name="prioridade" value="urgente">Urgente
  <input type="radio" id="finalidade3" name="prioridade" value="altissima">Altissima
  <input type="radio" id="finalidade4" name="prioridade" value="alta">Alta
  <input type="radio" id="finalidade3" name="prioridade" value="padrao">Padrão

  </fieldset>

  <fieldset>
	  <legend>pessoal envolvido</legend>
	  <table>
		<tr>
			<!--primeira linha-->
			<td><label>requisitante</label></td> 
			<td><input type="text" id="requisitante" name="requisitante"></input></td>
			<td><label>Área</label></td>
			<td><input type="text" id="arearequisitante" name="arearequisitante"></input></td>
	 	</tr>
			  <!--segunda linha-->
		<tr>
			<td><label>Responsável pela Mudança</label></td>
                        <td><input type="text" id="responsavelmudanca" name="responsavelmudanca"></input></td>
                        <td><label>Área</label></td>
			<td><input type="text" id="arearesponsavelmudanca" name="arearesponsavelmudanca"></input></td>
		</tr>
			  <!--terceira linha-->
		<tr>
			<td><label>Usuário Chave</label></td>
                        <td><input type="text" id="usuariochave" name="usuariochave"></input></td>
                        <td><label>Área</label></td>
			<td><input type="text" id="areasuariochave" name="areausuariochave"></input></td>
		</tr>
	  </table>
</fieldset>  
  

  <fieldset>
	  <legend>Tempos</legend>
	  <table>
		  <tr>
			  <td>data de inicio</td>
			  <td><input type="datetime-local" name="datainicio" id="datainicio"></td>
			  <td>data limite</td>
                          <td><input type="datetime-local" name="datalimite" id="datalimite"></td>

		  </tr>
		  <tr>
			  <td>Data Implantação</td>
			  <td><input type="datetime-local" name="dataimplantacao" id="dataimplantacao"></td>
                          <td>Haverá indisponibilidade?</td>
                          <td>
				  <input type="radio" id="indisponibilidade1" name="indisponibilidade" value="sim">sim
  				  <input type="radio" id="indisponibilidade2" name="indisponibilidade" value="nao">Não
			  </td>
                  </tr>
		  <tr>
			  <td>Quanto tempo</td>
			  <td><input type="text" name="quantotempo" id="quantotempo"></td>
			  <td>Janela acordada</td>
			  <td>
                                  <input type="radio" id="janelaacordada1" name="janelaacordada" value="sim">sim
                                  <input type="radio" id="janelaacordada2" name="janelaacordada" value="nao">Não

			  </td>
		  </tr>

		  <tr>
                          <td>Com quem?</td>
                          <td><input type="text" name="comquem" id="comquem"></td>
                          <td>Agendar parada no monitoramento?</td>
                          <td>
                                  <input type="radio" id="agendarparada1" name="agendarparada" value="sim">sim
                                  <input type="radio" id="agendarparada2" name="agendarparada" value="nao">Não

			  </td>
                  </tr>
		  
                  <tr>
                          <td>Há pendencia de outra mudança para a execução desta?</td>
                          <td>
                                  <input type="radio" id="dependenciamudanca1" name="dependenciamudanca" value="sim">sim
                                  <input type="radio" id="dependenciamudanca2" name="dependenciamudanca" value="nao">Não

                          </td>
			  <td>Qual?</td>
                          <td><input type="text" name="qualmudanca" id="qualmudanca"></td>
                  </tr>
		  <tr>
			  <td>Período de Revisão pós-Implantação</td>
		          <td>data de inicio</td>
                          <td><input type="datetime-local" name="datainicioimplantacao" id="datainicioimplantacao"></td>
                          <td>data limite</td>
                          <td><input type="datetime-local" name="datalimiteimplantacao" id="datalimiteimplantacao"></td>
		  </tr>
	  </table>
</fieldset>

  <fieldset>
          <legend>Serviços e itens de configuração Envolvidos</legend>
          <table>
                <tr>
                        <td><label>serviço beneficiado pela mudança</label></td>
                        <td><input type="text" id="beneficiadomudanca" name="beneficiadomudanca"></input></td>
		</tr>
		<tr>
                        <td><label>Serviço impactado pela mudança</label></td>
                        <td><input type="text" id="impactadomudanca" name="impactadomudanca"></input></td>
                </tr>
                <tr>
                        <td><label>Serviço Tecnico Associado/Impactado</label></td>
                        <td><input type="text" id="servicoassociado" name="servicoassociado"></input></td>
		</tr>
		<tr>
			<td><label>Item de Configuração Associado / Impactado</label></td>
                        <td><input type="text" id="icassociado" name="icassociado"></input></td>
                </tr>
                <tr>
                        <td><label>recomendações para execução da mudança</label></td>
                        <td><input type="text" id="recomendacaoexecucao" name="recomendacaoexecucao"></input></td>
                </tr>
          </table>

  </fieldset>


  <fieldset>
	  <legend>Risco e Impacto</legend>
	  <table>
		  <tr>
			  <td>
                          <label>risco</label>
			  </td>
			  <td>
			<input type="radio" id="risco1" name="risco" value="serio">serio
			  </td>
			  <td>
				  <input type="radio" id="risco2" name="risco" value="toleravel">tolerável
			  </td>
			  <td>
				  <input type="radio" id="risco3" name="risco" value="desprezivel">desprezivel

			  </td>
		  </tr>
		  <tr>
                          <td>
				<label>impacto</label>
                          </td>
                          <td>
				  <input type="radio" id="impacto1" name="impacto" value="alto">alto

                          </td>
                          <td>
				  <input type="radio" id="impacto2" name="impacto" value="medio">medio

                          </td>
                          <td>
				  <input type="radio" id="impacto3" name="impacto" value="baixo">baixo

                          </td>
                  </tr>
	  </table>
  </fieldset>

  <fieldset>
	  <legend>Descrição do Risco e Impacto</legend>
	  <table>
		  <tr>
			  <td>
				  <label>Descrição do Risco</label>
			  </td>
			  <td>
				  <textarea id="descricaorisco" name="descricaorisco"></textarea>
			  </td>
		  </tr>
		  <tr>
                          <td>
				  <label>Descrição do Impacto</label>
                          </td>
                          <td>
				  <textarea id="descricaoimpacto" name="descricaoimpacto"></textarea>
                          </td>

		  </tr>

	  </table>

  </fieldset>

  <fieldset>
          <legend>Plano de Comunicação</legend>
          <table>
                  <tr>
                          <td>
                                  <label>Publico</label>
                          </td>
                          <td>
				  <label>Canal</label>
                          </td>
                          <td>
                                  <label>Responsável</label>
                          </td>
                          <td>
				  <label>Quando</label>
                          </td>
                  </tr>
                  <tr>
                          <td>
                                  <input type="text" id="commpublico" name="commpublico">
                          </td>
                          <td>
				  <input type="text" id="commcanal" name="commcanal">
                          </td>
                          <td>
				  <input type="text" id="commresponsavel" name="commresponsavel">
                          </td>
                          <td>
				  <input type="text" id="commquando" name="commquando">
                          </td>
                  </tr>
          </table>

  </fieldset>
  <fieldset>
          <legend>Descrição tecnica do item de configuração ou serviço afetado</legend>
          <table>
                  <tr>
                          <td>
                                  <label>Nome do Dispositivo</label>
                          </td>
                          <td>
                                  <label>Serial</label>
                          </td>
                          <td>
                                  <label>Modelo</label>
                          </td>
                          <td>
                                  <label>Responsável</label>
                          </td>
                  </tr>
                  <tr>
                          <td>
                                  <input type="text" id="nomedispositivo" name="nomedispositivo">
                          </td>
                          <td>
                                  <input type="text" id="serial" name="serial">
                          </td>
                          <td>
                                  <input type="text" id="modelo" name="modelo">
                          </td>
                          <td>
                                  <input type="text" id="responsavel" name="responsavel">
                          </td>
                  </tr>
		  <tr>
                          <td>
                                  <input type="text" id="nomedispositivo1" name="nomedispositivo1">
                          </td>
                          <td>
                                  <input type="text" id="serial1" name="serial1">
                          </td>
                          <td>
                                  <input type="text" id="modelo1" name="modelo1">
                          </td>
                          <td>
                                  <input type="text" id="responsavel1" name="responsavel1">
                          </td>
                  </tr>
		  <tr>
                          <td>
                                  <input type="text" id="nomedispositivo2" name="nomedispositivo2">
                          </td>
                          <td>
                                  <input type="text" id="serial2" name="serial2">
                          </td>
                          <td>
                                  <input type="text" id="modelo2" name="modelo2">
                          </td>
                          <td>
                                  <input type="text" id="responsavel2" name="responsavel2">
                          </td>
                  </tr>
          </table>

  </fieldset>
  <fieldset>
	  <legend>Plano de Execução de Mudança</legend>
	  <table>

		  <tr><td>0</td>
			  <td>
				  <label>Sequencia</label>
			  </td>
			  <td>
				  <label>Atividades</label>
			  </td>
			  <td>
				  <label>Tecnico Responsável</label>
			  </td>
			  
			  <td>
				  <label>Data e hora de início</label>

			  </td>
			  <td>
				  <label>Tempo previsto</label>

			  </td>
			  <td>
				  <label>Atividade de reversão</label>

			  </td>
		  </tr>
		  <tr><td>1</td>
                          <td>
				  <input type="text" name="sequencia1" id="sequencia1">
                          </td>
                          <td>
				  <input type="text" name="atividades1" id="Atividades1">
                          </td>
                          <td>
				  <input type="text" name="tecnicoresponsavel1" id="tecnicoresponsavel1">
                          </td>
			 
                          <td>
				  <input type="datetime-local" name="datahorainicio1" id="datahorainicio1">
                          </td>
			  <td>
				  <input type="text" name="tempoprevisto1" id="tempoprevisto1">
                          </td>
                          <td>
				  <input type="text" name="atividadereversao1" id="atividadereversao1">
                          </td>
                  </tr>

		                    <tr><td>2</td>
                          <td>
                                  <input type="text" name="sequencia2" id="sequencia2">
                          </td>
                          <td>
                                  <input type="text" name="atividades2" id="Atividades2">
                          </td>
                          <td>
                                  <input type="text" name="tecnicoresponsavel2" id="tecnicoresponsavel2">
                          </td>

                          <td>
                                  <input type="datetime-local" name="datahorainicio2" id="datahorainicio2">
                          </td>
                          <td>
                                  <input type="text" name="tempoprevisto2" id="tempoprevisto2">
                          </td>
                          <td>
                                  <input type="text" name="atividadereversao2" id="atividadereversao2">
                          </td>
                  </tr>
                  <tr><td>3</td>
                          <td>
                                  <input type="text" name="sequencia3" id="sequencia3">
                          </td>
                          <td>
                                  <input type="text" name="atividades3" id="Atividades3">
                          </td>
                          <td>
                                  <input type="text" name="tecnicoresponsavel3" id="tecnicoresponsavel3">
                          </td>

                          <td>
                                  <input type="datetime-local" name="datahorainicio3" id="datahorainicio3">
                          </td>
                          <td>
                                  <input type="text" name="tempoprevisto3" id="tempoprevisto3">
                          </td>
                          <td>
                                  <input type="text" name="atividadereversao3" id="atividadereversao3">

                          </td>
                  </tr>
                  <tr><td>4</td>
                          <td>
                                  <input type="text" name="sequencia4" id="sequencia4">
                          </td>
                          <td>
                                  <input type="text" name="atividades4" id="Atividades4">
                          </td>
                          <td>
                                  <input type="text" name="tecnicoresponsavel4" id="tecnicoresponsavel4">
                          </td>

                          <td>
                                  <input type="datetime-local" name="datahorainicio4" id="datahorainicio4">
                          </td>
                          <td>
                                  <input type="text" name="tempoprevisto4" id="tempoprevisto4">
                          </td>
                          <td>
                                  <input type="text" name="atividadereversao4" id="atividadereversao4">
                          </td>
                  </tr>




	  </table>
  </fieldset>

  
  <fieldset>
          <legend>Plano de testes após a Execução de Mudança</legend>
          <table>

                  <tr><td>0</td>
                          <td>
                                  <label>Sequencia</label>
                          </td>
                          <td>
                                  <label>Atividades</label>
                          </td>
                          <td>
                                  <label>Tecnico Responsável</label>
                          </td>

                          <td>
                                  <label>Tempo previsto</label>

                          </td>
                  </tr>
		  <tr><td>1</td>
                          <td>
				  <input type="text" name="sequenciapos1" id="sequenciapos1">
                          </td>
                          <td>
				  <input type="text" name="atividadepos1" id="atividadepos1">
                          </td>
			  <td>
				  <input type="text" name="tecnicoresponsavelpos1" id="tecnicoresponsavelpos1">
                          </td>

                          <td>
				  <input type="text" name="tempoprevistopos1" id="tempoprevistopo1">

                          </td>
                  </tr>
		  <tr><td>2</td>
                          <td>
                                  <input type="text" name="sequenciapos2" id="sequenciapos2">
                          </td>
                          <td>
                                  <input type="text" name="atividadepos2" id="atividadepos2">
                          </td>
                          <td>
                                  <input type="text" name="tecnicoresponsavelpos2" id="tecnicoresponsavelpos2">
                          </td>

                          <td>
                                  <input type="text" name="tempoprevistopos2" id="tempoprevistopos2">

                          </td>
                  </tr>
<tr><td>3</td>
                          <td>
                                  <input type="text" name="sequenciapos3" id="sequenciapos3">
                          </td>
                          <td>
                                  <input type="text" name="atividadepos3" id="atividadepos3">
                          </td>
                          <td>
                                  <input type="text" name="tecnicoresponsavelpos3" id="tecnicoresponsavelpos3">
                          </td>

                          <td>
                                  <input type="text" name="tempoprevistopos3" id="tempoprevistopos3">

                          </td>
                  </tr>
<tr><td>4</td>
                          <td>
                                  <input type="text" name="sequenciapos4" id="sequenciapos4">
                          </td>
                          <td>
                                  <input type="text" name="atividadepos4" id="atividadepos4">
                          </td>
                          <td>
                                  <input type="text" name="tecnicoresponsavelpos4" id="tecnicoresponsavelpos4">
                          </td>

                          <td>
                                  <input type="text" name="tempoprevistopos4" id="tempoprevistopos4">

                          </td>
                  </tr>


		  </fieldset>
			  </table>

			  </fieldset>


		  <input type="submit" value="Submit">
</form>

</body>
</html>