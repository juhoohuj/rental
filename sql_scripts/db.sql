CREATE TABLE MOVIE (
    MovieID INT AUTO_INCREMENT,
    MovieName varchar(255),
    Length time,
    Language varchar(255),
    Genre varchar(255),
    Status varchar(255),
    PRIMARY KEY (MovieID)
);

CREATE TABLE CUSTOMER (
   CustomerID INT AUTO_INCREMENT PRIMARY KEY,
    FirstName varchar(255),
    SurName varchar(255)
);


CREATE TABLE RENT (
    RentID INT AUTO_INCREMENT PRIMARY KEY,
    CustomerID INT,
    MovieID INT,
    startDate DATETIME,
    endDate DATETIME,
    FOREIGN KEY (CustomerID) REFERENCES CUSTOMER(CustomerID),
    FOREIGN KEY (MovieID) REFERENCES MOVIE(MovieID)
);