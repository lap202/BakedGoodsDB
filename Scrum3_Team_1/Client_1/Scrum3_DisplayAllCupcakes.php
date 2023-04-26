<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Scrum 3 Team 1 - Cookies</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="..\styles.css" rel="stylesheet">
</head>
  <body>
    <!--NAVIGATION-->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="index.html">Scrum 3 - Team 1</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link" href="index.html">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Scrum3_DisplayAllCake.php">View Cakes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Scrum3_DisplayAllCookies.php">View Cookies</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="Scrum3_DisplayAllCupcakes.php">View Cupcakes</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="..\Provider_1\testers\index.php">Testers</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--END NAVIGATION-->

    <!--BODY-->
    <br />
    <h2>Cupcakes</h2>
<!--Populate the inner html with the results-->
<div id="displayHere">
        
      </div>
      <a href="#action" id='AddItem' class="btn btn-primary" onclick="displayAddItem()">Add Item</a>


      <!--Pupulate the inner html based on the action clicked(add, edit, delete)-->
      <div id="action" class="m-4">

      </div>
    <!--END BODY-->

    <script
       src="https://code.jquery.com/jquery-3.6.4.js"
      integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E="
      crossorigin="anonymous">
      </script>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
<script>
  //Populate the table on load
  $(document).ready(function(event) {
      
  $.ajax({
    type: 'GET',
    url: '../Provider_1/testers/API_3.php',
    data: 'tableName=cupcakes&action=read',
    dataType: 'json',
    encode: true
  })
  .done(function(data) {
      var length = data.length;
      var htmlString = '<table class="table"><thead><tr><th>ID</th><th>Name</th><th>Flavor</th><th>Price</th><th>Cook Time</th><th>Actions</th></tr></thead><tbody>';

    for (i = 0; i < length; i++)
    {
      //This breaks the returned string from the api and breaks it into its parts. pipe delimited
      var dataSplit = data[i].split("|");

        htmlString += "<tr>";
        htmlString += "<td>" + dataSplit[0] + "</td>";
        htmlString += "<td>" + dataSplit[1] + "</td>";
        htmlString +="<td>" + dataSplit[2] + "</td>";
        htmlString +="<td>" + dataSplit[3] + "</td>";
        htmlString +="<td>" + dataSplit[4] + "</td>";
        htmlString +="<td><a href=\"#action\" id=\"" + dataSplit[0] + "\" class=\"btn btn-primary mr-1\" onclick=\"displayEditItem(this.id)\">Edit</a>";
        htmlString +="<button id=\"" + dataSplit[0] + "\" class=\"btn btn-danger ml-1\" onclick=\"deleteItem(this.id)\">Delete</button></td>";
        htmlString +="</tr>";
    }
    
    htmlString += "</tbody>";
    htmlString += "</table>";

      $('#displayHere').html(htmlString);

  })
  .fail(function() {
    $('#displayHere').text('An error occurred. Please try again.');
  });

  });

  //functions to display the Add and Edit Form
  function displayAddItem() {
    document.getElementById("action").innerHTML = "<div class=\"offset-2 col-8 border border-primary rounded p-3\""
                                                + "<form id=\"addForm\" class=\"mt-5\">" 
                                                + "<h3>Add an Item</h3>"
                                                + "<div class=\"mb-3\">"
                                                + "<label for=\"name\" class=\"form-label\">Name</label>"
                                                + "<input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Name\">"
                                                + "</div>"
                                                + "<div class=\"mb-3\">"
                                                + "<label for=\"flavor\" class=\"form-label\">Flavor</label>"
                                                + "<input type=\"text\" class=\"form-control\" id=\"flavor\" placeholder=\"Flavor\">"
                                                + "</div>"
                                                + "<div class=\"mb-3\">"
                                                + "<label for=\"price\" class=\"form-label\">Price</label>"
                                                + "<input type=\"number\" min=\"0.00\" class=\"form-control\" id=\"price\" placeholder=\"0.00\">"
                                                + "</div>"
                                                + "<div class=\"mb-3\">"
                                                + "<label for=\"cooktime\" class=\"form-label\">Cook Time</label>"
                                                + "<input type=\"number\" min=\"0\" class=\"form-control\" id=\"cooktime\" placeholder=\"Cook Time\">"
                                                + "</div>"
                                                + "<button id=\"btn_add\" class=\"btn btn-primary\" type=\"submit\" onclick=\"addItem()\">Add Item</button>"
                                                + "</form>"
                                                + "</div>";
  }
  function displayEditItem(id) {
    document.getElementById("action").innerHTML = "<div class=\"offset-2 col-8 border border-primary rounded p-3\""
                                                + "<form id=\"editForm\" class=\"mt-5\">" 
                                                + "<h3>Edit: ID " + id + "</h3>"
                                                + "<input type=\"text\" id=\"id\" value=\"" + id + "\" hidden>"
                                                + "<div class=\"mb-3\">"
                                                + "<label for=\"name\" class=\"form-label\">Name</label>"
                                                + "<input type=\"text\" class=\"form-control\" id=\"name\" placeholder=\"Name\">"
                                                + "</div>"
                                                + "<div class=\"mb-3\">"
                                                + "<label for=\"flavor\" class=\"form-label\">Flavor</label>"
                                                + "<input type=\"text\" class=\"form-control\" id=\"flavor\" placeholder=\"Flavor\">"
                                                + "</div>"
                                                + "<div class=\"mb-3\">"
                                                + "<label for=\"price\" class=\"form-label\">Price</label>"
                                                + "<input type=\"number\" min=\"0.00\" class=\"form-control\" id=\"price\" placeholder=\"0.00\">"
                                                + "</div>"
                                                + "<div class=\"mb-3\">"
                                                + "<label for=\"cooktime\" class=\"form-label\">Cook Time</label>"
                                                + "<input type=\"number\" min=\"0\" class=\"form-control\" id=\"cooktime\" placeholder=\"Cook Time\">"
                                                + "</div>"
                                                + "<button id=\"btn_add\" class=\"btn btn-primary\" type=\"submit\" onclick=\"editItem()\">Save</button>"
                                                + "</form>"
                                                + "</div>";
  }

//TODO:ADD FUNCTION
function addItem() {
	alert("Add Item Placeholder");
}

//TODO:EDIT FUNCTION
function editItem() {
	alert("Edit Item Placeholder");
}

//TODO:DELETE FUNCTION
function deleteItem($id) {
	$.ajax({
    type: 'GET',
    url: '../Provider_1/testers/API_3.php',
    data: 'tableName=cupcakes&action=delete&id='+$id,
    dataType: 'json',
    encode: true
  })
  .done(function(data) {
    location.reload(true);
  })
  .fail(function() {
    $('#displayHere').text('An error occurred. Please try again.');
  });
}
</script>

</html>