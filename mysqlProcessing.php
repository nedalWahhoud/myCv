<?php 
include 'dataProcessing.php';
function mysqlConnect()
{
   $host_name = '127.0.0.1';
   $database = 'mycv';
   $user_name = 'root';
   $password = ''; 
  try
  {
    $conn = new mysqli(hostname: $host_name, username: $user_name, password: $password, database: $database);
    if ($conn) {
        writeLog(logType: 'info',message: "MySQL connected successfully");
        return $conn;  
    } else {
        writeLog(logType: 'Error',message: "Connection failed");
        return null;  
    }
  }
  catch (Exception $e)
  {
    writeLog(logType: 'error', message: 'Exception: ' . $e->getMessage());
    return null;
  }
}
$conn = mysqlConnect();
function getDatabase($queryCode,$type,$key_word): array|null {
    global $conn;
    if(!$conn)
    {
      writeLog(logType: 'Error',message: "conn Variable is empty, Function: getTranslation");
      return null; 
    }
    
    $sql="";
    if($queryCode == 'translation')  
     $sql = "SELECT * FROM translation WHERE key_word = ?";
    elseif('data')
     $sql = "SELECT * FROM data WHERE id = ?";


    $stmt = $conn->prepare(query: $sql);
    // Check whether the prepared statement was created correctly
    if ($stmt === false) {
      writeLog(logType: 'Error',message: 'Error query: ' . $conn->error);
    } 
    // Binding parameters
    $stmt->bind_param($type,$key_word);
    // Execute query
    $stmt->execute();
    // Save result
    $result = $stmt->get_result();
    $rows = [];
    // Check if results are available
    if ($result->num_rows > 0) {
         $rows = $result->fetch_assoc();   
    } else {
         writeLog(logType: 'Warning',message: "getTranslation: No rows found.");
    }
    $stmt->close();
     
 return $rows;
}

function getSkills(): array|null{
      $rows = query(sql: "SELECT * FROM translation t1 INNER JOIN skills t2 ON t1.key_word = t2.key_word ORDER BY t2.id ASC;");
  return $rows;
}
function getExperience(): array|null{
    $rows = query(sql:"SELECT * FROM translation t1 INNER JOIN experience t2 ON t1.key_word = t2.key_word ORDER BY t2.id ASC;");

    return $rows;
}

function query($sql): array|null{
    global $conn;
    if(!$conn)
    {
      writeLog(logType: 'Warning',message: "conn Variable is empty, Function: getCv");
      return null; 
    }
    //$sql = "SELECT * FROM translation t1 INNER JOIN skills t2 ON t1.key_word = t2.key_word";
    $stmt = $conn->prepare(query: $sql);
    // Check whether the prepared statement was created correctly
    if ($stmt === false) {
      writeLog(logType: 'Error',message: 'Error query: ' . $conn->error);
    } 
    // Execute query
    $stmt->execute();
    // Save result
    $result = $stmt->get_result();
    $rows = [];
    // Check if results are available
    if ($result->num_rows > 0) {
         $rows = $result->fetch_all(mode: MYSQLI_ASSOC);  
    } else {
         writeLog(logType: 'Warning',message: "getSkills: No rows found.");
    }
    $stmt->close();

    return $rows;
}
?>