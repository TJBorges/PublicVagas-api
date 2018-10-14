
CREATE TABLE cargo (
  cd_cargo Integer PRIMARY KEY AUTO_INCREMENT,
  ds_cargo Varchar(100) not null
);

CREATE TABLE empresa (
  cd_empresa Integer PRIMARY KEY AUTO_INCREMENT,
  nr_cnpj Varchar(18),
  ds_razao_social Varchar(150),
  ds_nome_fantasia Varchar(150),
  ds_endereco varchar(200),
  cep varchar(9),
  ds_area_atuacao Varchar(100),
  ds_nome_responsavel Varchar(100),
  ds_telefone Varchar(40),
  ds_email Varchar(100),
  ds_site Varchar(100),
  ds_senha varchar(50)  
);

CREATE TABLE vaga (
  cd_vaga Integer PRIMARY KEY AUTO_INCREMENT,
  ds_titulo Varchar(100),
  cd_cargo Integer,
  tp_contratacao varchar(10),
  vl_salario Double,
  nr_qtd_vaga Integer,
  nr_experiencia varchar(50),
  ds_beneficios Varchar(300),
  ds_observacao Varchar(100),
  ds_segunda_etapa varchar(2000),
  cd_empresa Integer,
  FOREIGN KEY(cd_cargo) REFERENCES cargo (cd_cargo),
  FOREIGN KEY(cd_empresa) REFERENCES empresa (cd_empresa)
);


-- INSERTS
                                              
INSERT INTO `cargo` (`cd_cargo`, `ds_cargo`) VALUES
(1, 'Gerente de Administração de Banco de Dados'),
(2, 'Coordenador de Administração de Banco de Dados'),
(3, 'Consultor de Administração de Banco de Dados'),
(4, 'Supervisor de Administração de Banco de Dados'),
(5, 'Administrador de Banco de Dados Sênior'),
(6, 'Administrador de Banco de Dados Pleno'),
(7, 'Administrador de Banco de Dados Júnior'),
(8, 'Analista de Administração de Banco de Dados Sênior'),
(9, 'Analista de Administração de Banco de Dados Pleno'),
(10, 'Analista de Administração de Banco de Dados Júnior'),
(11, 'Trainee de Administração de Banco de Dados'),
(12, 'Assistente de Administração de Banco de Dados'),
(13, 'Auxiliar de Administração de Banco de Dados'),
(14, 'Estagiário de Administração de Banco de Dados'),
(15, 'Gerente de Administração de Redes'),
(16, 'Coordenador de Administração de Redes'),
(17, 'Consultor de Administração de Redes'),
(18, 'Supervisor de Administração de Redes'),
(19, 'Administrador de Redes Sênior'),
(20, 'Administrador de Redes Pleno'),
(21, 'Administrador de Redes Júnior'),
(22, 'Analista de Administração de Redes Sênior'),
(23, 'Analista de Administração de Redes Pleno'),
(24, 'Analista de Administração de Redes Júnior'),
(25, 'Trainee de Administração de Redes'),
(26, 'Assistente de Administração de Redes'),
(27, 'Auxiliar de Administração de Redes'),
(28, 'Estagiário de Administração de Redes'),
(29, 'Gerente de Arquitetura da Informação'),
(30, 'Coordenador de Arquitetura da Informação'),
(31, 'Supervisor de Arquitetura da Informação'),
(32, 'Arquiteto da Informação Sênior'),
(33, 'Arquiteto da Informação Pleno'),
(34, 'Arquiteto da Informação Júnior'),
(35, 'Assistente de Arquitetura da Informação'),
(36, 'Estagiário de Arquitetura da Informação'),
(37, 'Gerente de Conteúdo Web'),
(38, 'Coordenador de Conteúdo Web'),
(39, 'Supervisor de Conteúdo Web'),
(40, 'Analista de Conteúdo Web Sênior'),
(41, 'Analista de Conteúdo Web Pleno'),
(42, 'Analista de Conteúdo Web Júnior'),
(43, 'Trainee de Conteúdo Web'),
(44, 'Assistente de Conteúdo Web'),
(45, 'Auxiliar de Conteúdo Web'),
(46, 'Estagiário de Conteúdo Web'),
(47, 'Gerente de Web Designer'),
(48, 'Coordenador de Criação Web'),
(49, 'Supervisor de Criação Web'),
(50, 'Web Designer Sênior'),
(51, 'Web Designer Pleno'),
(52, 'Web Designer Júnior'),
(53, 'Webmaster Sênior'),
(54, 'Webmaster Pleno'),
(55, 'Webmaster Júnior'),
(56, 'Revisor de Criação Web'),
(57, 'Trainee de Criação Web'),
(58, 'Estagiário de Criação Web'),
(59, 'Diretor de E-Commerce / E-Business'),
(60, 'Gerente de E-Commerce / E-Business'),
(61, 'Coordenador de E-Commerce / E-Business'),
(62, 'Supervisor de E-Commerce / E-Business'),
(63, 'Analista de E-Commerce / E-Business Sênior'),
(64, 'Analista de E-Commerce / E-Business Pleno'),
(65, 'Analista de E-Commerce / E-Business Júnior'),
(66, 'Trainee de E-Commerce / E-Business'),
(67, 'Assistente de E-Commerce / E-Business'),
(68, 'Auxiliar de E-Commerce / E-Business'),
(69, 'Estagiário de E-Commerce / E-Business'),
(70, 'Diretor de Negócios Web'),
(71, 'Gerente de Negócios Web'),
(72, 'Coordenador de Negócios Web'),
(73, 'Supervisor de Negócios Web'),
(74, 'Executivo de Contas de Negócios Web'),
(75, 'Analista de Negócios Web Sênior'),
(76, 'Analista de Negócios Web Pleno'),
(77, 'Analista de Negócios Web Júnior'),
(78, 'Trainee de Negócios Web'),
(79, 'Assistente de Negócios Web'),
(80, 'Auxiliar de Negócios Web'),
(81, 'Estagiário de Negócios Web'),
(82, 'Diretor de Processamento de Dados'),
(83, 'Gerente de Processamento de Dados'),
(84, 'Coordenador de Processamento de Dados'),
(85, 'Supervisor de Processamento de Dados'),
(86, 'Analista de Processamento de Dados Sênior'),
(87, 'Analista de Processamento de Dados Pleno'),
(88, 'Analista de Processamento de Dados Júnior'),
(89, 'Trainee de Processamento de Dados'),
(90, 'Operador de Processamento de Dados'),
(91, 'Assistente de Processamento de Dados'),
(92, 'Auxiliar de Processamento de Dados'),
(93, 'Digitador'),
(94, 'Estagiário de Processamento de Dados'),
(95, 'Diretor de Programação'),
(96, 'Gerente de Programação'),
(97, 'Coordenador de Programação'),
(98, 'Supervisor de Programação'),
(99, 'Analista Programador Sênior'),
(100, 'Analista Programador Pleno'),
(101, 'Analista Programador Júnior'),
(102, 'Programador Sênior'),
(103, 'Programador Pleno'),
(104, 'Programador Júnior'),
(105, 'Assistente de Programação'),
(106, 'Trainee de Programação'),
(107, 'Auxiliar de Programação'),
(108, 'Estagiário de Programação'),
(109, 'Gerente de Qualidade de Software'),
(110, 'Coordenador de Qualidade de Software'),
(111, 'Supervisor de Qualidade de Software'),
(112, 'Analista de Qualidade de Software Sênior'),
(113, 'Analista de Qualidade de Software Pleno'),
(114, 'Analista de Qualidade de Software Júnior'),
(115, 'Assistente de Qualidade de Software'),
(116, 'Estagiário de Qualidade de Software'),
(117, 'Analista de Redes Sociais Sênior'),
(118, 'Analista de Redes Sociais Pleno'),
(119, 'Analista de Redes Sociais Júnior'),
(120, 'Gerente de Segurança da Informação'),
(121, 'Coordenador de Segurança da Informação'),
(122, 'Consultor de Segurança da Informação'),
(123, 'Supervisor de Segurança da Informação'),
(124, 'Analista de Segurança da Informação Sênior'),
(125, 'Analista de Segurança da Informação Pleno'),
(126, 'Analista de Segurança da Informação Júnior'),
(127, 'Assistente de Segurança da Informação'),
(128, 'Estagiário de Segurança da Informação'),
(129, 'Diretor de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(130, 'Gerente de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(131, 'Coordenador de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(132, 'Supervisor de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(133, 'Consultor de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(134, 'Analista de Sistemas (Projetos / Desenvolvimento / Consultoria) Sênior'),
(135, 'Analista de Sistemas (Projetos / Desenvolvimento / Consultoria) Pleno'),
(136, 'Analista de Sistemas (Projetos / Desenvolvimento / Consultoria) Júnior'),
(137, 'Analista de Requisitos Sênior'),
(138, 'Analista de Requisitos Pleno'),
(139, 'Analista de Requisitos Júnior'),
(140, 'Analista de Testes Sênior'),
(141, 'Analista de Testes Pleno'),
(142, 'Analista de Testes Júnior'),
(143, 'Trainee de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(144, 'Assistente de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(145, 'Auxiliar de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(146, 'Estagiário de Sistemas (Projetos / Desenvolvimento / Consultoria)'),
(147, 'Diretor de Suporte Técnico em Informática – Help Desk'),
(148, 'Gerente de Suporte Técnico em Informática – Help Desk'),
(149, 'Coordenador de Suporte Técnico em Informática – Help Desk'),
(150, 'Supervisor de Suporte Técnico em Informática – Help Desk'),
(151, 'Consultor de Suporte Técnico em Informática – Help Desk'),
(152, 'Analista de Suporte Técnico em Informática – Help Desk Sênior'),
(153, 'Analista de Suporte Técnico em Informática – Help Desk Pleno'),
(154, 'Analista de Suporte Técnico em Informática – Help Desk Júnior'),
(155, 'Técnico de Suporte em Informática – Help Desk'),
(156, 'Trainee de Suporte Técnico em Informática – Help Desk'),
(157, 'Assistente de Suporte Técnico em Informática – Help Desk'),
(158, 'Auxiliar de Suporte Técnico em Informática – Help Desk'),
(159, 'Estagiário de Suporte Técnico em Informática – Help Desk'),
(160, 'Diretor de Tecnologia da Informação'),
(161, 'Gerente de Tecnologia da Informação'),
(162, 'Consultor de Tecnologia da Informação'),
(163, 'Coordenador de Tecnologia da Informação'),
(164, 'Supervisor de Tecnologia da Informação'),
(165, 'Analista de Tecnologia da Informação Sênior'),
(166, 'Analista de Tecnologia da Informação Pleno'),
(167, 'Analista de Tecnologia da Informação Júnior'),
(168, 'Trainee de Tecnologia da Informação'),
(169, 'Assistente de Tecnologia da Informação'),
(170, 'Auxiliar de Tecnologia da Informação'),
(171, 'Estagiário de Tecnologia da Informação'),
(172, 'Diretor de Web Development'),
(173, 'Gerente de Web Development'),
(174, 'Coordenador de Web Development'),
(175, 'Supervisor de Web Development'),
(176, 'Analista de Web Development Sênior'),
(177, 'Analista de Web Development Pleno'),
(178, 'Analista de Web Development Júnior'),
(179, 'Trainee de Web Development'),
(180, 'Assistente de Web Development'),
(181, 'Auxiliar de Web Development'),
(182, 'Estagiário de Web Development');

INSERT INTO `empresa` (`nr_cnpj`,`ds_razao_social`, `ds_nome_fantasia`, `ds_endereco`, `cep`, `ds_area_atuacao`, `ds_nome_responsavel`, `ds_telefone`, `ds_email`, `ds_site`, `ds_senha`)
               VALUES ('81998739309', 'PublicVagas LTDA', 'Public Vagas', 'Rua Anderson de Barros', '87689-098', 'Desenvolvimento de sistemas', 'Funcionario', '8158987698', 'publicvagas@gmail.com', 'www.publicvagas.com.br', '123456'),
                      ('123', '123', '123', '123', '123', 'Desenvolvimento de sistemas', '123', '123', '123', '123', '123');

INSERT INTO `vaga`
(`ds_titulo`,
  `cd_cargo`,
  `tp_contratacao`,
  `vl_salario`,
  `nr_qtd_vaga`,
  `nr_experiencia`,
  `ds_beneficios`,
  `ds_observacao`,
  `ds_segunda_etapa`,
  `cd_empresa` 
 )
VALUES
  ('Desenvolvedor Php', 1, 'Estagio', 2000.00, 2, 'Nenhuma', 'Plano de Saúde, Plano odontológico,Seguro de vida, Vale alimentação, Vale transporte, Plano de carreira','Integral', 'Comparecer com documentos em mãos', 1),
  ('Engenheiro de Dados', 2,'CLT', 4000.00, 4, 'Dois anos', 'Plano de Saúde, Plano odontológico, Seguro de vida, Vale alimentação, Vale transporte, Plano de carreira','Integral', 'Comparecer com Exame Admicional em Mãos', 2),
  ('Engenheiro de Processos', 2,'CLT', 4500.00, 2, 'Quatro anos', 'Plano de Saúde, Plano odontológico, Seguro de vida, Vale alimentação, Vale transporte, Plano de carreira','Integral', 'Comparecer com Documntos em mãos',2);