# Prefixo para as tabelas
| Tabela            | Alias           |
| :-------------    | :-------------  |
| Caixa             | CAX             |
| Cliente           | CLI             |
| Competiu          | CPU             |
| Comprou           | CMP             |
| ContatoFranquia   | COF             |
| ContatoPessoa     | COP             |
| Franquia          | FRA             |
| Frequentou        | FRQ             |
| Funcionario       | FUC             |
| Ganhou            | GAN             |
| Jogada            | JOG             |
| Jogo              | JGO             |
| JogoEmGrupo       | JGG             |
| JogoIndividual    | JGI             |
| Maquina           | MAQ             |
| Mesa              | MES             |
| Oferece           | OFE             |
| Partida           | PAR             |
| Pessoa            | PES             |
| Vendeu            | VEN             |

# Mudanças nas tabelas
| Antigo            | Novo                  | Motivo                                                  |
| :-------------    | :-------------        | :-------------                                          |
| TB_Maquina.serial | TB_Pessoa.snumber     | Serial é um tipo do SQL então não pode usar como nome   |
| TB_Pessoa.idade   | TB_Pessoa.nascimento  | Faz mais sentido registrar a DT nascimento              |
