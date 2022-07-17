create database hospitalManagementSystem;
use hospitalManagementSystem;

create table Hospital(
	hospitalId int not null,
    hospitalName varchar(100) not null,
    type varchar(15),
    address varchar(100),
    email varchar(20),
    contactNumber int,
    primary key(hospitalID)
);
create table department(
	departmentId int not null,
    departmentName varchar(25),
    manager varchar(15),
    hospitalId int,
    primary key (departmentId),
    foreign key (hospitalId) references Hospital(hospitalId)
);
create table employee (
	employeeId int not null,
    name varchar(15),
    address varchar(100),
    designation varchar(20),
    age int,
    phoneNumber int,
    departmentId int,
    primary key(employeeId),
    foreign key (departmentId) references Department(departmentId)
);
create table Doctor(
	doctorId int not null,
    firstName varchar(15),
    lastName varchar(15),
    employeeId int,
    primary key (doctorId),
    foreign key (employeeId) references Employee(employeeId)
);
create table Nurse(
	nurseId int not null,
    name varchar(15),
    roomId int,
    employeeId int,
    primary key (nurseId),
    foreign key (employeeId) references Employee(employeeId)
);
create table Patient(
	patientId int not null,
	firstName varchar(15),
    lastName varchar(15),
    gender varchar(6),
    address varchar(100),
    contactNumber int,
    primary Key (patientId)
);
create table Appointment(
	appointmentId int not null,
    date date,
    time int,
    patientId int,
    doctorId int,
    primary key (appointmentId),
    foreign key (patientId) references Patient(patientId),
    foreign key (doctorId) references Doctor(doctorId)
);
create table Room(
	roomId int not null,
    roomNumber int not null,
    status varchar(10),
    departmentId int,
    nurseId int,
    patientId int,
    doctorId int,
    primary key (roomId),
    foreign key (departmentId) references department(departmentId),
    foreign key (nurseId) references nurse(nurseId),
    foreign key (patientId) references Patient(patientId),
    foreign key (doctorId) references doctor(doctorId)
);
create table Laboratory(
	labId int not null,
    patientContact int not null,
    patientId int,
    departmentId int,
    primary key (labId),
    foreign key (patientId) references Patient(patientId),
    foreign key (departmentId) references Department(departmentId)
);
create table Test(
	testId int not null,
    cost int,
    type varchar(15),
    primary key (testId)
);
create table PatientReport(
	reportId int not null,
    diagnose varchar(25),
	medication varchar(25),
    patientId int,
    doctorId int,
    primary key (reportId),
    foreign key(patientId) references Patient(patientId),
    foreign key(doctorId) references Doctor(doctorId)
);
create table Medication(
	medicationId int not null,
    quantity int,
    medicineId int,
	reportId int,
    primary key (medicationId),
    foreign key (reportId) references PatientReport(reportId),
    foreign key (medicineId) references Medicine(medicineId)
);
create table Medicine(
	medicineId int not null,
    name varchar(15),
    type varchar(15),
    price int,
    description varchar(150),
    primary key (medicineId)
);