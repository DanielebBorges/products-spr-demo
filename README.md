# Cadastro e Listagem de Produtos

## Instruções de Execução

### Requisitos
- PHP
- XAMPP
- Composer instalado
- Navegador web

### Passos para rodar o projeto

1 - Clone ou copie o projeto para a pasta `htdocs`

2 -  Acesse o terminal e vá até a pasta do projeto:
```
cd C:\xampp\htdocs\products-srp-demo
```
3 - Instale o autoload do Composer:
```
composer dump-autoload
```
4 - Inicie o Apache pelo painel do XAMPP.

5 - Acesse o sistema pelo navegador:
```
http://localhost/products-srp-demo/public/
```
## Casos de teste


###  Caso 1 – Cadastro válido
- **Entrada:** `name="Teclado"`, `price=120.50`
- **Resultado esperado:** Produto é criado com sucesso, recebe um ID incremental e aparece na listagem de produtos.

---

###  Caso 2 – Nome curto
- **Entrada:** `name="T"`, `price=50`
- **Resultado esperado:** Cadastro rejeitado. O sistema exibe mensagem de erro informando que o nome deve ter no mínimo 2 caracteres.

---

###  Caso 3 – Preço negativo
- **Entrada:** `name="Mouse"`, `price=-10`
- **Resultado esperado:** Cadastro rejeitado. O sistema exibe mensagem de erro informando que o preço deve ser um número não negativo.

---

###  Caso 4 – Lista vazia
- **Pré-condição:** O arquivo `storage/products.txt` está vazio.
- **Resultado esperado:** A página de listagem exibe a mensagem: **"Nenhum produto cadastrado."**

---

###  Caso 5 – Múltiplos cadastros
- **Entrada:** Cadastrar os seguintes produtos:
  1. `name="Teclado"`, `price=120.50`
  2. `name="Mouse"`, `price=80.00`
  3. `name="Monitor"`, `price=900.00`
- **Resultado esperado:** Os três produtos são cadastrados com sucesso, com IDs incrementais (1, 2, 3) e aparecem na listagem em ordem de inserção.

---
## Desenvolvido por:
| Alunos | RA | Turma|
| -------- | ----- | ----------- |
|Barbara Luani Rrebechi Santana|1987862|Turma C|
|Daniele Barbosa Borges|1989236|Turma C | 


