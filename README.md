#ReMind

##Sistema de Gerenciamento de Pacientes da Clínica Escola de Psicologia da UFAM

Primeiro clone o repositorio com o comando :

$ git clone https:://github.com/manogray/PsySchool

Após isso digite:

$ cd PsySchool/database

Entre no seu terminal de banco de dados MySQL e digite

mysql> source remind.sql

Isso criará todo o banco de dados necessário para rodar a aplicação. No diretório do projeto, digite:

$ php -S 0.0.0.0:8000

E acesse localhost:8000 no seu navegador (Chrome), e bom teste!