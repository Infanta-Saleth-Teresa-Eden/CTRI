<!DOCTYPE html>
<html lang="en-US">
  <head>
    <style>
      html,body {
        height: 100%;
      }
      body {
        background-image: linear-gradient(rgba(255,0,0,0), rgba(33,102,172,1));
      }
      .column_1 {
        float: left;
        width: 39%;
        display: inline-block;
      }
      .column_2 {
        float: right;
        width: 60%;
        display: inline-block;
      }
      .row:after {
        content: "";
        width: 100%;
        display: block;
        clear: both;
      }
      div.form {
        display: block;
        text-align: center;
      }
      form {
        display: inline-block;
      }
      .label_pg {
        width:65%;
        float:center;
      }
      .label_health {
        width:50%;
        float:left;
      }
      .label_column_1 {
        width:50%;
        float:left;
      }
      .Chart {
        float: left;
        width: 20%;
      }
    </style>
  </head>
  
  <body>
    <div class="form">
      <form name="Advanced Search - Home" method="POST" action="advanced_2.php">
        <div class="row">
          <div class="column_1">
            <div style="display:inline-block;text-align:left">
              <br/><br/><br/>
              
              <label class="label_column_1">
                CTRI Number : </label> <input class="w3-input w3-border" style="width:40%;float:right" type="text" name="ctri_number" id="ctri_number" placeholder="CTRI/2019/04/018455" /> <br/><br/>             
              
              <label class="label_column_1">
                Date of Registration : </label> <input class="w3-input w3-border" style="width:40%;float:right" type="text" name="registered_on" id="registered_on" placeholder="08/04/2019"/> <br/><br/>              
              
              <label class="label_column_1">
                Last Modified Date : </label> <input class="w3-input w3-border" style="width:40%;float:right" type="text" name="last_modified_on" id="last_modified_on" placeholder="01/06/2020" /> <br/><br/>
              
              Scientific Title of Study : <input class="w3-input w3-border" style="width:96%" type="text" name="scientific_title" id="scientific_title" /> <br/><br/>
              
              <label class="label_column_1">
                Post Graduate Thesis : </label> <input style="width:10%" type="radio" id="Yes"  name="post_graduate_thesis" value="Yes"> <label class="label_pg">Yes</label> <input style="width:10%" type="radio" id="No" name="post_graduate_thesis" value="No"> <label class="label_pg">No</label> <br/><br/>
              
              <label class="label_health">
                Health Condition / Problems Studied : </label> <input class="w3-input w3-border" style="width:40%;float:right" type="text" name="condition" id="condition" /> <br/><br/><br/>
              
              <label class="label_column_1">
                Type of Trial : </label> <select style="width:45%;float:right" name="type_of_trial" id="type_of_trial"><option value="" disabled selected>--Select--</option><option value="Interventional">Interventional</option><option value="Observational">Observational</option><option value="27-TRIAL- Interventional 36">27-TRIAL- Interventional 36</option><option value="BA/BE">BA/BE</option><option value="PMS">PMS</option></select> <br/><br/>
              
              <label class="label_column_1">
                Phase of Trial : </label> <select style="width:45%;float:right" name="phase" id="phase"><option value="" disabled selected>--Select--</option><option value="Phase 3">Phase 3</option><option value="Phase 2">Phase 2</option><option value="Phase 2/ Phase 3">Phase 2/ Phase 3</option><option value="Phase 3/ Phase 4">Phase 3/ Phase 4</option><option value="Phase 4">Phase 4</option><option value="N/A">N/A</option><option value="Phase 1/ Phase 2">Phase 1/ Phase 2</option><option value="292-TRIAL- Phase 3 82">292-TRIAL- Phase 3 82</option><option value="Post Marketing Surveillance">Post Marketing Surveillance</option><option value="Phase 1">Phase 1</option></select> <br/>
              <br/>
            </div></div>
          
          <div class="column_2">
            <div style="display:inline-block;text-align:left">
              
              <b><u><center>Inclusion Criteria:</center></u></b> <br/>
              
              Age From : <input class="w3-input w3-border" style="width:30%" type="text" name="inclusion_age_from" id="inclusion_age_from" placeholder="18.00 Year(s)/Month(s)/Day(s)"/>
              Age To : <input class="w3-input w3-border" style="width:30%" type="text" name="inclusion_age_to" id="inclusion_age_to" placeholder="65.00 Year(s)/Month(s)/Day(s)"/><br/><br/>
              Gender : <select style="width:25%" name="inclusion_gender" id="inclusion_gender"><option value="" disabled selected>--Select--</option><option value="Both">Both</option><option value="Female">Female</option><option value="Male">Male</option><option value="290-TRIAL-Both 42">290-TRIAL-Both 42</option> </select>
              Countries of Recruitment : <select style="width:15%" name="countries_of_recruitment" id="countries_of_recruitment"><option value="" disabled selected>--Select--</option><option value="India">India</option></select>
              <br/><br/>
              Secondary IDs (if any) : <input class="w3-input w3-border" style="width:58%" type="text" name="id" id="id" /> <br/><br/>
              <b> <u><center>Intervention/Comparator Agent:</center></u></b> <br/>
              Comparator Name : <input class="w3-input w3-border" style="width:47%" type="text" name="comparator_name" id="comparator_name" /> <br/><br/>
              Intervention Name : <input class="w3-input w3-border" style="width:47%" type="text" name="intervention_name" id="intervention_name" /> <br/><br/>
              Date  of First Enrollment (India) : <input class="w3-input w3-border" style="width:38%" type="text" name="date_of_first_enrollment_india" id="date_of_first_enrollment_india" placeholder="15/04/2019"/> <br/><br/>
              Date of First Enrollment (Global) : <input class="w3-input w3-border" style="width:38%" type="text" name="date_of_first_enrollment_global" id="date_of_first_enrollment_global" /> <br/><br/>
            </div></div></div>
        
        <div class="Chart">
          <a href="advanced_bar_chart.php">
            <img src="Bar_Chart.png" width="160px" height="100px">
          </a>
          <br/>Column Chart
        </div>
        
        <div class="Chart">
          <a href="advanced_pie_chart.php">
            <img src="Pie_Chart.png" width="160px" height="100px">
          </a>
          <br/>Pie Chart
        </div>
        
        <div class="Chart">
          <a href="advanced_scatter_plot.php">
            <img src="Scatter_Plot.png" width="160px" height="100px">
          </a>
          <br/>Scatter Plot
        </div>
        
        <div class="Chart">
          <a href="advanced_bubble_chart.php">
            <img src="Bubble_Chart.png" width="160px" height="100px">
          </a>
          <br/>Bubble Chart
        </div>
        
        <div class="Chart">
          <a href="advanced_doughnut_chart.php">
            <img src="Doughnut_Chart.png" width="160px" height="100px">
          </a>
          <br/>Doughnut Chart
        </div>
        <br/><br/><br/><br/><br/><br/><br/><br/>
        
        <input type="submit" style="width:50%;height:4.2%;background-color:grey" name="submit" class="w3-input w3-border">
      </form>
    </div>
  </body>
</html>
