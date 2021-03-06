<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-eqiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width-device-width, initial-scale=1">
  <title>Bootstrap Template</title>
  <link href="bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet">
</head>
  <body style="margin:16px;padding:16px">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <h1>Links that will simply show the contents of the tables</h1><br />
    <form class="form-inline" action = 'showTables.php' method = 'post'>
      <lablel>Show Contents of Table: </label>
        <select class="form-control" id="Table" name="table_name">
          <option value="ALBUM">ALBUM</option>
          <option value="BAND">BAND</option>
          <option value="MUSICIAN">MUSICIAN</option>
          <option value="PRODUCER">PRODUCER</option>
          <option value="TRACK">TRACK</option>
      </select>
      <input class="btn btn-primary" type="submit" value="submit"/>
    </form>
    <br />
    <h1>Links to forms to add records to tables</h1>
    <a class="btn btn-success" href="addBand.html">Add A Band</a>
    <a class="btn btn-success" href="addAlbum.html">Add An Album</a>
    <a class="btn btn-success" href="addMusician.html">Add A Musician</a>
    <a class="btn btn-success" href="addProducer.html">Add A Producer</a>
    <a class="btn btn-success" href="addTrack.html">Add A Track</a>
    <br />
    <h1>Links to edit records in a table</h1>
    <form class="form-inline" action = 'editMusician.php' method = 'post'>
      <label>Choose a Musician's record to edit: </label>
      <select class="form-control" id="Musician" name="Musician">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT MusicianID, firstName, lastName FROM MUSICIAN");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['MusicianID'];
          $firstName = $row['firstName'];
          $lastName = $row['lastName'];
          echo '<option value="'.$id.'">'.$firstName.' '.$lastName.'</option>';
        }
        ?>
      </select>
      <input class="btn btn-info" type="submit" value="Edit Record"/>
    </form>
    <form class="form-inline" action = 'editAlbum.php' method = 'post'>
      <label>Choose an Albums's record to edit: </label>
      <select class="form-control" id="Album" name="Album">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT AlbumID, albumName FROM ALBUM");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['AlbumID'];
          $name = $row['albumName'];
          echo '<option value="'.$id.'">'.$name.' </option>';
        }
        ?>
      </select>
      <input class="btn btn-info" type="submit" value="Edit Record"/>
    </form>
    <form class="form-inline" action = 'editBand.php' method = 'post'>
      <label>Choose a Band's record to edit: </label>
      <select class="form-control" id="Band" name="Band">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT BandID, bandName FROM BAND");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['BandID'];
          $name = $row['bandName'];
          echo '<option value="'.$id.'">'.$name.' </option>';
        }
        ?>
      </select>
      <input class="btn btn-info" type="submit" value="Edit Record"/>
    </form>
    <form class="form-inline" action = 'editProducer.php' method = 'post'>
      <label>Choose a Producer's record to edit: </label>
      <select class="form-control" id="Producer" name="Producer">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT ProducerID, producerName FROM PRODUCER");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['ProducerID'];
          $name = $row['producerName'];
          echo '<option value="'.$id.'">'.$name.' </option>';
        }
        ?>
      </select>
      <input class="btn btn-info" type="submit" value="Edit Record"/>
    </form>
    <form class="form-inline" action = 'editTrack.php' method = 'post'>
      <label>Choose a Track's record to edit: </label>
      <select class="form-control" id="Track" name="Track">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT TrackID, trackName FROM TRACK");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['TrackID'];
          $name = $row['trackName'];
          echo '<option value="'.$id.'">'.$name.' </option>';
        }
        ?>
      </select>
      <input class="btn btn-info" type="submit" value="Edit Record"/>
    </form>

    <h1>Links to delete records in a table</h1>
    <form class="form-inline" action = 'deleteMusician.php' method = 'post'>
      <label>Choose a Musician's record to delete: </label>
      <select class="form-control" id="Musician" name="musician_id">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT MusicianID, firstName, lastName FROM MUSICIAN");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['MusicianID'];
          $firstName = $row['firstName'];
          $lastName = $row['lastName'];
          echo '<option value="'.$id.'">'.$firstName.' '.$lastName.'</option>';
        }
        ?>
      </select>
      <input class="btn btn-danger" type="submit" value="Delete Record"/>
    </form>
    <form class="form-inline" action = 'deleteAlbum.php' method = 'post'>
      <label>Choose an Albums's record to delete: </label>
      <select class="form-control" id="Album" name="album_id">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT AlbumID, albumName FROM ALBUM");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['AlbumID'];
          $name = $row['albumName'];
          echo '<option value="'.$id.'">'.$name.' </option>';
        }
        ?>
      </select>
      <input class="btn btn-danger" type="submit" value="Delete Record"/>
    </form>
    <form class="form-inline" action = 'deleteBand.php' method = 'post'>
      <label>Choose a Band's record to delete: </label>
      <select class="form-control" id="Band" name="band_id">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT BandID, bandName FROM BAND");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['BandID'];
          $name = $row['bandName'];
          echo '<option value="'.$id.'">'.$name.' </option>';
        }
        ?>
      </select>
      <input class="btn btn-danger" type="submit" value="Delete Record"/>
    </form>
    <form class="form-inline" action = 'deleteProducer.php' method = 'post'>
      <label>Choose a Producer's record to delete: </label>
      <select class="form-control" id="Producer" name="producer_id">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT ProducerID, producerName FROM PRODUCER");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['ProducerID'];
          $name = $row['producerName'];
          echo '<option value="'.$id.'">'.$name.' </option>';
        }
        ?>
      </select>
      <input class="btn btn-danger" type="submit" value="Delete Record"/>
    </form>
    <form class="form-inline" action = 'deleteTrack.php' method = 'post'>
      <label>Choose a Track's record to delete: </label>
      <select class="form-control" id="Track" name="track_id">
        <?php

        require_once('db_connect.php');

        //get results from database
        $result = mysqli_query($connection,"SELECT TrackID, trackName FROM TRACK");
        while($row=mysqli_fetch_array($result))
        {
          unset($id, $name);
          $id = $row['TrackID'];
          $name = $row['trackName'];
          echo '<option value="'.$id.'">'.$name.' </option>';
        }
        ?>
      </select>
      <input class="btn btn-danger" type="submit" value="Delete Record"/>
    </form>

	<a class="btn btn-primary" href="../index.html">Return to Main Application</a>

  </body>
</html>
