<title>Labs</title>   

<?php
  $dbOk = false;
  @ $db = new mysqli('localhost', 'root', '', 'iitquiz3'); //finding the database that I am refering to 
  
  if ($db->connect_error) {
    echo '<div class="messages">Could not connect to the database. Error: '; //if database is not found
    echo $db->connect_errno . ' - ' . $db->connect_error . '</div>';
  } else {
    $dbOk = true; 
  }

  $havePost = isset($_POST["save"]); // button to svae to the database
  

  $errors = ''; //adding to the database from the from
  if ($havePost) {
    
    $menuName = htmlspecialchars(trim($_POST["menuName"]));  
    $menuDesc = htmlspecialchars(trim($_POST["menuDesc"]));
    $menuURL = htmlspecialchars(trim($_POST["menuURL"]));
    
    $focusId = '';
    
    if ($menuName == '') {
      $errors .= '<li>Lab may not be blank</li>'; //if any field is left blank error
      if ($focusId == '') $focusId = '#menuName';
    }
    if ($menuDesc == '') {
      $errors .= '<li>Description may not be blank</li>';
      if ($focusId == '') $focusId = '#menuDesc';
    }
    if ($menuURL == '') {
      $errors .= '<li>URL may not be blank</li>';
      if ($focusId == '') $focusId = '#menuURL';
    }
  
    if ($errors != '') {
      echo '<div class="messages"><h4>Please correct the following errors:</h4><ul>';
      echo $errors;
      echo '</ul></div>';
      echo '<script type="text/javascript">';
      echo '  $(document).ready(function() {';
      echo '    $("' . $focusId . '").focus();';
      echo '  });';
      echo '</script>';
    } else { 
      if ($dbOk) {
        $menuName = trim($_POST["menuName"]);  
        $menuDesc = trim($_POST["menuDesc"]);
        $menuURL = trim($_POST["menuURL"]);
        
        $insQuery = "insert into myprojects (`menuName`,`menuDesc`,`menuURL`) values(?,?,?)"; //adding to the database
        $statement = $db->prepare($insQuery);
        $statement->bind_param("sss",$menuName,$menuDesc,$menuURL);
        $statement->execute(); //executing it into the database
        
        echo '<div class="messages"><h4>Success: ' . $statement->affected_rows . ' Lab added to database.</h4>';
        echo $menuName . ' ' . $menuDesc . ', born ' . $menuURL . '</div>';
        
        $statement->close();
      }
    } 
  }
?>

<h3>Add Lab</h3> <!-- entire FORM-->
<form id="addForm" name="addForm" action="loadData.php" method="post" onsubmit="return validate(this);">
  <fieldset> 
    <div class="formData">
                    
      <label class="field" for="menuName">Lab:</label>
      <div class="value"><input type="text" size="60" value="<?php if($havePost && $errors != '') { echo $menuName; } ?>" name="menuName" id="menuName"/></div>
      
      <label class="field" for="menuDesc">Description:</label>
      <div class="value"><input type="text" size="60" value="<?php if($havePost && $errors != '') { echo $menuDesc; } ?>" name="menuDesc" id="menuDesc"/></div>
      
      <label class="field" for="menuURL">URL:</label>
      <div class="value"><input type="text" size="60" value="<?php if($havePost && $errors != '') { echo $menuURL; } ?>" name="menuURL" id="menuURL"/></div>
      
      <input type="submit" value="save" id="save" name="save"/>
    </div>
  </fieldset>
</form>

<h3>Labs</h3> <!--Displaying database with new info added-->
<table id="myprojects">
<?php
  if ($dbOk) {

    $query = 'select * from myprojects order by menuName';
    $result = $db->query($query);
    $numRecords = $result->num_rows;
    
    for ($i=0; $i < $numRecords; $i++) {
      $record = $result->fetch_assoc();
      echo htmlspecialchars($record['menuName']) . ', ';
      echo htmlspecialchars($record['menuDesc']) . ', ';
      echo htmlspecialchars($record['menuURL']);
      echo '</td> <br /><td>';//new lines so it is more organized 
      echo '</td></tr>';
    }
    
    $result->free();
    
    $db->close();
  }
  
?>
</table>
