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

 2. Instale as dependências:
 git,xamp


 3. Configure o banco de dados:
 Aqui está a versão estruturada e organizada do seu passo a passo para configurar o banco de dados MySQL:

4. Configure o banco de dados:
Coloque a senha do bd da sua maquina lócal na pasta 'conexao.php'

5. Inicie o servidor:
http://localhost/


## 4 Estrutura do Banco de Dados ### **Usuários (usuario)**
    • `id` (SMALLINT, PK, AUTO_INCREMENT)
    • `nome` (VARCHAR)
    • `email` (VARCHAR, UNIQUE)
    • `senha` (VARCHAR)
    • criado_em (DATETIME)
    
### **Sorteios (sorteio)**
    • `id` (SMALLINT, PK, AUTO_INCREMENT)
    • `nome` (VARCHAR)
    • `descricao` (VARCHAR)
    • 'criado_em' (DATETIME)
    • 'atualizado_em' (DATETIME)
    • `usuario_id` (FK -> usuario.id)

### **Paticipantes (participantes)**
    • `id` (SMALLINT, PK, AUTO_INCREMENT)
    • `nome` (VARCHAR)
    • `telefone` (VARCHAR)
    • 'posicao' (TINYINT)
    • 'criado_em' (DATETIME)
    • 'atualizado_em' (DATETIME)
    • `sorteios_id` (FK -> sorteio.id)


    
