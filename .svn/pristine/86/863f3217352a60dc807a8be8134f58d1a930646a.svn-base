ALTER TABLE tipo_data ADD tda_formato_data varchar(255) null;

ALTER TABLE tipo_data ADD tda_formato_hora varchar(255) null;


update tipo_data set tda_formato_data = 'dd/MM/YYYY', tda_formato_hora = 'HH:mm', tda_exemplo = '01/12/2000 00:00' where tda_codigo = 1;
update tipo_data set tda_formato_data = 'dd/MM/YY', tda_formato_hora = 'HH:mm', tda_exemplo = '01/12/00 00:00' where tda_codigo = 2;
update tipo_data set tda_formato_data = 'dd-MM-YYYY', tda_formato_hora = 'HH:mm', tda_exemplo = '01-12-2000 00:00' where tda_codigo = 3;
update tipo_data set tda_formato_data = 'dd-MM-YY', tda_formato_hora = 'HH:mm', tda_exemplo = '01-12-00 00:00' where tda_codigo = 4;
update tipo_data set tda_formato_data = 'YYYY-MM-dd', tda_formato_hora = 'HH:mm', tda_exemplo = '2000-12-01 00:00' where tda_codigo = 5;
update tipo_data set tda_formato_data = 'EEEE, dd MMMM YYYY', tda_formato_hora = 'HH:mm', tda_exemplo = 'segunda-feira, 01 de dezembro de 2000 00:00' where tda_codigo = 6;
update tipo_data set tda_formato_data = 'dd MMMM YYYY', tda_formato_hora = 'HH:mm', tda_exemplo = '01 de dezembro de 2000 00:00' where tda_codigo = 7;
insert into tipo_data VALUES ('12/01/2000 00:00 AM', 'MM/dd/YYYY', 'hh:mm a');
insert into tipo_data VALUES ('12-01-2000 00:00 AM', 'MM-dd-YYYY', 'hh:mm a');