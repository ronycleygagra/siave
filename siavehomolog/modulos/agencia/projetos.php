<?php 
//projetos de 2016
/*
select '722',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '722' 
and ua.ano = '2016'
union 
select '005',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '005' 
and ua.ano = '2016'
union 
select '007',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '007' 
and ua.ano = '2016'
union 
select '006',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '006' 
and ua.ano = '2016'
union 
select '003',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '003' 
and ua.ano = '2016'
union 
select '008',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '008' 
and ua.ano = '2016'
union 
select '001',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '001' 
and ua.ano = '2016'
union 
select '002',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '002' 
and ua.ano = '2016'
union 
select '012',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '012' 
and ua.ano = '2016'
union 
select '014',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '014' 
and ua.ano = '2016'
union 
select '004',tb.codpratif 
from [pbsrvsql3].[Siacnet].[dbo].[tbpaipratif] tb, [SIEG].[dbo].[UNIDADExAGENCIA] ua 
where tb.nupratifseq = ua.projeto 
and ua.agencia = '004' 
and ua.ano = '2016'
 */
$projetosagencia = Array();
$projetosagencia['001'] = "'34D42978-DBB1-4440-A6EA-2073300C9B17','AB0D51BC-EC11-47FB-B923-A10DE6B63F22'";
$projetosagencia['002'] = "'F2AFBF1D-A9F5-48B6-AE34-DF10819671CE'";
$projetosagencia['003'] = "'2BDE9807-A6BE-4DD6-A412-4E8A75F397AB',
							'455C531B-1B95-492E-AC46-5D096ABD1BFC',
							'47635199-41B9-40A0-B13C-930BFDC65199',
							'CA8F4133-7D7D-4400-80E2-C6835344D581',
							'C1553C27-77E4-4826-8A6F-D81219A52C73',
							'2A4A51D9-2144-4D34-8E54-FD621C38FE52'
							";
$projetosagencia['004'] = "'004DF2CE-FAEB-4C1B-BE88-D47D3968AF93','73316690-03EB-441A-A35D-F6B7E3DAC663'";
$projetosagencia['005'] = "'5DF55852-75BD-414F-A8A3-203CF19F45D7','1E3AFF8C-ED2D-4FEA-8269-EF59639682C4'";
$projetosagencia['006'] = "'257ED703-A537-4B98-9D3C-5ECC6ECB5FC8','3E15C52C-158A-4D7F-B3B8-C8743233DFEC',
							'05FED0D4-6436-46AA-8634-DF0503591562'";
$projetosagencia['007'] = "'42B917CF-C366-452A-A594-098451EDB297',
							'BF9347D2-8020-4794-BF80-3F66742903E9',
							'98EB18BF-C933-4FAC-B6A7-5DA9898B81FB',
							'3CD436FB-F6BB-49D5-9313-634370C09E76',
							'0E085FE0-A679-41D3-B011-79B926BC4ABB',
							'C01400C9-9911-4725-8304-A85E2419110F',
							'EF9EDBA0-B9AE-4B85-A920-AD67885D98C3',
							'27308B63-B51C-4392-8B41-C76224DDD5A4',
							'30EB29E8-F87F-409A-AF3F-CF1DFCBAF3BA',
							'7CB9C3E0-D473-4C58-8E2B-DE1D3FBED6A8'
							";
$projetosagencia['008'] = "'1B3ADD81-7B68-4151-AC68-DA88BB84A6CD'";
$projetosagencia['012'] = "'C53B6C94-1155-49B5-87E0-EDD85EC4E167'";
$projetosagencia['014'] = "'6AF33DD9-B911-4805-9E59-5B46EC6AAA8E'";
$projetosagencia['722'] = "'36B46348-E36A-41F4-8C82-47BA9138F0F7'";
