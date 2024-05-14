INSERT INTO sub_area (nome_sub_area, cor)VALUES
('Arquitetura e Urbanismo', 'Vermelho'),
('Administração' , 'Azul'),
('Finanças e Contabilidade', 'Amarelo'),
('Gestão de Pessoas e Liderança', 'Cinza');

INSERT INTO sub_area (nome_sub_area, cor)VALUES
('Computação Gráfica e Internet', 'Blue');

INSERT INTO docente (nome_docente)VALUES
('Aécio'),
('Luana');

SELECT * FROM reserva;

INSERT INTO informacoes_curso(nome_curso, sigla_curso, codigo_turma, oferta, periodo, cor, sub_area_id, docente_id) VALUES 
('TÉCNICO EM INFORMÁTICA PARA INTERNET','TII05', 'TECNICO', '0000005', 'noite', 'azul', 5, 2);

 INSERT INTO sala(sala_lab, capacidade) VALUES
 (18, '45 alunos'),
 (44, '30 alunos');
 
INSERT INTO reserva(data_incial, data_final, hora_inicio, hora_finaliza, curso_id, sala_id) VALUES
 ('2024-05-01', '2024-05-30', '19:00', '22:30', 1, 1);

