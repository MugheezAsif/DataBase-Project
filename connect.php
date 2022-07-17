<?php
#error_reporting(0);
error_reporting(E_ALL ^ E_WARNING);
$button = $_POST['button'];
$mainid = $_POST['mainid'];
# Variables for Hospital Table
$hospitalId = $_POST['hospitalId'];
$hospitalName = $_POST['hospitalName'];
$hospitaladdress = $_POST['hospitaladdress'];
$hospitaltype = $_POST['hospitaltype'];
$hospitalemail = $_POST['hospitalemail'];
$hospitalnumber = $_POST['hospitalnumber'];

# Variables for department
$departmentid = $_POST['departmentid'];
$departmentname = $_POST['managername'];

# Variables for Employee table
$employeeid = $_POST['employeeid'];
$employeename = $_POST['employeename'];
$employeeaddress = $_POST['employeeaddress'];
$designation = $_POST['designation'];
$employeeage = $_POST['employeeage'];
$employeephonenumber = $_POST['employeephonenumber'];

# variables for doctor table
$doctorid = $_POST['doctorid'];
$doctorfirstname = $_POST['doctorfirstname'];
$doctorlastname = $_POST['doctorlastname'];
$doctortype = $_POST['doctortype'];

# variables for patient table
$patientid = $_POST['patientid'];
$patientfirstname = $_POST['patientfirstname'];
$patientlastname = $_POST['patientlastname'];
$patientgender = $_POST['patientgender'];
$patientaddress = $_POST['patientaddress'];
$patientphonenumber = $_POST['patientphonenumber'];

# variables for appointment table
$appointmentid = $_POST['appointmentid'];
$appointmenttime = $_POST['appointmenttime'];
$appointmentdate = $_POST['appointmentdate'];

# variables for Nurse table
$nurseid = $_POST['nurseid'];
$nursename = $_POST['nursename'];

# variables for Laboratory
$labid = $_POST['labid'];
$patientphonenumber = $_POST['patientphonenumber'];

# variables for room
$roomid = $_POST['roomid'];
$roomnumber = $_POST['roomnumber'];
$roomstatus = $_POST['roomstatus'];

# variable for patient report
$reportid = $_POST['reportid'];
$diagnose = $_POST['diagnose'];
$medication = $_POST['medication'];

# variables for medication
$medicationid = $_POST['medicationid'];
$quantity = $_POST['quantity'];

# variables for medicine
$medicineid  = $_POST['medicineid'];
$medicinename = $_POST['medicinename'];
$medicineprice = $_POST['medicineprice'];
$medicinetype = $_POST['medicinetype'];
$medicinedescription = $_POST['medicinedescription'];

# variables for test
$testid = $_POST['testid'];
$testcost = $_POST['testcost'];
$testtype = $_POST['testtype'];

$conn = new mysqli('localhost','root', '','hospitalmanagementsystem');

if ($conn->connect_error)
{
  die('Connection Failed : ' .$conn->connect_error);
}

else {
  while (1) {
    if ($button == "hospital") {
      $stmt = $conn->prepare("insert into hospital(hospitalId, hospitalName, type, address, email, contactNumber)
      values(?,?,?,?,?,?)");
      $stmt->bind_param("issssi", $hospitalId, $hospitalName, $hospitaltype, $hospitaladdress, $hospitalemail, $hospitalnumber);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }
    elseif ($button == "department") {
      $stmt = $conn->prepare("insert into department(departmentId ,departmentName ,manager,hospitalId)
      values(?,?,?,?)");
      $stmt->bind_param("issi",  $departmentid,$departmentname, $manager, $hospitalId);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }
    elseif ($button == "employee") {
      $stmt = $conn->prepare("insert into employee(employeeId,name ,address,designation,age,phoneNumber,departmentId )
      values(?,?,?,?,?,?,?)");
      $stmt->bind_param("isssiii", $employeeid,$employeename,$employeeaddress,$designation,$employeeage,$employeephonenumber, $departmentid);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }
    elseif ($button == "doctor") {
      $stmt = $conn->prepare("insert into Doctor(doctorId,firstName ,lastName,employeeId)
      values(?,?,?,?)");
      $stmt->bind_param("issi", $doctorid, $doctorfirstname,$doctorlastname,$employeeid);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }
    elseif ($button == "nurse") {
      $stmt = $conn->prepare("insert into Nurse(nurseId,name ,roomId,employeeId)
      values(?,?,?,?)");
      $stmt->bind_param("isii", $nurseid,$nursename, $roomid, $employeeid);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }
    elseif ($button == "patient") {
      $stmt = $conn->prepare("insert into Patient(patientId,firstName ,lastName,gender,address,contactNumber)
      values(?,?,?,?,?,?)");
      $stmt->bind_param("issssi", $patientid,$patientfirstname,$patientlastname,$patientgender,$patientaddress,$patientphonenumber);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }
    elseif ($button == "report") {
      $stmt = $conn->prepare("insert into PatientReport(reportId ,diagnose ,medication,patientId,doctorId)
      values(?,?,?,?,?)");
      $stmt->bind_param("issii",$reportid,$diagnose,$medication, $patientid, $doctorid);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }elseif ($button == "appointment") {
      $stmt = $conn->prepare("insert into Appointment(appointmentId,date ,time,patientId,doctorId)
     values(?,?,?,?,?)");
     $stmt->bind_param("issii", $appointmentid ,$appointmenttime,$appointmentdate, $patientId, $doctorid);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }elseif ($button == "room") {
      $stmt = $conn->prepare("insert into Room(roomId ,roomNumber ,status,departmentId,nurseId,patientId, doctorId)
      values(?,?,?,?,?,?,?)");
      $stmt->bind_param("iisiiii", $roomid,$roomnumber,$roomstatus,$departmentid, $nurseid, $patientid, $doctorid);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }elseif ($button == "lab") {
      $stmt = $conn->prepare("insert into Laboratory(labId,patientContact ,patientId,departmentId)
      values(?,?,?,?)");
      $stmt->bind_param("iiii", $labid,$patientphonenumber, $patientid, $departmentid);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }elseif ($button == "medication") {
      $stmt = $conn->prepare("insert into Medication(medicationId ,quantity ,medicineId,reportId)
      values(?,?,?,?)");
      $conn->close();
      break;
    }elseif ($button == "medicine") {
      $stmt = $conn->prepare("insert into Medicine(medicineId ,name ,type ,price,description)
      values(?,?,?,?,?)");
      $stmt->bind_param("issis", $medicineid,$medicinename,$medicineprice,$medicinetype ,$medicinedescription, );
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }elseif ($button == "test") {
      $stmt = $conn->prepare("insert into Test(testId ,cost,type)
      values(?,?,?)");
      $stmt->bind_param("iis", $testid,$testcost,$testtype);
      $stmt->execute();
      $stmt->close();
      $conn->close();
      break;
    }
    else if ($button[0] == 'u')
    {
      if ($button == 'u-hs')
      {
        $sql = "DELETE FROM hospital WHERE hospitalId=".$mainid;
        $qry = $conn->query($sql);
        $button = "hospital";
      }
      else if ($button == 'u-do')
      {
        $sql = "DELETE FROM doctor WHERE doctorId=".$mainid;
        $qry = $conn->query($sql);
        $button = "doctor";
      }
      else if ($button == 'u-em')
      {
        $sql = "DELETE FROM employee WHERE employeeId=".$mainid;
        $qry = $conn->query($sql);
        $button = "employee";
      }
      else if ($button == 'u-pi')
      {
        $sql = "DELETE FROM patient WHERE patientId=".$mainid;
        $qry = $conn->query($sql);
        $button = "patient";
      }
      else if ($button == 'u-nu')
      {
        $sql = "DELETE FROM nurse WHERE nurseId=".$mainid;
        $qry = $conn->query($sql);
        $button = "nurse";
      }
      else if ($button == "u-de")
      {
        $sql = "DELETE FROM department WHERE departmentId=".$mainid;
        $qry = $conn->query($sql);
        $button = "department";
      }
      else if ($button == 'u-lb')
      {
        $sql = "DELETE FROM Laboratory WHERE labId=".$mainid;
        $qry = $conn->query($sql);
        $button = "lab";
      }
      else if ($button == 'u-rm')
      {
        $sql = "DELETE FROM room WHERE roomId=".$mainid;
        $qry = $conn->query($sql);
        $button = "room";
      }
      else if ($button == 'u-pr')
      {
        $sql = "DELETE FROM patient report WHERE reportId=".$mainid;
        $qry = $conn->query($sql);
        $button = "report";
      }
      else if ($button == 'u-t')
      {
        $sql = "DELETE FROM test WHERE testId=".$mainid;
        $qry = $conn->query($sql);
        $button = "test";
      }
      else if ($button == 'u-ap')
      {
        $sql = "DELETE FROM appointment WHERE appointmentId=".$mainid;
        $qry = $conn->query($sql);
        $button = "appointment";
      }
      else if ($button == 'u-md')
      {
        $sql = "DELETE FROM medication WHERE medicationId=".$mainid;
        $qry = $conn->query($sql);
        $button = "medication";
      }
      else if ($button == 'u-me')
      {
        $sql = "DELETE FROM medicine WHERE medicineId=".$mainid;
        $qry = $conn->query($sql);
        $button = "medicine";
      }
    }
    else if ($button[0] == 'd')
    {
      if ($button == 'd-hs')
      {
        $sql = "DELETE FROM hospital WHERE hospitalId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-do')
      {
        $sql = "DELETE FROM doctor WHERE doctorId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-em')
      {
        $sql = "DELETE FROM employee WHERE employeeId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-pi')
      {
        $sql = "DELETE FROM patient WHERE patientId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-nu')
      {
        $sql = "DELETE FROM nurse WHERE nurseId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == "d-de")
      {
        $sql = "DELETE FROM department WHERE departmentId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-lb')
      {
        $sql = "DELETE FROM Laboratory WHERE labId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-rm')
      {
        $sql = "DELETE FROM room WHERE roomId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-pr')
      {
        $sql = "DELETE FROM patient report WHERE reportId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-t')
      {
        $sql = "DELETE FROM test WHERE testId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-ap')
      {
        $sql = "DELETE FROM appointment WHERE appointmentId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-md')
      {
        $sql = "DELETE FROM medication WHERE medicationId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
      else if ($button == 'd-me')
      {
        $sql = "DELETE FROM medicine WHERE medicineId=".$mainid;
        $qry = $conn->query($sql);
        break;
      }
    }
  }




  }


?>
