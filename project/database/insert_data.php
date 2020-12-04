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

//password_hash($password,PASSWORD_DEFAULT)


$queryUsers = "INSERT INTO Users (role_id, first_name, last_name, email, phone, password, date_of_birth, approved)
               VALUES (1, 'Kevin', 'Lueke', 'kevinlueke66@gmail.com', '7171111111', '$2y$10\$jNm2eD/HleGjM9MffUsqZ.mP5UMXW.7yw/aRtFHmJwp9g6mmUiHt2', '2000-09-26', 1), /* qwerty*/
                      (1, 'Scott', 'Johnson', 'scottyjohnson002@gmail.com', '7170000000', '$2y$10\$jNm2eD/HleGjM9MffUsqZ.mP5UMXW.7yw/aRtFHmJwp9g6mmUiHt2', '2002-03-13', 1), /* qwerty*/
                      (2, 'Bob', 'Jenkins', 'bjenks@gmail.com', '1234567890', '$2y$10\$QerAfBaV4WUyiY/v2jnFz.CqGO5RkyZKJlOQ.GcFqu2L5RYMMs3Ay', '1999-03-29', 0),  /* pass*/
                      (6, 'Dale', 'Films', 'dalefilms@old.com', '1010101010', '$2y$10\$SHKDPjLpBoxWnTxF9c59v.zBe2kyUSr.a9C0SxkJuS423BGxSV0q6', '1950-10-11', 0),  /* word*/
                      (1, 'admin', 'admin', 'admin@email.com', '0000000000', '$2y$10\$8awnBfDxK8NFb.t1eQR/g.a3yAHxu.NtSbx72KrRchwBUcMh0KiZK', '1988-09-07', 1),  /* admin*/
                      (2, 'supervisor', 'supervisor', 'supervisor@email.com', '1111111111', '$2y$10\$YduvXWB2eTmD.dRwNJlZYuqEmoFCMU/syYKfQr/9wrGnYQmnHy2W.', '1955-11-07', 1), /* supervisor*/
                      (3, 'doctor', 'doctor', 'doctor@email.com', '2222222222', '$2y$10\$e8XpQe.jeJHrJKiP4tio1OgUy8seJVIKv.TmC50nAq4HfXnHtSArC', '2010-04-16', 1),  /* doctor*/
                      (4, 'caregiver', 'caregiver', 'caregiver@email.com', '3333333333', '$2y$10\$dYh6woKPsFOsz.bihGanQubAf.e2HKKSg8F40tGw5YNKNcioH0SKy', '1988-09-07', 1),  /* caregiver*/
                      (5, 'family', 'family', 'family@email.com', '4444444444', '$2y$10\$I1bPD1peqC4eKv4OzhEN2eSGUI8pXZwUgn2.VXz8EaxAKuNSzWz12', '1977-12-25', 1), /* family*/
                      (6, 'patient', 'patient', 'patient@email.com', '5555555555', '$2y$10\$MIKMxD0aM0DQANXsGCzTYuvDjaPfOLseELXb54KG8Xjso.ddMfkuC', '1899-05-11', 1), /* patient*/
                      (4, 'John', 'Doe', 'johndoe@email.com', '1414141414', '$2y$10\$S4GJYW/ItWngT2qdHBxDhO65i2oMjcCv.hFXR8wZd7YSS/cC9u6ru', '1999-04-04', 1), /* asdfgh*/
                      (4, 'Dan', 'Man', 'danman@email.com', '8787878787', '$2y$10\$S4GJYW/ItWngT2qdHBxDhO65i2oMjcCv.hFXR8wZd7YSS/cC9u6ru', '1994-05-05', 1), /* asdfgh*/
                      (4, 'Jane', 'Doe', 'janedoe@email.com', '4343434343', '$2y$10\$S4GJYW/ItWngT2qdHBxDhO65i2oMjcCv.hFXR8wZd7YSS/cC9u6ru', '1975-05-05', 1);"; /* asdfgh*/

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
                         (10, 1, 'b', 'Milda Gwain', 'Daughter', '2010-01-08');";

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
