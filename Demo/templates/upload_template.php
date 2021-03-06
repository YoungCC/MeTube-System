<!--div class="col-lg-6 col-sm-6"-->
<div class="container">
    <div class="card hovercard">
        <div class="card-background">
          
        </div>
        <div class="useravatar">
            <img alt="" src="../templates/images/account.png">
        </div>
        <div class="card-info"> <span class="card-title"><?php 
            $username = $_SESSION["username"];
            echo $username;
            ?></span>

        </div>
    </div>
    <div class="btn-pref btn-group btn-group-justified btn-group-lg" role="group" aria-label="...">
         <div class="btn-group" role="group">
            <button type="button" id="stars" class="btn btn-default" onclick="document.location.href = '../public/account.php'"><span class="glyphicon glyphicon-star" aria-hidden="true"></span>
                <div class="hidden-xs">Profile</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="favorites" class="btn btn-default" onclick="document.location.href = '../public/contact.php'"><span class="glyphicon glyphicon-heart" aria-hidden="true"></span>
                <div class="hidden-xs">Contact</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/subscribe.php'" ><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Subscription</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/playlist.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Playlists</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/favorite.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Favorites</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-primary" onclick="document.location.href = '../public/media_upload_process.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Uploads</div>
            </button>
        </div>
        <div class="btn-group" role="group">
            <button type="button" id="following" class="btn btn-default" onclick="document.location.href = '../public/message.php'"><span class="glyphicon glyphicon-user" aria-hidden="true"></span>
                <div class="hidden-xs">Messages</div>
            </button>
        </div>
    </div>

        <div class="well">
            <h3>My Uploads:</h3>
            <?php
                foreach($myuploads as $myupload){
                    $title = $myupload["title"];
                    $mediaid = $myupload["mediaid"];
                    echo <<<_END
                    <div class="row">
                      <div class="col-sm-4 col-md-4 col-lg-4">
                        <h4>$title</h4>
                        <div class="img-thumbnail"> <img src="../templates/images/media.png" alt="Thumbnail Image 1" class="img-responsive" width="100" height="100"></div>
      			             
    		          </div> 
                    </div>
                    
                    <div class="row">
                        <div class="col-sm-1 col-md-1 col-lg-1">
                      <p>block list:</p>
                      </div>
_END;
                    $blocks = $myupload["block"];
                  
                    foreach($blocks as $block){
                        $blockname = $block;
                        echo <<<_END
                        <div class="col-sm-1 col-md-1 col-lg-1">
                            $blockname
                            <a href="../public/media_upload_process.php?drop=$blockname&mediaid=$mediaid"><p>[drop]</p> </a>
                        </div>
_END;
                        
                    }
                    echo <<<_END
                      
                    </div>           
                    
_END;
                }
            
            ?>
            <script>
function ValidateSingleInput(oInput) {
  var x = document.forms["myForm"]["type"].value;
  switch(x) {
    case '1':
      var _validFileExtensions = [".mp4"];    
      break;
    case '2':
      var _validFileExtensions = [".mp3"];    
      break;
    case '3':
      var _validFileExtensions = [".jpg", ".png"];    
      break;
    default:
      var _validFileExtensions = [".jpg", ".png"];    
  }
  if (oInput.type == "file") {
    var sFileName = oInput.value;
    if (sFileName.length > 0) {
      var blnValid = false;
      for (var j = 0; j < _validFileExtensions.length; j++) {
        var sCurExtension = _validFileExtensions[j];
        if (sFileName.substr(sFileName.length - sCurExtension.length, sCurExtension.length).toLowerCase() == sCurExtension.toLowerCase()) {
          blnValid = true;
          break;
        }
      }

      if (!blnValid) {
        alert("Sorry, " + sFileName + " is invalid, allowed extensions are: " + _validFileExtensions.join(", "));
        oInput.value = "";
        return false;
      }
    }
  }
  return true;
}
           </script> 
            
         <h3>New Upload:</h3>
            <p><?php echo $errortext ?></p>
            <div class="row text-center">
                <div class="col-sm-6 col-md-6 col-lg-6 col-sm-offset-3 col-md-offset-3 col-lg-offset-3">
                <form method="post" name="myForm" action="../public/media_upload_process.php" enctype="multipart/form-data"  >
                    <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                    <label>Add a Media:</label> 
		    <h4 align="left">type:</h4>
                     <div class="row text-center">
                        <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="radio">
                      <input type="radio" name="type" value="1" checked>
                        video
                        </label>
                        </div>

                        <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="radio">
                      <input type="radio" name="type" value="2">
                        audio
                        </label>
                        </div>

                        <div class="col-sm-4 col-md-4 col-lg-4">
                        <label class="radio">
                      <input type="radio" name="type" value="3">
                        image
                        </label>
                        </div>
                    </div>
                    <input  name="file" type="file" size="50" onchange="ValidateSingleInput(this);" />
                    <h4 align="left">title:</h4><input type="text" class="form-control" name="title" required autofo>
                    <h4 align="left">description:</h4><textarea  class="form-control" name="description" rows="4" cols="50" required autofocus></textarea>
                    
                    <h4 align="left">Category:</h4>
                    <select name = "category" class="input-sm form-control">
                                      <option value="1">Sports</option>
                                      <option value="2">Entertainment</option>
                                      <option value="3">Movie</option>
				      <option value="4">Music</option>
				      <option value="5">Others</option>

                                      
                    </select>
                    
                       
                    <h4 align="left">Keywords:</h4>
                    <div class="row text-center">
                        
                        <textarea  class="form-control" name="keywords" rows="4" cols="50" placeholder="Please type in keywords which can be separated by comma."></textarea>
                    
                     <?php
                        /*
                    $i = -1;
                    foreach($keywords as $word) {
                        $i = $i + 1;
                        echo <<<_END
                        <div class="col-sm-3 col-md-3 col-lg-3">
                        <label class="checkbox">
                      <input type="checkbox" name="keyword[]" value="$i">
                        $word
                        </label>
                        </div>
_END;
                        
                        
                        
        }   
                */
    
                    ?> 
                    </div>
                   
                    
                    
                     <h4 align="left">sharing:</h4>
                    <div class="row text-center">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="radio">
                         <input type="radio" name="share" value="0" checked onclick="getElementById('heit').disabled=true">share to everyone </label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="radio">
                         <input type="radio" name="share" value="1" onclick="getElementById('heit').disabled=false">share to friends only </label>
                        </div>
                    
                    </div>
                     
                    
                    <h4 align="left">block certain friends:</h4>
                        <textarea disabled id="heit"  class="form-control" name="block" rows="4" cols="50" placeholder="Please type in usernames of your friends that you want to block. Multiple usernames can be separated by comma." ></textarea>
                    
                    
                    <h4 align="left">Settings:</h4>
                    <div class="row text-center">
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="checkbox">
                         <input type="checkbox" name="discuss" value="1" checked>can be discussed</label>
                        </div>
                        <div class="col-sm-6 col-md-6 col-lg-6">
                            <label class="checkbox">
                         <input type="checkbox" name="rate" value="1" checked>can be rated </label>
                        </div>
                    
                    </div>
                    
                     <br><br>
	               <input value="Upload" name="submit" type="submit" />
                               
                </form>
            
                </div>
                
            </div>
              
        </div>
</div>
