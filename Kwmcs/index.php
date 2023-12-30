<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<style>

*body{
    padding: 0px;
    margin: 0px;

}

.first_container{
    padding: 0px;
    margin: 0px;
    width: 100%;
    height: 345px;
    background-color: #4CB9E7;
}

.first_container_heading{
    font-size: 80px;
    color: white;
    text-align: center;
    display: block;
    top: 15px;
    left: 0;
    right: 0;
    position: absolute;

}

.first_container_sub_heading{
    font-family: Arial, sans-serif;
    font-size: 35px;
    color: lightgrey;
    text-align: center;
    display: block;
   
    left: 0;
    right: 0;
    top:130px;
    position: absolute;
}

.Mid_container{
    display: flex;
    justify-content: space-evenly;
    padding: 50px;
}

/* .Mid_container_img{
  margin-right: 20px;
    height: 650px;
    width: 750px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
} */

.Mid_container img{

  
    float: left;
    margin-right: 20px;
    height: 650px;
    width: 750px;
    box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2),
   
}

.End_container h5{
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    font-size: 20px;
    padding: 30px ;
    font-weight: lighter;
    position: relative;

}

.End_container_img{
    float:left;
    width: 750PX;
    left: 0%;
    justify-content: space-between;
    align-items:center;
    margin-bottom: 100px;

}


.footer{
  background-color: #4CB9E7;
  width: 100%;
  height: 80px;
  padding: 0px;
  margin-top: 470px;
   
}

.footer h2{
  color: white;

  font-family:'Century Gothic';
  font-size: 20px;
 position: absolute;
 margin-left: 24%;

}

.footer a{

  text-decoration: none;
  color: black;
  background-color: #007bff;
  padding: 6px;
  border-radius: 190px;
  position: relative;;
  
}

/* mid form */

.First-container{
  width: 100%;
  height: 450px;
  background-color: #007bff;
}

.calculator {
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
  text-align: left;
  max-width: 400px;
  width: 90%;
  margin: auto;
  
}

.calculator h1{
  text-align: center;
}

.input-section {
  margin-bottom: 20px;
}

input[type="text"],
input[type="number"],
button {
  padding: 8px;
  border: 1px solid #ccc;
  border-radius: 4px;
  width: 100%;
  margin-bottom: 10px;
}

button {
  background-color: #007bff;
  color: #fff;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

button:hover {
  background-color: #0056b3;
}

.result {
  font-size: 18px;
}

</style>
<body>
    
    <div class="first_container">

        <h2 class="first_container_heading">BMI Calculator</h2>

        <h6 class="first_container_sub_heading">"Your Health Index Analyzer"</h6>

    </div>


    <div class="Mid_container">
<div class="Mid_container_img">
        <img src="./Assets/img/woman-on-scale-705x370.jpg" alt="img loading error">
  
    </div>
        <div class="calculator">
  
            <h1>BMI Calculator</h1>
  
            <form onsubmit="event.preventDefault(); calculateBMI();" id="bmiForm">
  
                <div class="input-section">
                <div class="datastored">
                  <p><span id="dataStoredMessage"></span></p>
                </div>
                <label for="name">Name:</label>
                <input
                  type="text"
                  id="name"
                  name="name"
                  placeholder="Enter name"
                /><br /><br />
                <label for="age">Age:</label>
                <input
                  type="number"
                  id="age"
                  name="age"
                  placeholder="Enter age"
                /><br /><br />
                <label for="height">Height (cm):</label>
                <input
                  type="number"
                  id="height"
                  name="height"
                  placeholder="Enter height in cm"
                /><br /><br />
                <label for="weight">Weight (kg):</label>
                <input
                  type="number"
                  id="weight"
                  name="weight"
                  placeholder="Enter weight in kg"
                /><br /><br />
                <button type="submit">Calculate BMI</button>
              </div>
            </form>
            <div class="result">
              <p>Your BMI is: <span id="result"></span></p>
            </div>
          </div>
      
    </div>

    

    <div class="End_container">

        <h5>
            Body mass index (BMI) is a measure of your weight relative to your height and functions as a rough estimate of body fat. When you enter your height and weight into a BMI calculator, you’ll get a number. That number is one way to gauge if you have a healthy or unhealthy weight.
        </h5>

        <img class="End_container_img" src="./Assets/img/chatt1.jpg" alt="img loading error">
        <img class="End_container_img" src="./Assets/img/chat2.jpg" alt="img loading error">

    </div>

    <div class="footer">

  <h2>"Empower yourself with knowledge. Discover your BMI and take charge of your health."</h2>

  <a href="http://localhost/projects/Kwmcs/phpcrud/">ADMIN</a>

    </div>
    


 <!-- javascript -->
 <script>
    function calculateBMI() {
      const height = parseFloat(document.getElementById("height").value);
      const weight = parseFloat(document.getElementById("weight").value);

      if (height && weight) {
        const bmi = (weight / ((height / 100) * (height / 100))).toFixed(2);
        document.getElementById("result").textContent = bmi;

        // Send the data to the backend (PHP) for storage as form data
        const formData = new FormData(document.getElementById("bmiForm"));
        formData.append("bmi", bmi);

        fetch("./Assets/bmi_operations.php", {
          method: "POST",
          body: formData,
        })
          .then((response) => response.json())
          .then((data) => {
            const dataStoredMessage =
              document.getElementById("dataStoredMessage");
            if (data.message) {
              dataStoredMessage.textContent = data.message;
            } else {
              dataStoredMessage.textContent = "Error storing data";
            }
          })
          .catch((error) => {
            console.error("Error:", error);
            document.getElementById("dataStoredMessage").textContent =
              "Error storing data";
          });
      } else {
        document.getElementById("result").textContent =
          "Please enter valid height and weight.";
      }
    }
  </script>



</body>
</html>