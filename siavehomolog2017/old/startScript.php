<?php
$pbsrvsql = "pbsrvsql3";
$myUser = "ronycleyagra";
$myPass = "mrrm!@4mrrm";
$bancoSIACNet = "SIACNet";
$bancoSIEG = "SIEG";
$pbsrvsql2 = "pbsrvsql2";
//$bancoSIACNetTeste = "SIACNetTeste";

$indicadores = Array();
$indicadores["20133"] = Array(0 => "APLICABILIDADE",1 => "O conte�do poder� ser aplicado na sua empresa ou na sua atividade profissional");
$indicadores["20136"] = Array(0 => "INFRAESTRUTURA",1 => "A infra-instrutura foi adequada - espa�o f�sico, recurso �udio-visual, ilumina��o, mobili�rio, etc.-");
$indicadores["20137"] = Array(0 => "SATISFA��O",1 => "Voc� classificaria sua satisfa��o com o evento do SEBRAE oferecido como:");

$agencias = Array();
$agencias[0] = Array("cod" => "722","nome" => "Ag&ecirc;ncia Regional de Araruna");
$agencias[1] = Array("cod" => "005","nome" => "Ag&ecirc;ncia Regional de Cajazeiras");
$agencias[2] = Array("cod" => "007","nome" => "Ag&ecirc;ncia Regional de Campina Grande");
$agencias[3] = Array("cod" => "006","nome" => "Ag&ecirc;ncia Regional de Guarabira");
$agencias[4] = Array("cod" => "003","nome" => "Ag&ecirc;ncia Regional de Jo&atilde;o Pessoa");
$agencias[5] = Array("cod" => "008","nome" => "Ag&ecirc;ncia Regional de Monteiro");
$agencias[6] = Array("cod" => "001","nome" => "Ag&ecirc;ncia Regional de Patos");
$agencias[7] = Array("cod" => "002","nome" => "Ag&ecirc;ncia Regional de Pombal");
$agencias[8] = Array("cod" => "004","nome" => "Ag&ecirc;ncia Regional de Sousa");

$nomeAgencias = Array();
$nomeAgencias["722"] = "Ag&ecirc;ncia Regional de Araruna";
$nomeAgencias["005"] = "Ag&ecirc;ncia Regional de Cajazeiras";
$nomeAgencias["007"] = "Ag&ecirc;ncia Regional de Campina Grande";
$nomeAgencias["006"] = "Ag&ecirc;ncia Regional de Guarabira";
$nomeAgencias["003"] = "Ag&ecirc;ncia Regional de Jo&atilde;o Pessoa";
$nomeAgencias["008"] = "Ag&ecirc;ncia Regional de Monteiro";
$nomeAgencias["001"] = "Ag&ecirc;ncia Regional de Patos";
$nomeAgencias["002"] = "Ag&ecirc;ncia Regional de Pombal";
$nomeAgencias["004"] = "Ag&ecirc;ncia Regional de Sousa";

$projetosAgencias = Array();
$projetosAgencias['722'] = "'78E87A68-F4C6-4666-9937-0418E59C28C5','2DF6A70D-AAEA-4BFA-9D72-1C812ED57FF5','BA6DD3FB-F466-4E46-B401-FAE95C858626'";
$projetosAgencias['005'] = "'1E3AFF8C-ED2D-4FEA-8269-EF59639682C4','1B5CFA69-FEED-45C9-A113-F2FB883A53BF'";
$projetosAgencias['007'] = "'65EB56A3-25C1-4B87-84AE-0ADED59E988C','FEF43513-B302-4219-899E-142C243ED916','F108200F-4D5F-4414-B08E-16F91C60FFB4','986B3A4E-EC97-4F58-AE94-33022AF9777E',
'B3F670F2-6598-4A0A-B39F-71E67E7B1E75','A7AB9BFA-5593-4EEA-93E2-7E6779561A2E','83D36E4C-8B46-4D53-B027-952896846657','30044284-0375-45BE-BDA4-9CD4F8BD2DD4',
'8E627C05-024D-4D37-8B88-9D820A532F39','27A33805-14ED-4CB7-B3D2-BF7EF2131094','8F76ACF6-7E1C-4A14-B916-CFC8F7FBA141','510E5DB9-0478-4D69-9E57-D5A1CDBB9CCF'";
$projetosAgencias['006'] = "'416E99D5-2798-41A7-A8BA-77143E630BDB','36A39EAC-D948-4F13-A37D-8CE0BFCC32AD','05FED0D4-6436-46AA-8634-DF0503591562'";
$projetosAgencias['003'] = "'BE4192D3-26F3-428D-96E8-09B74BDDBBA7','2BDE9807-A6BE-4DD6-A412-4E8A75F397AB','505668D8-635A-4612-9193-55FCD3766DA1',
'3AC4F328-0493-499C-8C8C-77F492607E80','9D33DEEB-27A9-4FAB-88B4-8B2A4738D5D8','35E6B8E6-036E-40FE-9FE5-8D9A57A29006',
'90351D1E-A27E-47BF-8E0A-8F08A3196D97','56B70AC6-CBB9-4196-98AB-AD6CF7E07F5D','275D8E2A-22FC-4575-A48E-BCE08E6CF922',
'CA8F4133-7D7D-4400-80E2-C6835344D581','73AB60D2-584B-4A67-AC6B-C754115FBB7A','DA7A7C79-72A2-4748-9AF6-C76942BE1566',
'B4E617DC-7045-4791-8F06-C9C9E28E137A','8286C31C-4BF3-4B19-A192-CDC980567941','C1553C27-77E4-4826-8A6F-D81219A52C73',
'1501A8C0-FF4F-478D-9CAA-DA08697E8031','0283E78A-9F89-4478-9C8A-E2B30341AD66','208F17A5-E201-418C-8143-E42B4363CDCD',
'D439B857-5C9C-4CA8-88F9-E6FEC80DC227','2DDFFA3B-5963-4FB8-9A6E-FD3D0BB51330'";
$projetosAgencias['008'] = "'9723C7C6-3BEF-40D0-97FB-131D2F693794','116DE7A2-7BC3-41AD-AA46-4CCDD0384AE7','D5BF2FEA-7AAC-46E2-BCEA-82FF3DF6C9AF'";
$projetosAgencias['001'] = "'229CD363-6F52-4FD3-B24D-02B3880CEF82','46F5FF0B-6F3E-4124-9D42-54218F2DA6EB','471B3EDF-00CE-436F-BCE7-70E84944EAD4',
'89FC36C9-8B93-42B8-B49A-929439FAAF74','E42F4F63-81BF-49A3-948A-94FFA10A5B11','41F16A7B-574F-4B8F-A6C8-9761AB801AAF',
'F805DF28-E96E-406E-95B6-D0F94EF1779E'";
$projetosAgencias['002'] = "'CC275A89-1BC2-4C96-948C-85AA18A87A25','C648A533-32FA-4657-BDC0-860CC22C3A1E','D8884A84-03C1-4EF7-8F57-DC9E2B44EE32',
'F2AFBF1D-A9F5-48B6-AE34-DF10819671CE','6FADAC9A-CAEE-429C-9F91-F5C61829B3AA'";
$projetosAgencias['004'] = "'84F8A2C4-E186-460C-9C7D-0607153377A3','7D8036E8-B234-43A6-ABDE-1DB7B22EB80A','F7232347-7C35-4A6F-B3B5-29622D92706F',
'A2959708-A993-4CD7-957A-442E49DCF3AF','3B9E772A-09F9-43E4-AA01-6F3B07871382','19CA0AB9-BB2C-43B0-A164-A16EC3B05B46',
'14F0E241-D89F-49E0-B2A5-BAB132B921C1','051C32F4-9ADD-44BE-835E-F3F6643B1534'";

$nomeUnidades = Array();
$nomeUnidades["736"] =	"Unidade de Acesso a Inova��o e Tecnologia";
$nomeUnidades["723"] =	"Unidade de Administra��o e Finan�as";
$nomeUnidades["998"] =	"Unidade de Assessoria Jur�dica";
$nomeUnidades["009"] =	"Unidade de Atendimento Individual";
$nomeUnidades["999"] =	"Unidade de Auditoria Interna";
$nomeUnidades["996"] =	"Unidade de Educa��o Empreendedora";
$nomeUnidades["733"] =	"Unidade de Gest�o de Pessoas";
$nomeUnidades["732"] =	"Unidade de Gest�o Estrat�gica";
$nomeUnidades["997"] =	"Unidade de Marketing e Comunica��o";
$nomeUnidades["731"] =	"Unidade de Tecnologia da Informa��o";
$nomeUnidades["734"] =	"Unidade de Atendimento Coletivo - Agroneg�cios, Turismo  e Territorios Espec�ficos";
$nomeUnidades["735"] =	"Unidade de Atendimento Coletivo - Ind�stria, Com�rcio e Servi�os";

$projetosUnidades = Array();
$projetosUnidades['723'] = "'8D8F99A5-32F6-43C0-9923-20541234C039','71608A8A-AA69-4803-9047-53841818C3BF','3AB6B4C3-8F7F-4562-9D2D-A1D0B5E29E3D',
'0EB804F4-A9B6-409B-A045-BC6EA5ADB6E0','42DE55C8-A948-4103-BEF6-BF27EF52B003','6CB3E8F9-165A-46CC-A9B5-E589066F2CCA'";
$projetosUnidades['998'] = "'382E03B7-9018-4B28-96DE-7145F5D130B5'";
$projetosUnidades['009'] = "'229CD363-6F52-4FD3-B24D-02B3880CEF82','84F8A2C4-E186-460C-9C7D-0607153377A3','BDBA7BFE-E8EA-41B5-8833-1A20EB39C4E5',
'C124E242-895E-473B-B215-2A590E0EC134','A2959708-A993-4CD7-957A-442E49DCF3AF','46F5FF0B-6F3E-4124-9D42-54218F2DA6EB',
'5047B2C1-ECEF-4022-9FAF-6B3ACC3F343B','9D33DEEB-27A9-4FAB-88B4-8B2A4738D5D8','A31909CB-33F0-4121-8479-B7B9C79F64E2',
'73AB60D2-584B-4A67-AC6B-C754115FBB7A','8F76ACF6-7E1C-4A14-B916-CFC8F7FBA141','05FED0D4-6436-46AA-8634-DF0503591562',
'F2AFBF1D-A9F5-48B6-AE34-DF10819671CE','180F5897-609D-47AD-894B-E94C6D2A19DF','1E3AFF8C-ED2D-4FEA-8269-EF59639682C4',
'BA6DD3FB-F466-4E46-B401-FAE95C858626'";
$projetosUnidades['999'] = "'0966A621-8F93-4BBB-8FD8-8715A2D50748'";
$projetosUnidades['996'] = "'25860AE4-2416-484F-BB59-10125720A202','6FD65517-9F1D-432A-AB3A-495D990A7A5A','19CA0AB9-BB2C-43B0-A164-A16EC3B05B46',
'583EF17E-B643-496B-A57E-BC3FCE761FFF','27A33805-14ED-4CB7-B3D2-BF7EF2131094','DA7A7C79-72A2-4748-9AF6-C76942BE1566',
'F805DF28-E96E-406E-95B6-D0F94EF1779E','67916775-6605-44A1-8313-F85B2B5BCF54','1F3565A2-8E8C-4F95-B6D5-F9BB6C7BB6CD'";
$projetosUnidades['733'] = "'32B9D694-A506-4484-874A-93C142588C2A1','998558DC-D1FB-408C-AF04-BD9B48496DD0'";
$projetosUnidades['732'] = "'C3737A79-A540-42B6-B409-3A518589E312','F302D841-7180-41B8-9A50-C1F3E1886B79','03B75E93-FB88-4280-A410-C5EBA2788E1A'";
$projetosUnidades['997'] = "'63806232-310D-4684-B07A-4B74E0969E38','7851601D-7BC5-4224-98BD-5650B1148315','35E6B8E6-036E-40FE-9FE5-8D9A57A29006',
'3E155BF0-FDC8-4149-8A19-B860950A6202'";
$projetosUnidades['731'] = "'C24948F6-BE5A-4AF1-BB21-1275F6AB82DA','F108200F-4D5F-4414-B08E-16F91C60FFB4','2D6C9ADB-77AE-4A01-90BE-735A7F72E6EF',
'8286C31C-4BF3-4B19-A192-CDC980567941','208F17A5-E201-418C-8143-E42B4363CDCD'";
$projetosUnidades['734'] = "'65EB56A3-25C1-4B87-84AE-0ADED59E988C','CAF5E203-8011-4F64-8A39-12EE05052641','2DF6A70D-AAEA-4BFA-9D72-1C812ED57FF5',
'F7232347-7C35-4A6F-B3B5-29622D92706F','116DE7A2-7BC3-41AD-AA46-4CCDD0384AE7','505668D8-635A-4612-9193-55FCD3766DA1',
'E8562CB1-5321-4F0A-BDC5-5C01C6F9EC0C','3B9E772A-09F9-43E4-AA01-6F3B07871382','471B3EDF-00CE-436F-BCE7-70E84944EAD4',
'A7AB9BFA-5593-4EEA-93E2-7E6779561A2E','D5BF2FEA-7AAC-46E2-BCEA-82FF3DF6C9AF','36A39EAC-D948-4F13-A37D-8CE0BFCC32AD',
'90351D1E-A27E-47BF-8E0A-8F08A3196D97','83D36E4C-8B46-4D53-B027-952896846657','41F16A7B-574F-4B8F-A6C8-9761AB801AAF',
'56B70AC6-CBB9-4196-98AB-AD6CF7E07F5D','275D8E2A-22FC-4575-A48E-BCE08E6CF922','510E5DB9-0478-4D69-9E57-D5A1CDBB9CCF',
'D8884A84-03C1-4EF7-8F57-DC9E2B44EE32','051C32F4-9ADD-44BE-835E-F3F6643B1534','6FADAC9A-CAEE-429C-9F91-F5C61829B3AA'";
$projetosUnidades['735'] = "'BE4192D3-26F3-428D-96E8-09B74BDDBBA7','FEF43513-B302-4219-899E-142C243ED916','7D8036E8-B234-43A6-ABDE-1DB7B22EB80A',
'2BDE9807-A6BE-4DD6-A412-4E8A75F397AB','B3F670F2-6598-4A0A-B39F-71E67E7B1E75','C648A533-32FA-4657-BDC0-860CC22C3A1E',
'89FC36C9-8B93-42B8-B49A-929439FAAF74','30044284-0375-45BE-BDA4-9CD4F8BD2DD4','8E627C05-024D-4D37-8B88-9D820A532F39',
'CA8F4133-7D7D-4400-80E2-C6835344D581','9D1770F1-22E1-4C32-BD42-C7D33C17FC31','B4E617DC-7045-4791-8F06-C9C9E28E137A',
'C1553C27-77E4-4826-8A6F-D81219A52C73','1501A8C0-FF4F-478D-9CAA-DA08697E8031','0283E78A-9F89-4478-9C8A-E2B30341AD66',
'D439B857-5C9C-4CA8-88F9-E6FEC80DC227','2DDFFA3B-5963-4FB8-9A6E-FD3D0BB51330'";
$projetosUnidades['736'] = "'CC968174-7DCD-4FC4-AD79-06D0688BB86D','54B6FBBC-A6B6-42FF-81F7-1513BDB7C7C9','9F816667-3792-4445-A72D-412A401EC21F',
'FFA788F3-1BD1-44FB-9251-56E085377235','3AC4F328-0493-499C-8C8C-77F492607E80'";

$projetosAtendimentoI = $projetosUnidades['009'];
$projetosAtendimentoC = $projetosUnidades['723'].",".
						$projetosUnidades['998'].",".
						$projetosUnidades['999'].",".
						$projetosUnidades['996'].",".
						$projetosUnidades['733'].",".
						$projetosUnidades['732'].",".
						$projetosUnidades['997'].",".
						$projetosUnidades['731'].",".
						$projetosUnidades['734'].",".
						$projetosUnidades['735'].",".
						$projetosUnidades['736'];

//criando a conex�o
$dbhandle = mssql_connect($pbsrvsql, $myUser, $myPass)
or die("Erro ao se conectar com o Servidor $myServer");

//Seleciona o Banco SIACNet
$selected = mssql_select_db($bancoSIACNet, $dbhandle)
or die("N�o foi poss�vel abrir o banco $bancoSIACNet");
