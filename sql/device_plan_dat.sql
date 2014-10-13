insert into floor_plan (title, description, width, height) values ("Bureau de Genève", "Surface de vente des Bergues", 1000, 800); 
insert into floor_plan (title, description, width, height) values ("Fabrique de Cheseaux", "Fabrique cartes spécialisées", 1000, 800); 

insert into area (plan_id, name, description) values (1, 'Vente', 'Local de vente');
insert into area (plan_id, name, description) values (1, 'Bureau1', 'Bureau de Genève');
insert into area (plan_id, name, description) values (2, 'Bureau2', 'Bureau de Cheseaux');
insert into area (plan_id, name, description) values (2, 'Fabrication', 'Local de fabrication');