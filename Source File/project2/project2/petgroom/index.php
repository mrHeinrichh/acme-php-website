<?php
include('dbconnection.php');
?>
<style>
@import url("https://fonts.googleapis.com/css?family=Montserrat:400,600&display=swap");
* {
  box-sizing: border-box;
  margin: 0;
  padding: 0;
}

body {
  align-items: center;
  background: #D8AA96;
  color: rgba(0, 0, 0, 0.8);
  display: grid;
  font-family: "Montserrat", sans-serif;
  font-size: 14px;
  font-weight: 400;
  height: 100vh;
  justify-items: center;
  weight: 100vw;
}

.signup-container {
  display: grid;
  grid-template-areas: "left right";
  max-width: 900px;
}

.left-container {
  background: #807182;
  overflow: hidden;
  padding: 40px 0 0 0;
  position: relative;
  text-align: center;
  width: 300px;
}
.left-container h1 {
  color: rgba(0, 0, 0, 0.8);
  display: inline-block;
  font-size: 24px;
}
.left-container h1 i {
  background: #F7B1AB;
  border-radius: 50%;
  color: #807182;
  font-size: 24px;
  margin-right: 5px;
  padding: 10px;
  transform: rotate(-45deg);
}
.left-container .puppy {
  bottom: -5px;
  position: absolute;
  text-align: center;
}
.left-container .puppy:before {
  background: #807182;
  content: "";
  height: 100%;
  left: 0;
  opacity: 0.4;
  position: absolute;
  width: 100%;
  z-index: 1;
}
.left-container img {
  filter: sepia(100%);
  width: 70%;
}

.right-container {
  background: #f9c7c2;
  display: grid;
  grid-template-areas: "." ".";
  width: 500px;
}
.right-container h1:nth-of-type(1) {
  color: rgba(0, 0, 0, 0.8);
  font-size: 28px;
  font-weight: 600;
}
.right-container .set {
  display: flex;
  justify-content: space-between;
  margin: 10px 0;
}
.right-container input {
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 4px;
  height: 38px;
  line-height: 38px;
  padding-left: 5px;
}
.right-container input, .right-container label {
  color: rgba(0, 0, 0, 0.8);
}
.right-container header {
  padding: 40px;
}
.right-container label, .right-container input, .right-container .pets-photo {
  width: 176px;
}
.right-container .pets-photo {
  align-items: center;
  display: grid;
  grid-template-areas: ". .";
}
.right-container .pets-photo button {
  border: none;
  border-radius: 50%;
  height: 38px;
  margin-right: 10px;
  outline: none;
  width: 38px;
}
.right-container .pets-photo button i {
  color: rgba(0, 0, 0, 0.8);
  font-size: 16px;
}
.right-container .pets-weight .radio-container {
  display: flex;
  justify-content: space-between;
  width: 100%;
}
.right-container footer {
  align-items: center;
  background: #fff;
  display: grid;
  padding: 5px 40px;
}
.right-container footer button {
  border: 1px solid rgba(0, 0, 0, 0.2);
  height: 38px;
  line-height: 38px;
  width: 100px;
  border-radius: 19px;
  font-family: "Montserrat", sans-serif;
}
.right-container footer #back {
  background: #fff;
  transition: 0.2s all ease-in-out;
}
.right-container footer #back:hover {
  background: #171A2B;
  color: white;
}
.right-container footer #next {
  background: #807182;
  border: 1px solid transparent;
  color: #fff;
}
.right-container footer #next:hover {
  background: #171A2B;
}

.pets-name label, .pets-breed label, .pets-birthday label, .pets-gender label, .pets-spayed-neutered label, .pets-weight label {
  display: block;
  margin-bottom: 5px;
}

.radio-container {
  background: #fff;
  border: 1px solid rgba(0, 0, 0, 0.1);
  border-radius: 4px;
  display: inline-block;
  padding: 5px;
}

.radio-container label {
  background: transparent;
  border: 1px solid transparent;
  border-radius: 2px;
  display: inline-block;
  height: 26px;
  line-height: 26px;
  margin: 0;
  padding: 0;
  text-align: center;
  transition: 0.2s all ease-in-out;
  width: 80px;
}

.radio-container input[type=radio] {
  display: none;
}

.radio-container input[type=radio]:checked + label {
  background: #F7B1AB;
  border: 1px solid rgba(0, 0, 0, 0.1);
}
img {
    width:400px;
    margin:auto;
}
</style>
<div class='signup-container'>
  <div class='left-container'>
    <h1>
      <i class='fas fa-paw'></i>
      PUPASSURE
    </h1>
    <div class='puppy'>
      <img src='https://s3-us-west-2.amazonaws.com/s.cdpn.io/38816/image-from-rawpixel-id-542207-jpeg.png'>
    </div>
  </div>
  <div class='right-container'>
    <header>
      <h1>Yay, Cutties! Ensure your pet's gets the best Groom!</h1>
      <div class='set'>
        <div class='pets-name'>
          <label for='pets-name'>Name</label>
          <input id='pets-name' placeholder="Pet's name" type='text'>
        </div>
      </div>
      <div class='set'>
        <div class='pets-breed'>
          <label for='pets-breed'>Breed</label>
          <input id='pets-breed' placeholder="Pet's breed" type='text'>
        </div>
        <div class='pets-birthday'>
          <label for='pets-birthday'>Birthday</label>
          <input id='pets-birthday' placeholder='MM/DD/YYYY' type='text'>
        </div>
      </div>
      <div class='set'>
        <div class='pets-gender'>
          
          
        </div>
        <div class='pets-spayed-neutered'>
          
        </div>
        <script type="text/javascript">             
    // This is the code to preload the images
var imageList = Array();
for (var i = 1; i <= 7; i++) {
    imageList[i] = new Image(50, 50);
    imageList[i].src = "http://www.flowsim.se/picts/selec0" + i + ".jpg";
}

function switchImage() {
    var selectedImage = document.myForm.switch.options[document.myForm.switch.selectedIndex].value;
    document.myImage.src = imageList[selectedImage].src;
}
</script>
      </div>
      <div class='pets-weight'>
        <label for='pet-weight-0-25'>Weight</label>
          <img src="http://www.flowsim.se/picts/selec01.jpg" width="50" height="200" name="myImage" />
<form method="" action="" name="myForm">
    <select size="1" name="switch" onchange="switchImage();">
        <option value="1">Image 1</option>
        <option value="2">Image 2</option>
        <option value="3">Image 3</option>
        <option value="4">Image 4</option>
        <option value="5">Image 5</option>
        <option value="6">Image 6</option>
        <option value="7">Image 7</option>
    </select>
</form>
      </div>

    </header>

    <footer>
      <div class='set'>
        <button id='back'>Back</button>
        <button id='next'>Next</button>
      </div>
    </footer>

  </div>
</div>