drop table if exists LieuFournisseur,LieuClient,Produit,Client,Fournisseur,Lieu;

create table Fournisseur(
    idFournisseur serial primary key,
    Prenom text not null,
    Nom text not null,
    Mdp text not null,
    Email text not null check(Email like '_%@_%.__%'),
    Vente numeric not null default(0.0) check(Vente>=0),
    CompteBancaire text not null
);

create table Produit(
    idProduit serial primary key,
    Nom text not null,
    PrixUnit numeric not null check(PrixUnit>0),
    Nombre int not null default(0) check(Nombre>=0),
    Photo text not null,
    DureeConservationJour int check(DureeConservationJour>=0),
    Type text not null,
    idFournisseur int not null references Fournisseur
);

create table Lieu(
    idLieu serial primary key,
    Nom text not null
);

create table LieuFournisseur(
    idLieu int not null references Lieu,
    idFournisseur int not null references Fournisseur,
    primary key (idLieu,idFournisseur)
);

create table Client(
    idClient serial primary key,
    Prenom text not null,
    Nom text not null,
    Mdp text not null,
    Email text not null check(Email like '_%@_%.__%'),
    CompteBancaire text not null
);

create table LieuClient(
    idLieu int not null references Lieu,
    idClient int not null references Client,
    primary key(idLieu,idClient)
);

insert into Fournisseur
values (1,'Adrien','Chauvency','HUP42','adrienchauvency@wanadoo.fr',DEFAULT,'Banque postal'),
       (2,'Bryan','Moreau','BMW36','bryanmoreau5040@gmail.com',DEFAULT,'Société général');

insert into Produit
values (1,'Dakimakura',100,200,'../../Client/Image/Dakimakura.jpg',null,'Accessoire de literie',1),
       (2,'Accessoire déguisement chat',10,30,'../../Client/Image/Chat.jpg',null,'Deguisement',1),
       (3,'Kit Kat',0.50,100,'../../Client/Image/KitKat.jpg',10,'Nourriture',2),
       (4,'Coca Cola',1.20,10,'../../Client/Image/Coca.jpg',20,'Boisson',2);

insert into Client
values (1,'Gaylord','Delporte','GAY11','Gaylord@mail.de','Banque de France');

insert into Lieu
values (1,'Maubeuge'),
       (2,'Douai'),
       (3,'Denain'),
       (4,'Valenciennes');

insert into LieuFournisseur
values (1,1),
       (3,2);

insert into LieuClient
values (2,1),
       (4,1);

Grant all privileges on client to serveur;
Grant all privileges on Fournisseur to serveur;
Grant all privileges on Produit to serveur;
Grant all privileges on LieuFournisseur to serveur;
Grant all privileges on Lieu to serveur;
Grant all privileges on LieuClient to serveur;