<?php

include 'db.php';

mysqli_query($conn, "DROP TABLE IF EXISTS Receipt");
mysqli_query($conn, "DROP TABLE IF EXISTS PatientMedication");
mysqli_query($conn, "DROP TABLE IF EXISTS Medicine");
mysqli_query($conn, "DROP TABLE IF EXISTS Group");
mysqli_query($conn, "DROP TABLE IF EXISTS PatientActivities");
mysqli_query($conn, "DROP TABLE IF EXISTS Roster");
mysqli_query($conn, "DROP TABLE IF EXISTS Appointments");
mysqli_query($conn, "DROP TABLE IF EXISTS Patients");
mysqli_query($conn, "DROP TABLE IF EXISTS Employees");
mysqli_query($conn, "DROP TABLE IF EXISTS Users");
mysqli_query($conn, "DROP TABLE IF EXISTS Roles");

// When a value other than NULL is entered into the column of a FOREIGN KEY constraint, the value must exist in the referenced column; otherwise, a foreign key violation error message is returned. To make sure that all values of a composite foreign key constraint are verified, specify NOT NULL on all the participating columns.
$queryRoles = "CREATE TABLE Roles (id bigint PRIMARY KEY AUTO_INCREMENT, name varchar(20), rank integer);";
$resultRoles = mysqli_query($conn, $queryRoles);

$queryEmployees = "CREATE TABLE Employees (id bigint PRIMARY KEY AUTO_INCREMENT, employee_id bigint REFERENCES Users (id), salary bigint DEFAULT NULL);";
$resultEmployees = mysqli_query($conn, $queryEmployees);

$queryUsers = "CREATE TABLE Users(id bigint PRIMARY KEY AUTO_INCREMENT, role_id bigint REFERENCES Roles (id), first_name varchar(20) NOT NULL, last_name varchar(20) NOT NULL, email varchar(50) NOT NULL, phone varchar(15) NOT NULL,password varchar(255) NOT NULL, date_of_birth date, approved boolean DEFAULT NULL);";
$resultUsers = mysqli_query($conn, $queryUsers);

//**** use ``(backtick) in group because GROUP is a reserved mysql keyword****
$queryGroup = "CREATE TABLE `Group` (id bigint PRIMARY KEY AUTO_INCREMENT, name varchar(50) NOT NULL);";
$resultGroup = mysqli_query($conn, $queryGroup);

$queryReceipt = "CREATE TABLE Receipt (id bigint PRIMARY KEY AUTO_INCREMENT, amount_paid bigint DEFAULT 0, patient_id bigint REFERENCES Patients (patient_id), date_paid date );";
$resultReceipt = mysqli_query($conn, $queryReceipt);

$queryMedicine = "CREATE TABLE Medicine (id bigint PRIMARY KEY AUTO_INCREMENT, name varchar(50) NOT NULL);";
$resultMedicine = mysqli_query($conn, $queryMedicine);

$queryPatients = "CREATE TABLE Patients (id bigint PRIMARY KEY AUTO_INCREMENT, patient_id bigint REFERENCES Users (id) , group_id bigint REFERENCES `Group` (id) , family_code varchar(20) NOT NULL, emergency_contact varchar(40) NOT NULL, relation_emergency_contact varchar(20) NOT NULL, admission_date date);";
$resultPatients = mysqli_query($conn, $queryPatients);

$queryPatientMedication = "CREATE TABLE PatientMedication (id bigint PRIMARY KEY AUTO_INCREMENT, patient_id bigint REFERENCES Patients (patient_id) , medication_id bigint REFERENCES Medicine (id), time_taken varchar(30) NOT NULL);";
$resultPatientMedication = mysqli_query($conn, $queryPatientMedication);

$queryPatientActivities = "CREATE TABLE PatientActivities (id bigint PRIMARY KEY AUTO_INCREMENT, patient_id bigint REFERENCES Patients (patient_id), activity_date date NOT NULL, doctor_appointment boolean DEFAULT FALSE, morning_meds boolean DEFAULT FALSE, afternoon_meds boolean DEFAULT FALSE, night_meds boolean DEFAULT FALSE, breakfast boolean DEFAULT FALSE, lunch boolean DEFAULT FALSE, dinner boolean DEFAULT FALSE);";
$resultPatientActivities = mysqli_query($conn, $queryPatientActivities);

$queryRoster = "CREATE TABLE Roster (id bigint PRIMARY KEY AUTO_INCREMENT, roster_date date NOT NULL UNIQUE, supervisor_id bigint REFERENCES Employees (employee_id), doctor_id bigint REFERENCES Employees (employee_id), caregiver_1 bigint REFERENCES Employees (employee_id), caregiver_2 bigint REFERENCES Employees (employee_id), caregiver_3 bigint REFERENCES Employees (employee_id), caregiver_4 bigint REFERENCES Employees (employee_id));";
$resultRoster = mysqli_query($conn, $queryRoster);

$queryAppointments = "CREATE TABLE Appointments (id bigint PRIMARY KEY AUTO_INCREMENT, patient_id bigint REFERENCES Patients (patient_id), doctor_id bigint REFERENCES Employees (employee_id) , appointment_date date NOT NULL);";
$resultAppointments = mysqli_query($conn, $queryAppointments);

$conn->close();

?>
