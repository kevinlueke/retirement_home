<?php

include 'db.php';

$queryRoles = "INSERT INTO Roles (name, rank)
               VALUES ('Admin', 0),
                      ('Supervisor', 1),
                      ('Doctor', 2),
                      ('Caregiver', 3),
                      ('Family Member', 4),
                      ('Patient', 5);";
if(mysqli_query($conn, $queryRoles)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryRoles. " . mysqli_error($conn);
}

$queryUsers = "INSERT INTO Users (role_id, first_name, last_name, email, phone, password, date_of_birth, approved)
               VALUES (0, 'Kevin', 'Lueke', 'kevinlueke66@gmail.com', '7171111111', 'qwerty', '2000-09-26', 1),
                      (0, 'Scott', 'Johnson', 'scottyjohnson002@gmail.com', '7170000000', 'qwerty', '2002-03-13', 1),
                      (1, 'Bob', 'Jenkins', 'bjenks@gmail.com', '1234567890', 'pass', '1999-03-29', 0),
                      (5, 'Dale', 'Films', 'dalefilms@old.com', '1010101010', 'word', '1950-10-11', 0),
                      (0, 'admin', 'admin', 'admin@email.com', '0000000000', 'admin', '1988-09-07', 1),
                      (1, 'supervisor', 'supervisor', 'supervisor@email.com', '1111111111', 'supervisor', '1955-11-07', 1),
                      (2, 'doctor', 'doctor', 'doctor@email.com', '2222222222', 'doctor', '2010-04-16', 1),
                      (3, 'caregiver', 'caregiver', 'caregiver@email.com', '3333333333', 'caregiver', '1988-09-07', 1),
                      (4, 'family', 'family', 'family@email.com', '4444444444', 'family', '1977-12-25', 1),
                      (5, 'patient', 'patient', 'patient@email.com', '5555555555', 'patient', '1899-05-11', 1),
                      (3, 'John', 'Doe', 'johndoe@email.com', '1414141414', 'asdfgh', '1999-04-04', 1),
                      (3, 'Dan', 'Man', 'danman@email.com', '8787878787', 'asdfgh', '1994-05-05', 1),
                      (3, 'Jane', 'Doe', 'janedoe@email.com', '4343434343', 'asdfgh', '1975-05-05', 1);";

if(mysqli_query($conn, $queryUsers)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryUsers. " . mysqli_error($conn);
}

$queryEmployees = "INSERT INTO Employees (employee_id, salary)
                   VALUES (0, 80000),
                          (1, 90000),
                          (2, 60000),
                          (4, 55000),
                          (5, 88000),
                          (6, 120000),
                          (7, 23000);";

if(mysqli_query($conn, $queryEmployees)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryEmployees. " . mysqli_error($conn);
}

$queryGroup = "INSERT INTO `Group` (name)
               VALUES ('red'),
                      ('blue'),
                      ('green'),
                      ('yellow');";

if(mysqli_query($conn, $queryGroup)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryGroup. " . mysqli_error($conn);
}

$queryPatients = "INSERT INTO Patients (patient_id, group_id, family_code, emergency_contact, relation_emergency_contact, admission_date)
                  VALUES (3, 0, 'a', 'George Hinds', 'Father', '1999-10-21'),
                         (9, 1, 'b', 'Milda Gwain', 'Daughter', '2010-01-08');";

if(mysqli_query($conn, $queryPatients)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryPatients. " . mysqli_error($conn);
}

$queryAppointments = "INSERT INTO Appointments (patient_id, doctor_id, appointment_date)
                      VALUES (3, 6, '2020-09-09');";

if(mysqli_query($conn, $queryAppointments)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryAppointments. " . mysqli_error($conn);
}

$queryRoster = "INSERT INTO Roster (roster_date, supervisor_id, doctor_id, caregiver_1, caregiver_2, caregiver_3, caregiver_4, group_id)
                VALUES ('2020-11-16', 5, 6, 7, 10, 11, 12, 0);";

if(mysqli_query($conn, $queryRoster)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryRoster. " . mysqli_error($conn);
}

$queryPatientActivities = "INSERT INTO PatientActivities (patient_id, activity_date, doctor_appointment, morning_meds, afternoon_meds, night_meds, breakfast, lunch, dinner)
                           VALUES (9, '2020-11-16', 0, 1, 0, 0, 1, 0, 0);";

if(mysqli_query($conn, $queryPatientActivities)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryPatientActivities. " . mysqli_error($conn);
}

$queryMedicine = "INSERT INTO Medicine (name)
                  VALUES ('Advil'),
                         ('Tylenol'),
                         ('Cocaine');";

if(mysqli_query($conn, $queryMedicine)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryMedicine. " . mysqli_error($conn);
}

$queryPatientMedication = "INSERT INTO PatientMedication (patient_id, medication_id, time_taken)
                           VALUES (9, 2, 'Morning');";

if(mysqli_query($conn, $queryPatientMedication)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryPatientMedication. " . mysqli_error($conn);
}

$queryReceipt = "INSERT INTO Receipt (amount_paid, patient_id, date_paid)
                 VALUES (50, 3, '2020-11-16');";

if(mysqli_query($conn, $queryReceipt)){
    echo "Records inserted successfully.";
} else{
    echo "ERROR: Could not able to execute $queryReceipt. " . mysqli_error($conn);
}

?>

