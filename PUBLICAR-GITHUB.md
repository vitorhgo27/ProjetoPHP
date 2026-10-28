# Como publicar e concluir a atividade

## 1. Preencher
Substituir PREENCHER no plano e no índice por seu usuário, usuário do par e URL.
Os arquivos desta entrega não configuram o servidor GitHub.
Use o repositório existente se já houver um; não crie outro sem necessidade.

## 2. Repositório existente — recomendado
No PowerShell, escolha uma pasta de trabalho e execute, substituindo os valores:

    git clone https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git
    cd SEU-REPOSITORIO
    git switch main
    git pull --ff-only origin main
    git switch -c docs/adequacao-gcs

Copie da pasta ProjetoPHP entregue para a RAIZ do clone:
README.md, .gitignore, conexao.example.php, docs/ e .github/.
Não crie uma subpasta ProjetoPHP dentro do repositório.
Se já houver versões desses arquivos no remoto, compare e mescle seu conteúdo.
Não é necessário substituir os PHP originais: eles foram preservados.

    git status
    git diff
    git add README.md .gitignore conexao.example.php docs .github
    git diff --cached
    git commit -m "docs: adicionar plano GCS e fluxo de avaliacao"
    git push -u origin docs/adequacao-gcs

No GitHub, abra Compare & pull request, base main. Solicite revisão ao par,
corrija apontamentos e integre após aprovação e check PHP lint aprovado.

## 3. Se ainda não houver repositório
Crie um repositório público vazio no GitHub, sem README/licença/.gitignore iniciais.
Na pasta ProjetoPHP desta entrega (após preencher os dados):

    git init -b main
    git add .
    git diff --cached
    git commit -m "chore: importar projeto e documentar GCS"
    git remote add origin https://github.com/SEU-USUARIO/SEU-REPOSITORIO.git
    git push -u origin main

Esse primeiro push estabelece a branch antes da proteção. Configure a proteção
imediatamente depois e faça as mudanças seguintes por PR. Para registrar revisão
efetiva do plano, abra um PR com o par para revisar/preencher/ajustar o plano,
sem inventar uma aprovação anterior. Não execute este fluxo dentro de um clone existente.

## 4. Acessibilidade e par de revisão
- Para facilitar avaliação e disponibilidade de proteções no plano Free, use repositório
  público. Confira antes os arquivos que serão expostos. Para alterar um existente:
  Settings > General > Danger Zone > Change repository visibility.
- Abra a URL em janela anônima e confira código, plano e evidências.
- Settings > Collaborators (ou Collaborators and teams / Manage access):
  adicione o usuário de outra pessoa. O convite precisa ser aceito.
- Em organização, conceda Write. Em repositório pessoal, o colaborador possui escrita;
  a interface pode não mostrar seletor de papéis.
- Capture a tela que comprove o acesso e registre um PR aprovado por essa pessoa.

## 5. Bloquear push direto em main
Settings > Rules > Rulesets > New ruleset > New branch ruleset:
- Nome: proteger-main; Enforcement status: Active.
- Target branches: incluir main (por nome).
- Bypass list: vazia, inclusive sem proprietário/administrador.
- Ativar Require a pull request before merging, uma aprovação,
  Dismiss stale pull request approvals when new commits are pushed
  e Require conversation resolution before merging.
- Ativar Block force pushes e Restrict deletions.
- Ativar Require status checks to pass e selecionar PHP lint após o check aparecer
  em uma execução. Pode ser necessário publicar/executar CI primeiro para ele surgir.
- Não ativar Restrict updates: isso impediria também atualizações legítimas sem bypass.
- Salvar e capturar a regra ativa e seu alvo.

Se usar proteção clássica: Settings > Branches > Add branch protection rule, padrão
main, exigir PR e uma aprovação, check PHP lint e conversas resolvidas.
Marcar Do not allow bypassing the above settings (inclusive administradores).
Manter force push e exclusão desabilitados. Use uma abordagem consistente e verifique
se não há outras regras conflitantes.

## 6. Coletar uma recusa REAL de push
Só após a regra estar ativa e com o clone limpo e sincronizado.
Este teste usa commit vazio: se a proteção falhar, não altera arquivos da aplicação.
Não usar --force e não usar --dry-run como evidência de recusa pelo servidor.

    git switch main
    git pull --ff-only origin main
    git switch -c teste/recusa-main
    git commit --allow-empty -m "test: verificar bloqueio de push direto na main"
    git rev-parse HEAD
    git push origin HEAD:main

Esperado: erro do servidor indicando violação da regra de main, por exemplo
GH013/GH006 e exigência de pull request. Copie o comando, SHA, saída completa,
código de saída ($LASTEXITCODE imediatamente após git push) e data para
docs/evidencias/push-main-recusado.txt em uma branch docs/evidencias.

Erro de autenticação, falta de rede ou non-fast-forward NÃO prova a proteção.
Se o push for aceito, o critério falhou: corrija regra/bypass e repita com novo
commit vazio. O commit vazio aceito pode ficar no histórico; não reescreva main.
Ao terminar, retorne à main e atualize com git pull --ff-only origin main.
O commit de teste rejeitado pode continuar somente na branch local.

## 7. Criar Environments
Settings > Environments > New environment:
1. Criar staging.
2. Criar production.
3. Em ambos, Deployment branches and tags: Selected branches and tags; adicionar
   somente a branch main.
4. Em production, marcar Required reviewers e adicionar SOMENTE SEU usuário.
   Salvar em Save protection rules.
5. Desmarcar Allow administrators to bypass configured protection rules, quando exibido.
6. Se você iniciar e aprovar a demonstração, deixar Prevent self-review desmarcado.
   Se quiser prevenção de autoaprovação, marcar e pedir ao par para iniciar.
7. Capturar staging e production com suas configurações.

A lista de revisores obrigatórios exige aprovação de apenas UM integrante. Não
adicione o par nessa lista se a avaliação exige especificamente a sua aprovação.
Seu par continua sendo o revisor do PR, papel diferente do revisor de ambiente.
Em planos Free/Pro/Team, required reviewers de environments exigem repositório
público conforme documentação atual; se o campo não aparecer, confira plano e visibilidade.

## 8. Demonstrar a aprovação
Após merge dos workflows na main e configuração dos ambientes:
Actions > Ambientes - demonstracao GCS > Run workflow > branch main > Run workflow.
A validação e staging devem passar; production deve aguardar a sua aprovação.
Capture esse estado. Abra Review deployments, selecione production e aprove.
Registre URL da execução e captura do resultado.

O workflow registra uma demonstração do controle GCS. Ele NÃO publica um site,
não conecta banco nem comprova deploy funcional. Isso atende como apoio à
verificação das regras, sem alegar hospedagem inexistente.

## 9. Publicar evidências e entregar
Crie branch docs/evidencias a partir de main atualizada, inclua capturas e log real,
preencha o índice, abra novo PR e solicite revisão do par. Após merge, confirme:
- Plano na main, nomes reais e SHA da baseline preenchidos.
- Link acessível ao avaliador.
- Recusa real documentada pela regra, sem bypass.
- Par com escrita aceita e revisão registrada.
- Staging e production existentes, você como único required reviewer em production.

Envie na atividade a URL raiz https://github.com/SEU-USUARIO/SEU-REPOSITORIO.
O README aponta para o plano e as evidências.

## Referências oficiais
- Proteção: https://docs.github.com/en/repositories/configuring-branches-and-merges-in-your-repository/managing-protected-branches/about-protected-branches
- Rulesets: https://docs.github.com/en/repositories/configuring-branches-and-merges-in-your-repository/managing-rulesets/available-rules-for-rulesets
- Ambientes: https://docs.github.com/en/actions/how-tos/deploy/configure-and-manage-deployments/manage-environments
- Aprovação: https://docs.github.com/en/actions/how-tos/deploy/configure-and-manage-deployments/review-deployments