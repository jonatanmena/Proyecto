/* CREATE DATABASE GoToEvent; */

/* USE GoToEvent; */

/*
CREATE TABLE Clients(
  ID_Client INT AUTO_INCREMENT,
  Name VARCHAR(20) NOT NULL,
  Surname VARCHAR(20) NOT NULL,
  DNI INT(10) NOT NULL UNIQUE,
  PRIMARY KEY (ID_Client)
);

CREATE TABLE Purchases(
  ID_Purchase INT AUTO_INCREMENT,
  PurchaseDate DATE NOT NULL,
  ID_Client INT NOT NULL,
  PRIMARY KEY (ID_Purchase),
  FOREIGN KEY (ID_Client) REFERENCES Clients(ID_Client)
);

CREATE TABLE Purchase_Lines(
  ID_Purchase_line INT AUTO_INCREMENT,
  Quantity INT(10) NOT NULL,
  Price float(10,2) NOT NULL,
  ID_Purchase INT NOT NULL,
  PRIMARY KEY(ID_Purchase_line),
  FOREIGN KEY (ID_Purchase) REFERENCES Purchases(ID_Purchase)
);

CREATE TABLE Tickets(
  ID_Ticket INT AUTO_INCREMENT,
  TicketNumber INT (10) NOT NULL UNIQUE,
  QR VARCHAR(50) NOT NULL,
  PRIMARY KEY(ID_Ticket)
);

CREATE TABLE Square_Kinds(
  ID_Square_Kind INT AUTO_INCREMENT,
  Description VARCHAR(50) NOT NULL,
  PRIMARY KEY(ID_Square_Kind)
);

CREATE TABLE Place_Events(
  ID_Place_Event INT AUTO_INCREMENT,
  Quantity INT (10) NOT NULL,
  Description VARCHAR (50) NOT NULL,
  PRIMARY KEY(ID_Place_Event)
);

CREATE TABLE Categories(
  ID_Category INT AUTO_INCREMENT,
  Description VARCHAR(50) NOT NULL,
  PRIMARY KEY(ID_Category)
);

CREATE TABLE Events(
  ID_Event INT AUTO_INCREMENT,
  Title VARCHAR(20) NOT NULL UNIQUE,
  ID_Category INT NOT NULL,
  PRIMARY KEY (ID_Event),
  FOREIGN KEY (ID_Category) REFERENCES Categories(ID_Category)
);

CREATE TABLE Calendars(
  ID_Calendar INT AUTO_INCREMENT,
  CalendarDate DATE NOT NULL,
  ID_Event INT NOT NULL,
  PRIMARY KEY(ID_Calendar),
  FOREIGN KEY (ID_Event) REFERENCES Events(ID_Event)
);
*/

/*
CREATE TABLE Artists(
  ID_Artist INT AUTO_INCREMENT,
  Name VARCHAR(20) NOT NULL,
  Description VARCHAR(50) NOT NULL,
  Gender VARCHAR(20) NOT NULL,
  Portrait VARCHAR(50) NOT NULL,
  ID_Calendar INT NOT NULL,
  PRIMARY KEY(ID_Artist)
)
*/
/*
CREATE TABLE CalendarXArtist(
    ID_Artist INT(11) NOT NULL,
    ID_Calendar INT(11) NOT NULL,
    FOREIGN KEY (ID_Artist) REFERENCES artists(ID_Artist),
    FOREIGN KEY (ID_Calendar) REFERENCES calendars(ID_Calendar)
)
*/
/*
CREATE TABLE Square_Events(
  ID_Square_Event INT AUTO_INCREMENT,
  Remainder VARCHAR(30) NOT NULL,
  Price FLOAT(10,2) NOT null,
  Quantity_available INT(10) NOT NULL,
  ID_Square_Kind INT NOT NULL,
  PRIMARY KEY (ID_Square_Event),
  FOREIGN KEY (ID_Square_Kind) REFERENCES Square_Kinds(ID_Square_Kind)
);
*/
/*
ALTER TABLE
    square_events ADD ID_Calendar INT NOT NULL;

ALTER TABLE
    square_events ADD CONSTRAINT ID_Calendar FOREIGN KEY(ID_Calendar) REFERENCES calendars(ID_Calendar)
*/

/*
CREATE TABLE Users(
  ID_User INT AUTO_INCREMENT,
  User varchar(30) NOT NULL,
  Password VARCHAR(30) NOT NULL,
  Privilege int(1) NOT NULL,
  PRIMARY KEY (ID_User)
);
*/
