# Sistema Pag-Simp

Projeto desenvolvido com foco em **boas práticas de arquitetura**, clareza de regras de negócio e organização de código, utilizando **PHP + Hyperf**.

---

## Arquitetura

Arquitetura com separação de responsabilidades:

```
Domain          → regras de negócio
Services        → casos de uso
Repositories    → banco de dados
Controllers     → controllers HTTP
```

* O **Domain** contém as regras de negócio
* Cada **Service** representa um caso de uso
* Controllers não contêm regra de negócio

---

## Tipos de Usuário

* **Comum** (CPF): pode depositar e transferir
* **Lojista** (CNPJ): **não pode efetuar transações**, apenas receber transferências

A criação de usuários utiliza **Factory Method**, garantindo objetos sempre válidos.

---

## Transações

* Depósitos e transferências são executados dentro de **transactions de banco**
* Cada operação gera:

  * registro na tabela `transacoes`
  * registro na tabela `log_transacoes` (sucesso ou erro)

---

## Autorizador Externo

Transferências consultam um serviço autorizador externo antes da conclusão.

---

## Tecnologias

* PHP 8+
* Hyperf
* PostgreSQL
* Docker
* PHP-CS-Fixer
* PHP Stan

---

## Conclusão

Projeto simples, porém estruturado para ser:

* Fácil de entender
* Fácil de testar
* Fácil de evoluir

## Imagens do desenvolvimento
<img width="700" alt="image" src="https://github.com/user-attachments/assets/2294f421-b093-4099-82a9-fe8787bb8d3c" />
<img width="500" alt="image" src="https://github.com/user-attachments/assets/a49bc0c5-e0df-47fc-8ec8-11b4c494dea9" />


---
 **Autor:** Davi Fernandes Alano
