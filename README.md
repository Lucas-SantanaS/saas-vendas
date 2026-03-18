# SaaS Vendas - Sistema de Gestão de Vendas

Bem-vindo ao SaaS Vendas, um sistema web completo para gerenciamento de produtos e vendas de pequenas empresas. 
Este projeto está sendo desenvolvido como portfólio para demonstrar habilidades em **PHP, MySQL e desenvolvimento de sistemas web profissionais**.

---

## 🔹 Funcionalidades

- **Autenticação de usuários**
  - Cadastro de novos usuários
  - Login seguro com sessões
  - Logout com destruição de sessão
- **Dashboard protegido**
  - Acesso somente para usuários logados
  - Mensagens de sucesso após ações (ex: produto adicionado, atualizado ou excluído)
- **Gerenciamento de produtos**
  - Adicionar novos produtos
  - Editar produtos existentes
  - Excluir produtos
  - Listagem de produtos em tabela com informações de nome, preço e estoque
- **Estrutura organizada**
  - Separação clara entre `views`, `controllers` e `models` (MVC simplificado)
  - Arquivos de configuração centralizados (`database.php`)

---

## 🔹 Tecnologias usadas

- **PHP 8.2** – Backend e lógica do sistema  
- **MySQL** – Banco de dados relacional  
- **XAMPP** – Servidor local (Apache + MySQL) para desenvolvimento  
- **HTML5 / CSS3** – Estrutura e estilo das páginas  
- **MVC Simplificado** – Organização do projeto em Models, Views e Controllers  

---

## 🔹 Como rodar o projeto localmente

1. Instale o **XAMPP** (Apache + MySQL)  
2. Clone este repositório:

git clone [https://github.com/Lucas-SantanaS/saas-vendas.git](https://github.com/Lucas-SantanaS/saas-vendas.git)

Copie a pasta para o diretório htdocs do XAMPP:

C:\xampp\htdocs\

Crie o banco de dados no phpMyAdmin e importe o arquivo saas_vendas.sql (disponível no projeto)

Ajuste as credenciais de acesso no arquivo config/database.php:

$host = "localhost";
$user = "root";      // seu usuário do MySQL
$pass = "";          // sua senha do MySQL
$dbname = "saas_vendas";

Acesse pelo navegador:

http://localhost/saas-vendas/public/login.php


🔹 Observações

O sistema é totalmente funcional em ambiente local usando XAMPP

Todo o CRUD de produtos já está integrado com mensagens de sucesso e feedback visual

Proteção de páginas implementada com sessões, garantindo que apenas usuários logados acessem o dashboard

🔹 Skills demonstradas

PHP avançado e integração com MySQL

Implementação de CRUD completo

Estruturação de projeto seguindo MVC simplificado

Uso de sessões para autenticação e controle de acesso

Preparação de sistema para portfólio profissional

🔹 Próximos passos / melhorias possíveis

Melhorar visual do sistema

Implementar upload de imagens para produtos

Adicionar controle de categorias ou fornecedores

Criar versão responsiva para dispositivos móveis

Adicionar filtro, pesquisa e paginação de produtos

🔹 Autor

Lucas Santana – Engenheiro de Software | Portfólio em crescimento
