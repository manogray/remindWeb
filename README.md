ReMind
======

Sistema de Gerenciamento de Pacientes da Clínica Escola de Psicologia da UFAM

Instruções
----------

Primeiro clone o repositório com o comando:
```
$ git clone https://github.com/manogray/PsySchool
```
Após isso digite:
```
$ cd PsySchool/database
```
Entre em seu terminal MySQL e digite:
```
mysql> source remind.sql
```
Isso criará todo o banco de dados necessário para rodar a aplicação. No diretório do projeto digite:
```
php -S 0.0.0.0:8000
```
E acesse localhost:8000 no seu navegador (Chrome), e bom teste!