# Sistema-de-Sorteio
# Modelo de Documentação para Aplicação PHP com MySQL


## 1 Introdução
    • **Nome do Projeto:** [Sistema de Sorteio]
    • **Descrição:** [O Sistema de sorteio foi criado para ajudar os usuários a gerenciar seus sorteios e os participantes, além de sortear aleatoriamente uma quantidade de ganhadores especificada pelo usuário. O usuário poderá criar, ver, editar, deletar tanto sorteios quanto participantes, facilitando o processo de sortear e guardando informações de sorteios passados. ]
    • **Tecnologias Utilizadas:** PHP, MySQL, HTML, CSS, JavaScript,Visula Studio Code
    • **Autor(es):** [Maria Cecília da Conceição Pinto,Melissa de Faria Martins,Pedro Augusto Moreira da Costa,
Pietra Massarotti]
    • **Data de início:** [DD/MM/AAAA]


## 2 Estrutura do Projeto
/SistemaSorteio
│── /public
│   │── /css
│   │   └── form.css
│   │   └── tabela.css
│   │── index.php        
│   │── login.php  
│   │── logout.php
│   │── 
│── /src
│   │── /Controllers
│   │   └── editarParticipante.php
│   │   └── editarSorteio.php
│   │   └── deletarParticipante.php
│   │   └── deletarSorteio.php│   
│   │── /Models
│   │   └── conexao.php   # Conexão com banco
│   │   └── Usuario.php
│   │   └──sortear.php
│   │   └── deletarParticipante.php
│   │   └── deletarSorteio.php│ 
│   │── /Views
│   │   └── lerParticipante.php
│   │   └── lerSorteio.php
│   │   └── criarParticipante.php
│   │   └── criarSorteio.php

│   │── /config
│   │   └── config.php            
│── README.md              




## 3 Configuração do Ambiente ### **Requisitos**
    • Servidor XAMP
    • Visual Studio Code[1.98.2]
    • MySQL  Workbench[8.0.36]
    • Sistema operacinal: Windows 11;
    ### **Instalação**
    
1. Clone o repositório:
bash
git clone https://github.com/mimistudies90/Sistema-de-Sorteio.git
cd 

 3. Instale as dependências: bash


 4. Configure o banco de dados:
  ◦ Crie o banco no MySQL
  ◦ Execute o script SQL:
sql
source database/schema.sql;
 ◦ Configure as credenciais no `.env`


5. Inicie o servidor:
http://localhost/


## 4 Estrutura do Banco de Dados ### **Usuários (users)**
    • `id` (SMALLINT, PK, AUTO_INCREMENT)
    • `nome` (VARCHAR)
    • `email` (VARCHAR, UNIQUE)
    • `senha` (VARCHAR)
    • criado_em (FK -> users.id)
    
### **Sorteios (sorteio)**
    • `id` (SMALLINT, PK, AUTO_INCREMENT)
    • `nome` (VARCHAR)
    • `email` (VARCHAR)
    • `usuario_id` (FK -> users.id)


## 5 Rotas da Aplicação
| Método | Rota	| Descrição




|
|	|	|
| GET | `/`	| Página inicial
| GET | `/login` | Tela de login

|



|
|
| POST | `/login` | Autenticação do usuário |
| GET | `/posts` | Lista todos os posts	|
| POST | `/posts` | Cria um novo post	|







## 8 Deploy e Hospedagem
### **Configuração no Servidor**
    1. Configure um servidor Apache/Nginx
    2. 


    
