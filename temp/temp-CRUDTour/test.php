<html>
<head>
<script>
function add_tour_round(){
    var f = document.forms[0];
    var a = new Array();
    // save as temp
    for(var i = 0; i < f.length; i++)
	{
        a[i] = f.elements[i].value;
    }
    
    var total_text=document.getElementsByClassName("input_text");
    total_text=total_text.length+1;
    
    document.getElementById("tour_round_list").innerHTML += "<input required name='start_date[]' type='date' id='start'/> <input required name='end_date[]' type='date' id='end'/><br>";
		
    // reload   
    for(var i = 0; i < a.length; i++)
	{
		f.elements[i].value = a[i];
	}
}

    
function add_image(){
    var f = document.forms[0];
    var a = new Array();
    // save as temp
    for(var i = 0; i < f.length; i++){
        a[i] = f.elements[i].value;
    }
    
    var total_text=document.getElementsByClassName("input_text");
        total_text=total_text.length+1;
    
    if(document.getElementById("image_list").childElementCount < 10){
    
        document.getElementById("image_list").innerHTML += "<div><input required name='image[]' type='file'/><br></div>";
    }
    
    for(var i = 0; i < a.length; i++){
		  f.elements[i].value = a[i];
    }
}
</script>
</head>
<body>
<div id="wrapper">
<form action="show_test.php" method="post" name="form1">
<!--  Text : Tour name  -->
    <div id="name">
        <label>Tour name</label>
        <input required name='tour_name' type='text'/>
        <br>
    </div>
    
<!--  File[] : Image  -->
    <div id="image">
       <label>Image</label><br>
        <div id="image_list">
           <div>
            <input required name='image[]' type='file'/>
            <br>
           </div>
        </div>
        <input type="button" value="Add More" onclick="add_image();">
    </div>
    
    
   
<!--  Text : Highlight  -->
  <div id="highlight">
        <label>Highlight</label>
        <input required name='highlight' type='text'/>
        <br>
    </div>
   
<!--  PDF File : Schedule  -->
  <div id="schedule">
        <label>Schedule</label>
        <input required name='schedule' type='file'/>
        <br>
    </div>
   
<!--  Region  -->
    <div id="region">
        <label>Region</label>
        <input required name='region' type='text'/>
        <br>
    </div>
<!--  Province  -->
    <div id="province">
        <label>Province</label>
        <input required name='province' type='text'/>
        <br>
    </div>
<!--  Price sale  -->
    <div id="price">
        <label>Price sale</label>
        <input required name='price' type='number'/>
        <br>
    </div>
<!--  Tour type  -->
    <div id="type">
        <label>Tour type</label>
        <input required name='type' type='text'/>
        <br>
    </div>
<!--  Vehicel  -->
    <div id="vehicel">
        <label>Vehicel</label>
        <input required name='vehicel' type='text'/>
        <br>
    </div>
<!--  Accomodation  -->
    <div id="accomodation">
        <label>Accomodation</label>
        <input required name='accomodation' type='text'/>
        <br>
    </div>
<!--  Max # of customer  -->
       <div id="max">
        <label>Max</label>
        <input required name='max' type='number'/>
        <br>
    </div>
    
    
<!--  Tour round  -->
    <div id="tour_round">
       <div id="tour_round_list">
          <div>
              <label>Start date</label><label>End date</label><br>
            <input required name='start_date[]' type='date'/>
            <input required name='end_date[]' type='date'/>
            <br>
          </div>
       </div>
       <input type="button" value="Add More" onclick="add_tour_round();">
    </div>

    <input type="submit"/>
</form>
</div>
</body>
</html>