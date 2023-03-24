<?php

include( 'includes/database.php' );
include( 'includes/config.php' );
include( 'includes/functions.php' );

secure();

if( !isset( $_GET['id'] ) )
{
  
  header( 'Location: projects.php' );
  die();
  
}

if( isset( $_POST['title'] ) )
{
  
  if( $_POST['title'] and $_POST['content'] )
  {
    
    $query = 'UPDATE projects SET
      title = "'.mysqli_real_escape_string( $connect, $_POST['title'] ).'",
      content = "'.mysqli_real_escape_string( $connect, $_POST['content'] ).'",
      date = "'.mysqli_real_escape_string( $connect, $_POST['date'] ).'",
      type = "'.mysqli_real_escape_string( $connect, $_POST['type'] ).'",
      url = "'.mysqli_real_escape_string( $connect, $_POST['url'] ).'"
      WHERE id = '.$_GET['id'].'
      LIMIT 1';
    mysqli_query( $connect, $query );
    
    $query = 'DELETE FROM projectXskill WHERE projectId = "'.$_GET['id'].'"';
    mysqli_query( $connect, $query );
    
    //add updated skills for the project
    foreach( $_POST['skills'] as $skill_id )
    {
      $query = 'INSERT INTO projectXskill (
          projectId,
          skillId
        ) VALUES (
           "'.$_GET['id'].'",
           "'.$skill_id.'"
        )'; 
    
      mysqli_query( $connect, $query );
    }

    set_message( 'Project has been updated' );
    
  }

  header( 'Location: projects.php' );
  die();
  
}


if( isset( $_GET['id'] ) )
{
  
  $query = 'SELECT *
    FROM projects
    WHERE id = '.$_GET['id'].'
    LIMIT 1';
  $result = mysqli_query( $connect, $query );
  
  if( !mysqli_num_rows( $result ) )
  {
    
    header( 'Location: projects.php' );
    die();
    
  }
  
  $record = mysqli_fetch_assoc( $result );
  
}

include( 'includes/header.php' );

?>

<h2>Edit Project</h2>

<form method="post">
  
  <label for="title">Title:</label>
  <input type="text" name="title" id="title" value="<?php echo htmlentities( $record['title'] ); ?>">
    
  <br>
  
  <label for="content">Content:</label>
  <textarea type="text" name="content" id="content" rows="5"><?php echo htmlentities( $record['content'] ); ?></textarea>
  
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
  <input type="text" name="url" id="url" value="<?php echo htmlentities( $record['url'] ); ?>">
    
  <br>
  
  <label for="date">Date:</label>
  <input type="date" name="date" id="date" value="<?php echo htmlentities( $record['date'] ); ?>">
    
  <br>
  
  <label for="type">Type:</label>
  <?php
  
  $values = array( 'Website', 'Graphic Design' );
  
  echo '<select name="type" id="type">';
  foreach( $values as $key => $value )
  {
    echo '<option value="'.$value.'"';
    if( $value == $record['type'] ) echo ' selected="selected"';
    echo '>'.$value.'</option>';
  }
  echo '</select>';
  
  ?>
  
  <br>
  <label for="skills"> Skills Used:</label>
<?php 
//get all the skills from the database where the id is the same as skillId in the skillsxprojects table where the projectId is the same as the id of the project being edited
$query1 = 'SELECT skills.id, skills.name
FROM skills
INNER JOIN projectXskill ON projectXskill.skillId = skills.id
WHERE projectXskill.projectId = "'.$_GET['id'].'"';

$result1 = mysqli_query( $connect, $query1 );
$selected_skills = array();
while ($record1 = mysqli_fetch_assoc( $result1 )) {
  $selected_skills[] = $record1['id'];
}

//get all skills from the database
$query = 'SELECT * FROM skills';
$result = mysqli_query( $connect, $query );

//create a select box with all the skills so the user can select which skills were used for the project
echo '<select name="skills[]" id="skills" multiple>';
while( $record = mysqli_fetch_assoc( $result ) )
{
  if (in_array($record['id'], $selected_skills))
  {
    echo '<option value="'.$record['id'].'" selected="selected"> '.$record['name'].'</option>';
  }
  else {
    echo '<option value="'.$record['id'].'"';
    echo '>'.$record['name'].'</option>';
  }
}
echo '</select>';
  ?>

  <input type="submit" value="Edit Project">
  
</form>

<p><a href="projects.php"><i class="fas fa-arrow-circle-left"></i> Return to Project List</a></p>


<?php

include( 'includes/footer.php' );

?>