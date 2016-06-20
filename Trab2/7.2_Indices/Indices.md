# Alias das tabelas
| Tabela               | Alias           |
| :-------------       | :-------------  |
| TB_Caixa             | CAX             |
| TB_Cliente           | CLI             |
| TB_Competiu          | CPU             |
| TB_Comprou           | CMP             |
| TB_ContatoFranquia   | COF             |
| TB_ContatoPessoa     | COP             |
| TB_Franquia          | FRA             |
| TB_Frequentou        | FRQ             |
| TB_Funcionario       | FUC             |
| TB_Ganhou            | GAN             |
| TB_Jogada            | JOG             |
| TB_Jogo              | JGO             |
| TB_JogoEmGrupo       | JGG             |
| TB_JogoIndividual    | JGI             |
| TB_Maquina           | MAQ             |
| TB_Mesa              | MES             |
| TB_Oferece           | OFE             |
| TB_Partida           | PAR             |
| TB_Pessoa            | PES             |
| TB_Vendeu            | VEN             |

# Mudanças nas tabelas
| Antigo            | Novo                  | Motivo                                                  |
| :-------------    | :-------------        | :-------------                                          |
| TB_Maquina.serial | TB_Pessoa.snumber     | Serial é um tipo do SQL então não pode usar como nome   |
| TB_Pessoa.idade   | TB_Pessoa.nascimento  | Faz mais sentido registrar a DT nascimento              |
