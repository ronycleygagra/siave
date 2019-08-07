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
$projetosagencia['001'] = "'34D42978-DBB1-4440-A6EA-2073300C9B17','AB0D51BC-EC11-47FB-B923-A10DE6B63F22',
'B46DCC81-30A3-4755-86B8-30EA0C00A9C5','F92244D7-E886-4152-8C68-FDDFB94725EB',
'2DE6234B-D573-4DE7-9B57-F8CE31F126DC'
";
$projetosagencia['002'] = "'F2AFBF1D-A9F5-48B6-AE34-DF10819671CE','D15324EB-8535-4DC2-94E0-5F15F468A31B'";
$projetosagencia['003'] = "'CA8F4133-7D7D-4400-80E2-C6835344D581',
							'47635199-41B9-40A0-B13C-930BFDC65199',
							'6AF33DD9-B911-4805-9E59-5B46EC6AAA8E',
							'2A4A51D9-2144-4D34-8E54-FD621C38FE52',
							'50071039-4165-46A0-8941-DCF0A1FA8446',
							'8770299B-E3A5-4826-8776-2742E594F536',
							'2B730A01-3B08-4160-A341-233B1C340487',
							'32ADB05A-1361-4C72-816A-B01540CCD395',
							'0AC9DB0B-B073-40A1-8202-0E713AA29B7A',
							'3D9A59B9-36BE-438A-8A83-6E26ED2CB627',
							'C28E44CB-B7EF-4321-A274-28C31C4AC7B7'
							";
$projetosagencia['004'] = "'73316690-03EB-441A-A35D-F6B7E3DAC663','004DF2CE-FAEB-4C1B-BE88-D47D3968AF93',
'EF088203-5DA5-48A9-80E8-56997D092C2A','80C5003B-E172-4BE2-BA06-8E779DC5715D'";
$projetosagencia['005'] = "'1E3AFF8C-ED2D-4FEA-8269-EF59639682C4','5DF55852-75BD-414F-A8A3-203CF19F45D7'
,'4ACEDFB5-F62D-4A94-A7A1-2B08A7A95AB2'";
$projetosagencia['006'] = "'05FED0D4-6436-46AA-8634-DF0503591562','257ED703-A537-4B98-9D3C-5ECC6ECB5FC8',
							'3E15C52C-158A-4D7F-B3B8-C8743233DFEC','BA950A45-217E-41FE-B9A4-4076CA81CF6C',
							'C69AB6B7-9FF0-4F15-87BA-C936725619CE'";
$projetosagencia['007'] = "'27308B63-B51C-4392-8B41-C76224DDD5A4',
							'EF9EDBA0-B9AE-4B85-A920-AD67885D98C3',
							'98EB18BF-C933-4FAC-B6A7-5DA9898B81FB',
							'BF9347D2-8020-4794-BF80-3F66742903E9',
							'0E085FE0-A679-41D3-B011-79B926BC4ABB',
							'B24C37BD-F21A-4DAE-8F75-3B3C874A9413',
							'521E6AC7-E2C1-4E9E-9EC8-A554ADEEB55C',
							'8ABEFA8F-A43F-450A-B9A4-9D5736E7B8A2',
							'917E1680-6972-4C97-A663-F211DE4C543F'
							";
$projetosagencia['008'] = "'1B3ADD81-7B68-4151-AC68-DA88BB84A6CD','52EE05D8-89E3-48F5-A92F-1FB0EC761DC6'";
$projetosagencia['012'] = "'A82E4B2B-FC3B-43E6-B3BA-A5D9944F45CE','E9E99722-43AF-4073-A610-CA58D4497596'";
$projetosagencia['014'] = "'55A828CD-821D-40AF-84AB-ECA8BD2C9E84'";
$projetosagencia['722'] = "'36B46348-E36A-41F4-8C82-47BA9138F0F7','4ACEDFB5-F62D-4A94-A7A1-2B08A7A95AB2'";
