<?php
$insert = false;
$update = false;
$delete = false;
// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$database = "notes";

// Connect to the database
$conn = mysqli_connect($servername,$username,$password, $database);

// Check if connection was successfull or not!!

if(!$conn){
  die ("Unable to connect the database!!" . mysqli_connect_error());
}
// else{
//   echo "The connection was successful";
// }
if(isset($_GET['delete'])){
  $sno = $_GET['delete'];
  $sql = "DELETE FROM `notes` WHERE `notes`.`sr no` = $sno";
  $result = mysqli_query($conn, $sql);
  $delete = true;
}
if($_SERVER['REQUEST_METHOD']=='POST'){
  if(isset($_POST['snoEdit'])){

// -------------------------------Update the record----------------------------------------------------------------------
   $title =$_POST["titleEdit"];
  $description =$_POST["descriptionEdit"];
  $sno = $_POST['snoEdit'];
  $sql = "UPDATE `notes` SET `title` = '$title', `description` = '$description' WHERE `notes`.`sr no` = '$sno';";
  $result = mysqli_query($conn, $sql);
  $update = true;
  
  }
else{
  // -------------------------------Insert the record----------------------------------------------------------------------
$title =$_POST["title"];
$description =$_POST["description"];
 $sql = "INSERT INTO `notes` ( `title`, `description`, `time`) VALUES ('$title', '$description', current_timestamp())";
 $result = mysqli_query($conn, $sql);
 $insert = true;
}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Notes</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS and JAVASCRIPT -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
      integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
      integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF"
      crossorigin="anonymous"
    ></script>

    <!-- --------------------Implimenting Data tables---------------------------------------------------------- -->

<link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  });
 
</script>


    <style>
      .container {
        margin-top: 200px;
      }
      body {
        background-color: black;
        font-family: "Pacifico";
        /* font-weight: 100; */

        color: #fff;
        font-size: 20px;
        text-shadow: 0px 0px 20px #00aad4;
      }

      .notes-icon {
        display: block;
        stroke: aliceblue;
        height: 35px;
        width: 60px;
      }
      .title {
        font-family: "Pacifico";
        font-weight: 100;
        margin: 0px;
        color: #fff;
        font-size: 40px;
        text-shadow: 0px 0px 20px #00aad4;
        -webkit-animation: blinkH1 5s infinite;
        animation: blinkH1 5s infinite;
        position: absolute;
        top: 200px;
        left: 337px;
      }
      h1:after {
        content: attr(data-text);
        position: absolute;
        top: 0;
        left: 0;
        color: #00aad4;
        z-index: -1;
        filter: blur(15px);
        -webkit-animation: blinkH1After 5s infinite;
        animation: blinkH1After 5s infinite;
      }

      h1:before {
        content: "";
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: #00aad4;
        z-index: -2;
        opacity: 0.7;
        filter: blur(50px);
        -webkit-animation: blinkH1Before 5s infinite;
        animation: blinkH1Before 5s infinite;
      }
      .saved {
        margin-top: 30px;
        font-family: "Pacifico";
        font-weight: 100;
        color: #fff;
        font-size: 40px;
        text-shadow: 0px 0px 20px #00aad4;
        -webkit-animation: blinkH1 2s infinite;
        animation: blinkH1 5s infinite;
      }



      
      .table{
        background-color: black;
        font-family: "Pacifico"
      ;
        /* font-weight: 100; */

        color: #fff;
        font-size: 20px;
        text-shadow: 0px 0px 20px #00aad4;
      }

      @-webkit-keyframes blinkH1 {
        0% {
          color: #fff;
          text-shadow: 0px 0px 20px #00aad4;
        }
        19% {
          color: #fff;
          text-shadow: 0px 0px 20px #00aad4;
        }
        20% {
          color: #9e9e9e;
          text-shadow: none;
        }
        21% {
          color: #fff;
          text-shadow: 0px 0px 20px #00aad4;
        }
        60% {
          color: #fff;
          text-shadow: 0px 0px 20px #00aad4;
        }
        61% {
          color: #9e9e9e;
          text-shadow: none;
        }
        62% {
          color: #fff;
          text-shadow: 0px 0px 20px #00aad4;
        }
        63% {
          color: #9e9e9e;
          text-shadow: none;
        }
        64% {
          color: #fff;
          text-shadow: 0px 0px 20px #00aad4;
        }
        100% {
          color: #fff;
          text-shadow: 0px 0px 20px #00aad4;
        }
      }

      @-webkit-keyframes blinkH1After {
        0% {
          color: #00aad4;
        }
        19% {
          color: #00aad4;
        }
        20% {
          color: transparent;
        }
        21% {
          color: #00aad4;
        }
        60% {
          color: #00aad4;
        }
        61% {
          color: transparent;
        }
        62% {
          color: #00aad4;
        }
        63% {
          color: transparent;
        }
        64% {
          color: #00aad4;
        }
        100% {
          color: #00aad4;
        }
      }

      @-webkit-keyframes blinkH1Before {
        0% {
          background: #00aad4;
        }
        19% {
          background: #00aad4;
        }
        20% {
          background: transparent;
        }
        21% {
          background: #00aad4;
        }
        60% {
          background: #00aad4;
        }
        61% {
          background: transparent;
        }
        62% {
          background: #00aad4;
        }
        63% {
          background: transparent;
        }
        64% {
          background: #00aad4;
        }
        100% {
          background: #00aad4;
        }
      }
      
  /* Change text color of show entries */
  .dataTables_length select,
  .dataTables_filter input {
    color: white;
  }

    /* Change hover, active, and current page text color to white */
    .dataTables_wrapper .dataTables_paginate .paginate_button:hover,
  .dataTables_wrapper .dataTables_paginate .paginate_button:active,
  .dataTables_wrapper .dataTables_paginate .paginate_button:focus,
  .dataTables_wrapper .dataTables_paginate .paginate_button.current,
  .dataTables_wrapper .dataTables_paginate .paginate_button.current:hover {
    color: white !important;
  }
  /* Styling for the dropdown menu values */
  .dataTables_length select option {
    color: #fff; 
    background-color: #000; 
  }
    /* Styling for the horizontal line */
    hr {
    border: none;
    height: 3px;
    background-color: #fff; 
    margin: 20px 0;
 
  }
#editModal{
  color: black;
}
@media (max-width: 768px) {
  .container {
    margin-top: 100px;
  }
  .title {
    top: 100px;
    left: 200px;
    
  }
}
@media only screen and (max-width: 375px) {
  /* Adjustments for iPhone 8 and similar devices */
  .title {
    font-size: 18px;
    line-height: 24px;
    top: 124px;
    left: 8px;
  }
  .saved{
    font-family: "Pacifico";
  }
}
@media only screen and (max-width: 375px) and (max-height: 667px) {

  body {
    background-color: black;
    font-family: "Pacifico";
     color: #fff;
     text-shadow: 0px 0px 20px #00aad4;
    font-size: 16px;
  }
  
}



    </style>
    <script>
      // ------------------Script to handle Dismissing alert--------------------------------------------------------------
      
document.addEventListener("DOMContentLoaded", function() {
  // Get the close button of the alert
  var closeButton = document.querySelector(".alert .btn-close");

  // Add a click event listener to the close button
  closeButton.addEventListener("click", function() {
    // Hide the alert by adding the 'd-none' class
    var alert = this.closest(".alert");
    alert.classList.add("d-none");
  });
});
 </script>
  </head>
  <body>

<!------------------------------ This is edit Modal --------------------------------------------------------------------->

    <div
      class="modal fade"
      id="editModal"
      tabindex="-1"
      aria-labelledby="editModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editModalLabel">Edit this Note</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body"><form action="/crud/index.php" method="POST">
            <input type="hidden" name="snoEdit" id="snoEdit">
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Title</label>
              <input
                type="text"
                class="form-control"
                name="titleEdit"
                id="titleEdit"
                aria-describedby="textHelp"
              />
              </div>
            <div class="mb-3">
              <label for="description" class="form-label" name="description"
                >Description</label
              >
              <textarea class="form-control" name="descriptionEdit" id="descriptionEdit" rows="3"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form></div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
             Close
            </button>
          </div>
        </div>
      </div>
    </div>

<!------------------------------ Edit Modal ends here------------------------------------------------------------------->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            class="notes-icon"
          >
            <path
              d="M21 15L15 20.996L4.00221 21C3.4487 21 3 20.5551 3 20.0066V3.9934C3 3.44476 3.44495 3 3.9934 3H20.0066C20.5552 3 21 3.45576 21 4.00247V15ZM19 5H5V19H13V14C13 13.4872 13.386 13.0645 13.8834 13.0067L14 13L19 12.999V5ZM18.171 14.999L15 15V18.169L18.171 14.999Z"
            ></path>
          </svg>
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a
                class="nav-link active"
                aria-current="page"
                href="../crud/index.php"
                >Home</a
              >
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li>
              <a class="nav-link" href="#">Contact us</a>
            </li>
          </ul>
          <form class="d-flex">
            <input
              class="form-control me-2"
              type="search"
              placeholder="Search"
              aria-label="Search"
            />
            <button class="btn btn-outline-success" type="submit">
              Search
            </button>
          </form>
        </div>
      </div>
    </nav>
    <?php
    if($insert){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!!</strong> Your Note has been inserted successfully!!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    if($update){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!!</strong> Your Note has been updated successfully!!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    if($delete){
      echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
      <strong>Success!!</strong> Your Note has been deleted successfully!!
      <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
    </div>";
    }
    ?>
    
    <h1 class="title">
      Please add a new Note
      <svg
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 24 24"
        style="stroke: white; height: 35px; width: 60px; margin-right:10px;"
      >
        <path
          d="M21 15L15 20.996L4.00221 21C3.4487 21 3 20.5551 3 20.0066V3.9934C3 3.44476 3.44495 3 3.9934 3H20.0066C20.5552 3 21 3.45576 21 4.00247V15ZM19 5H5V19H13V14C13 13.4872 13.386 13.0645 13.8834 13.0067L14 13L19 12.999V5ZM18.171 14.999L15 15V18.169L18.171 14.999Z"
        ></path>
      </svg>
    </h1>
    <div class="container">
      <form action="/crud/index.php" method="POST">
        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Title</label>
          <input
            type="text"
            class="form-control"
            name="title"
            id="title"
            aria-describedby="textHelp"
          />
          </div>
        <div class="mb-3">
          <label for="description" class="form-label" name="description"
            >Description</label
          >
          <textarea class="form-control" name="description" id="description" rows="3"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
      <h2 class="saved">
        Saved Notes
        <svg
          xmlns="http://www.w3.org/2000/svg"
          viewBox="0 0 24 24"
          style="stroke: white; height: 35px; width: 60px; margin-right:10px;"
        >
          <path
            d="M21 15L15 20.996L4.00221 21C3.4487 21 3 20.5551 3 20.0066V3.9934C3 3.44476 3.44495 3 3.9934 3H20.0066C20.5552 3 21 3.45576 21 4.00247V15ZM19 5H5V19H13V14C13 13.4872 13.386 13.0645 13.8834 13.0067L14 13L19 12.999V5ZM18.171 14.999L15 15V18.169L18.171 14.999Z"
          ></path>
        </svg>
      </form>
      </h2>
     
<table class="table" id="myTable">
  <thead>
    <tr>
      <th scope="col">Sr. No</th>
      <th scope="col">Title</th>
      <th scope="col">Description</th>
      <th scope="col">Time</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
  <?php
  $i=1;
      // Selecting entries in the database 
      $sql = "SELECT * FROM notes"; 
      $result = mysqli_query($conn, $sql);

      // fetch selected entries fron the database
while($row=mysqli_fetch_assoc($result))
{
    echo "<tr>
      <th scope=>".$i."</th>
      <td>".$row['title']."</td>
      <td>".$row['description']."</td>
      <td>".$row['time']."</td>
      <td>
      <button
      type='button'
      class='btn btn-primary edit'
      data-bs-toggle='modal'
      data-bs-target='#editModal'
      id='".$row['sr no']."'
    >
      Edit
    </button>
    <button
    type='button'
    class='btn btn-primary delete'
    data-bs-toggle='modal'
    data-bs-target='#deleteModal'
    id='d".$row['sr no']."'
  >
    Delete
  </button>
      </td>
      </tr>";
    $i++;
}
?>    
 </tbody> 
</table>
<hr>
    </div>
    <script src="//cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script>
      $(document).ready(function() {
        $('#myTable').DataTable();
      });
    </script>
    <script>
      edits = document.getElementsByClassName('edit');
      Array.from(edits).forEach((element)=>{
        element.addEventListener("click", (e)=>{
          console.log("edit",);
          tr = e.target.parentNode.parentNode;
          title = tr.getElementsByTagName("td")[0].innerText;
          description = tr.getElementsByTagName("td")[1].innerText; 
          console.log(title,description);
          titleEdit.value = title;
          descriptionEdit.value = description; 
          snoEdit.value = e.target.id; 
          console.log(snoEdit.value);
        })
        })
      </script>

<script>
      deletes = document.getElementsByClassName('delete');
      Array.from(deletes).forEach((element)=>{
        element.addEventListener("click", (e)=>{
          console.log("edit",);
         sno = e.target.id.substr(1,);

          if(confirm("Do you want to delete this note?")){
            console.log("yes");
            window.location = `/crud/index.php?delete=${sno}`;
          }
          else{
            console.log("no");
          }
          
        })
        })
      </script>
  </body>
</html>
