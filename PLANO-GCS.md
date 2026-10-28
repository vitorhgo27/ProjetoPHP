# Plano de Gerência de Configuração de Software
ProjetoPHP — versão 1.0 — 28/10/2026 — proposta para aprovação em PR.

## Objetivo
Controlar identificação, alterações, revisão, liberação e auditoria dos itens de
configuração. Este plano integra o repositório e segue o mesmo fluxo de revisão do código.

## Responsáveis — preencher antes da entrega
- Proprietário, gestor de configuração e revisor obrigatório de production: @vitorhgo27
- Par de revisão, outra pessoa com escrita e convite aceito: @PREENCHER.
- Repositório: https://github.com/vitorhgo27/ProjetoPHP
- Referência da aula 1 do ongconecta: PREENCHER com o link do professor.

O proprietário mantém regras, permissões, plano e ambientes e aprova production.
O par revisa mudanças de outro autor e participa da homologação.
O autor responde aos apontamentos e não aprova seu próprio PR.

## Itens de configuração e identificação
Controlar PHP em Login, Modules, Pages e raiz; documentação em docs; workflows e
template em .github; .gitignore e exemplo de conexão. Não versionar credenciais,
dados pessoais de banco, arquivos locais ou dependências geradas.
Identificar versões pelo SHA. A baseline inicial será o SHA do merge do PR do plano.
Adotar tags SemVer em liberações: MAJOR incompatível, MINOR funcionalidade, PATCH correção.

## Controle de mudanças
1. Registrar demanda em issue ou descrever motivação e escopo no PR.
2. Criar branch feat/descricao, fix/descricao ou docs/descricao a partir de main atualizada.
3. Fazer commits descritivos e validar sintaxe PHP.
4. Abrir PR para main e solicitar revisão do par com escrita.
5. Exigir uma aprovação, conversas resolvidas e sucesso de PHP lint antes do merge.
6. Invalidar aprovações com novos commits e solicitar nova revisão.
7. Integrar pelo GitHub e remover a branch quando não for mais necessária.

Proteger main contra push direto, force push e exclusão, inclusive para administradores,
sem atores de bypass. Testar a recusa pelo procedimento do guia.

## Ambientes e liberação
Criar staging e production limitados à main. Executar manualmente o workflow
Ambientes - demonstracao GCS: validação, staging, depois production aguardando aprovação.
Em production, cadastrar somente o proprietário em Required reviewers:
com vários revisores, a aprovação de qualquer um poderia liberar o job.
Desabilitar bypass dos administradores.
Se o proprietário iniciar a execução e precisar aprová-la, deixar Prevent self-review
desmarcado. Para segregação, marcar essa opção e pedir ao par para iniciar a execução.
A aprovação de ambiente é separada da revisão do PR.

O workflow é demonstrativo e não faz deploy real. Antes de uma liberação real,
definir hospedagem, segredos por ambiente, migrações, homologação e testes funcionais.
Registrar SHA, tag, PR, executor, aprovação e resultado de cada liberação.
Não apresentar a demonstração como aplicação publicada.

## Contabilidade de estado e auditoria
Manter docs/evidencias/README.md com URL acessível, SHA da baseline, plano publicado,
PR aprovado, escrita do par, regra de main, recusa real e configurações de ambientes.
Registrar data, responsável e links verificáveis. Marcar pendente o que não ocorreu.
Revisar os cinco critérios antes da entrega e atualizar o plano quando o processo mudar.

## Recuperação
Recuperar versões por SHA/tag dos clones e remoto. Reverter main com git revert
em novo PR, sem reescrever histórico. Backup de banco fica fora do Git e deve ter
procedimento próprio, com restauração testada antes de operação real.

## Aprovação do plano
A aprovação será registrada no PR revisado pelo par e integrado à main.
PR, aprovador, data e SHA: PENDENTES, registrar no índice de evidências.