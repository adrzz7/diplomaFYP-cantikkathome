<?php
session_start();
include_once 'connect.php';

if(!isset($_SESSION["ADMIN_Username"])){
    header("Location:AdminLogin.php");
}




    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
    <title>Tutorial</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/css/bootstrap.css"></style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>


    <?php include 'navbarcss.php'; ?>
<style media="screen">
.wrapper{
max-width: 1000px;
margin: 150px auto;
}

.wrapper .search-input{
background: #fff;
width: 100%;
border-radius: 5px;
position: relative;
box-shadow: 0px 1px 5px 3px rgba(0,0,0,0.12);
}

.search-input input{
height: 55px;
width: 100%;
outline: none;
border: none;
border-radius: 5px;
padding: 0 60px 0 20px;
font-size: 18px;
box-shadow: 0px 1px 5px rgba(0,0,0,0.1);
}

.search-input.active input{
border-radius: 5px 5px 0 0;
}

.search-input .autocom-box{
padding: 0;
opacity: 0;
pointer-events: none;
max-height: 280px;
overflow-y: auto;
}

.search-input.active .autocom-box{
padding: 10px 8px;
opacity: 1;
pointer-events: auto;
}

.autocom-box li{
list-style: none;
padding: 8px 12px;
display: none;
width: 100%;
cursor: default;
border-radius: 3px;
}

.search-input.active .autocom-box li{
display: block;
}
.autocom-box li:hover{
background: #efefef;
}

.search-input .icon{
position: absolute;
right: 0px;
top: 0px;
height: 55px;
width: 55px;
text-align: center;
line-height: 55px;
font-size: 20px;
color: #644bff;
cursor: pointer;
}
</style>
    </head>
    <body>
      <?php include 'navbar.php'; ?>





<!-- Popup Div Ends Here -->
<div class="container">
        <div class="container-top">
        <div class="user-profile">
  <div class="thumb">
  <h1>TUTORIAL</h1>
  </div>
  <div class="pad"></div>
  <div class="remove">
    <button id="popup" type="button"  data-toggle="modal" data-target="#addModal" >Add</button>
    </div>

</div>
        </div>





    <!-- <script src="js/suggestions.js"></script> -->
    <!-- <script src="js/script.js"></script> -->
<br>
<?php
			$sql = "SELECT * FROM tutorial INNER JOIN categories ON tutorial.TUTORIAL_CategoryID=categories.CATEGORIES_ID WHERE TUTORIAL_Status ='Available';";
			$data = mysqli_query($connect, $sql);
      $row = mysqli_num_rows($data);

    ?>
        <div class="table">
<table class="table table-bordered table-responsive table-hover table-sortable">
            <thead class="thead-dark">
          <th scope="col">No.</th>
          <th scope="col">Tutorial ID</th>
          <th scope="col">Video</th>
          <th scope="col">Title</th>
          <th scope="col">Category</th>
          <th scope="col">Description</th>
          <th scope="col">Created at </th>
          <th scope="col">Action</th>
        </thead>
        <tbody>
        <?php
				$bil=1;
				while($result = mysqli_fetch_assoc($data)){
				?>
          <tr>

            <th scope="row"><?php echo $bil;?></th>
					  <td >T<?php echo $result['TUTORIAL_ID'];?></td>
					  <td ><iframe src="<?php echo $result["TUTORIAL_VidLink"]; ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" style="width:210px;height: 125px;padding: 3px" allowfullscreen></iframe></td>
            <td ><?php echo $result['TUTORIAL_Name'];?></td>
            <td ><?php echo $result['CATEGORIES_Name'];?></td>
					  <td ><?php echo $result['TUTORIAL_Description'];?></td>
					  <td style="width:115px;"><?php echo $result['TUTORIAL_Time']; echo '<br>'; echo $result['TUTORIAL_Date'];?></td>
            <td style="width:165px;">
              <button type="button"  class=" btn btn-info EDIT" name="button"  data-toggle="modal" data-target="#editModal<?php echo $result['TUTORIAL_ID']; ?>" >EDIT  </button>
                <button type="button"  id="deletebutton" class=" btn btn-danger delete"  value="<?php echo $result['TUTORIAL_ID'] ; ?>" name="delete">DELETE</button>
            </td>

          </tr>

          <?php
          $bil++;

          include 'modaledit.php';
					}
				?>

        </tbody>
      </table>
</div>


<!-- Modal -->
  <div id="addModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add Product</h4>
          <button type="button" class="close" data-dismiss="modal" >&times;</button>
        </div>
        <div class="modal-body">
          <form action="AdminTutorial_Action.php"  method="post" class="needs-validation"   enctype="multipart/form-data" novalidate>


                                         <div class="form-group">
                                             <label for="TutoName" >Tutorial Title   </label>
                                             <input type="text" class="form-control"  name="TUTORIAL_Name" required placeholder ="Tutorial Title">
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>

                                           <div class="form-group">
                                             <label for="TutoVid" >Tutorial Video Description </label>
                                                 <input type="text" class="form-control" name="TUTORIAL_Description" required placeholder ="Tutorial Description">
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>


                                           <div class="form-group">
                                           <label for="price">Category</label>
                                           <select name="product_cat" class="form-control"  required    >
                                                 <option selected="selected" >  Select a Category </option>
                                                   <?php
                                                   $res = mysqli_query($connect, "SELECT * FROM categories WHERE CATEGORIES_Status ='Available'");
                                                   while($displaycat = mysqli_fetch_assoc($res)) :
                                                   ?>
                                                     <option value="<?php echo $displaycat['CATEGORIES_ID']; ?> "><?php echo $displaycat['CATEGORIES_Name']; ?></option>
                                                   <?php
                                                   endwhile;
                                                   ?>
                                           </select>
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>



                                           <div class="form-group">
                                          <label for="TutoVid" >Tutorial Video Link </label>
                                          <input type="text" class="form-control"  name="TUTORIAL_VidLink" required placeholder ="Tutorial Video Link" >
                                           <div class="valid-feedback">Valid.</div>
                                           <div class="invalid-feedback">Please fill out this field.</div>
                                           </div>



                                           <button  class="btn btn-primary" type="submit" name="add" >ADD</button>
                                       </form>
                                     </div>

                                     <div class="modal-footer">
                                       <button type="button" class="btn btn-danger" data-dismiss="modal" >Close</button>
                                     </div>
</div>

</div>
</div>




<script type="text/javascript">


    $(function() {
    $(".delete").click(function(){
    var element = $(this);
    var tutid = element.attr("value");
    var info = 'delete=' + tutid;
    if(confirm("Are you sure you want to delete this?"))
    {
    $.ajax({
    type: "POST",
    url: "AdminTutorial_Action.php",
    data: info,
    success: function(){
    }
    });
    $(this).parent().parent().fadeOut(300, function(){ $(this).remove();});
    }
    return false;
    });
    });

</script>






    <?php include 'script.php'; ?>


    </div>
    <div class="wrapper">
    <div class="search-input">
    <a href="" target="_blank" hidden></a>
    <input type="text" placeholder="Type to search..">
    <div class="autocom-box">
      <!-- here list are inserted from javascript -->
    </div>
    <div class="icon"><i class="fas fa-search"></i></div>
    </div>
    </div>



    <script type="text/javascript">


        // getting all required elements
        const searchWrapper = document.querySelector(".search-input");
        const inputBox = searchWrapper.querySelector("input");
        const suggBox = searchWrapper.querySelector(".autocom-box");
        const icon = searchWrapper.querySelector(".icon");
        let linkTag = searchWrapper.querySelector("a");
        let webLink;

        // if user press any key and release
        inputBox.onkeyup = (e)=>{
            let userData = e.target.value; //user enetered data
            let emptyArray = [];
            if(userData){
                icon.onclick = ()=>{
                    webLink = "https://www.google.com/search?q=" + userData;
                    linkTag.setAttribute("href", webLink);
                    console.log(webLink);
                    linkTag.click();
                }
                emptyArray = suggestions.filter((data)=>{
                    //filtering array value and user characters to lowercase and return only those words which are start with user enetered chars
                    return data.toLocaleLowerCase().startsWith(userData.toLocaleLowerCase());
                });
                emptyArray = emptyArray.map((data)=>{
                    // passing return data inside li tag
                    return data = '<li>'+ data +'</li>';
                });
                searchWrapper.classList.add("active"); //show autocomplete box
                showSuggestions(emptyArray);
                let allList = suggBox.querySelectorAll("li");
                for (let i = 0; i < allList.length; i++) {
                    //adding onclick attribute in all li tag
                    allList[i].setAttribute("onclick", "select(this)");
                }
            }else{
                searchWrapper.classList.remove("active"); //hide autocomplete box
            }
        }

        function select(element){
            let selectData = element.textContent;
            inputBox.value = selectData;
            icon.onclick = ()=>{
                webLink = "https://www.google.com/search?q=" + selectData;
                linkTag.setAttribute("href", webLink);
                linkTag.click();
            }
            searchWrapper.classList.remove("active");
        }

        function showSuggestions(list){
            let listData;
            if(!list.length){
                userValue = inputBox.value;
                listData = '<li>'+ userValue +'</li>';
            }else{
                listData = list.join('');
            }
            suggBox.innerHTML = listData;
        }

        let suggestions = [
            "Channel",
            "CodingLab",
            "CodingNepal",
            "YouTube",
            "YouTuber",
            "YouTube Channel",
            "Blogger",
            "Bollywood",
            "Vlogger",
            "Vechiles",
            "Facebook",
            "Freelancer",
            "Facebook Page",
            "Designer",
            "Developer",
            "Web Designer",
            "Web Developer",
            "Login Form in HTML & CSS",
            "How to learn HTML & CSS",
            "How to learn JavaScript",
            "How to became Freelancer",
            "How to became Web Designer",
            "How to start Gaming Channel",
            "How to start YouTube Channel",
            "What does HTML stands for?",
            "What does CSS stands for?",
        ];

        </script>

          </body>
    </html>
