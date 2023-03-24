<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['content'] )
  {
    
    $query = 'INSERT INTO projects (
        title,
        content,
        date,
        type,
        url
      ) VALUES (
         "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
         "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      )';
    mysqli_query( $connect, $query );

    $project_id = mysqli_insert_id( $connect ); 

    set_message( 'Project has been added' );

   // insert project skills into projectXskill table
foreach( $_POST['skills'] as $skill_id )
{
  $query = 'INSERT INTO projectXskill (
      projectId,
      skillId
    ) VALUES (
       "'.$project_id.'",
       "'.$skill_id.'"
    )';
  mysqli_query( $connect, $query );
}
  }
  else
  {
    set_message( 'Please fill in all fields' );
  }

  header( 'Location: projects.php' );
  die();
  
}

include( 'includes/header.php' );

?>

<h2>Add Project</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title">
    
  <br>
  
  <label for="content">Content:</label>
  <textarea type="text" name="content" id="content" rows="10"></textarea>
      
  <script>

  ClassicEditor
    .create( document.querySelector( '#content' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
    
  </script>
  
  <br>
  
  <label for="url">URL:</label>
  <input type="text" name="url" id="url">
  
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date">
  
  <br>
  
  <label for="type">Type:</label>
  <?php
  
  $values = array( 'Website', 'Graphic Design' );
  
  echo '<select name="type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  <label for="skills"> Skills Used:</label>
<?php 
$query = 'SELECT * FROM skills';
$result = mysqli_query( $connect, $query );
//create a select box with all the skills so the user can select which skills were used for the project
echo '<select name="skills[]" id="skills" multiple>';
while( $record = mysqli_fetch_assoc( $result ) )
{
  echo '<option value="'.$record['id'].'"';
  echo '>'.$record['name'].'</option>';
}
echo '</select>';
?>


  <input type="submit" value="Add Project">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>