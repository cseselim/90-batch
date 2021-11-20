<div id="preloader" style="position: fixed;left: 0px;top: 0px;z-index: 999;opacity: 1.0;width: 100%;height: 100%;overflow: visible;background: url(<?php echo site_url(); ?>/wp-content/themes/price/img/ajax-loader.gif) center center no-repeat #d9edf7ed; display: none;"></div>
<div class="p_profile">
    <div class="col-md-4">
   <div class="user_img2">
      <div class="u_pro">
         <?php
            global $wpdb;
            $current_user = wp_get_current_user();
            $profile_pic = get_user_meta($current_user->ID,'wpmp_profile_pic',true);
            /*print_r($current_user);*/
            $profile = "SELECT sb_user_infos.user_id, sb_user_infos.name, sb_user_infos.dob, sb_user_infos.class, sb_user_infos.school, sb_user_infos.image, sb_game_level.id, sb_game_level.level, sb_game_start.attempt, sb_game_start.time, sb_divisions.name as division_name, sb_user_infos.division_id
    		        FROM sb_user_infos
    		        JOIN sb_game_start ON sb_game_start.user_id=sb_user_infos.user_id
    		        JOIN sb_game_level ON sb_game_level.id=sb_game_start.level
    		        LEFT JOIN sb_divisions ON sb_divisions.id=sb_user_infos.division_id
    		        WHERE sb_user_infos.user_id = ".$current_user->ID."";
    		        $profile_data = $wpdb->get_row($profile); //user level controll
    		/*print_r($profile_data);*/
    		 
    		 $student_rank = "SELECT x.position,
                        	   x.level,
                               x.score,
                               x.time,
                               x.user_id
                          FROM (SELECT sb_game_start.user_id, 
                                sb_game_start.score, 
                                sb_game_start.time,
                                sb_game_start.level,
                                @rownum := @rownum + 1 AS position
                                
                                FROM sb_game_start
                                INNER JOIN (SELECT @rownum := 0) r
                                WHERE sb_game_start.division_id = ".$profile_data->division_id." and sb_game_start.demo = 0
                        		ORDER BY CAST(sb_game_start.level as SIGNED INTEGER) DESC, sb_game_start.score DESC, CAST(sb_game_start.time as SIGNED INTEGER) ASC, sb_game_start.user_id ASC 
                              ) x   
                        where x.user_id = " . $current_user->ID;
		
		$rank = $wpdb->get_row($student_rank); //user level controll
		
            
            if(isset($profile_data) && $profile_data !=''){
              $url = $profile_data->image;
            }else{
              $url = "https://spellingbee.champs21.com/wp-content/uploads/no-image.png";
            }
            ?>
         <center><img alt="100%x200" src="<?php echo $profile_data->image; ?>" data-holder-rendered="true" style="border-radius: 50%; height: 130px; width: 130px; display: block;"></center>
       <br>
<!--           <small class="ttl_name1"><?php echo $current_user->display_name ?></small> 
         <br>
         <small class="ttl_name"><i class="fa fa-fw fa-envelope"></i><?php echo $current_user->user_email ; ?></small>   
         <br>         
         <small class="ttl_name"><?php echo $current_user->user_login  ; ?></small>            
         <br>
         <a href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>-->
         <div class="row">
             <div class="col-md-8 text-left">
                <small class="ttl_name1">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $profile_data->name ?></small><br>
                <small class="ttl_name"><i class="fa fa-fw fa-envelope"></i><?php echo $current_user->user_email ; ?></small><br>
                <small class="ttl_name"><i class="fa fa-fw fa-phone"></i><?php echo $current_user->user_login  ; ?></small>
             </div>
             <div class="col-md-4 text-left">
                <div class="p_position">
                    <h4>Position</h4>
                    <h3><?php echo ($rank) ? $rank->position : "-"; ?></h3>
                </div>
                 <h4 class="p_division"><?php echo $profile_data->division_name; ?></h4>
             </div>
         </div>
         <a class="p_logout" href="https://spellingbee.champs21.com/change-password">Change Password</a>
         <a class="p_logout" href="<?php echo wp_logout_url( home_url() ); ?>">Logout</a>
      </div>
   </div>
</div>
<div class="col-md-8">
   <div class="asdf">
<ul class="nav nav-tabs text_color2">
         <li class="active"><a data-toggle="tab" href="#home">Profile</a></li>
      </ul>
      <div class="tab-content register_r" style="margin-bottom:20px">
         <div id="home" class="tab-pane fade in active">
            <br>           
            <form name="wpmpProfileForm" id="wpmpProfileForm" method="post" enctype="multipart/form-data">
               <div id="wpmp-profile-loader-info" class="wpmp-loader" style="display:none;">
                  <img src="<?php echo plugins_url('images/ajax-loader.gif', dirname(__FILE__)); ?>"/>
                  <span><?php _e('Please wait ...', $this->plugin_name); ?></span>
               </div>
               <div id="wpmp-profile-alert" class="alert alert-danger" role="alert" style="display:none;"></div>
               <div class="form-group">
                  <label for="firstname"><?php _e('Name', $this->plugin_name); ?></label>
                  <sup class="wpmp-required-asterisk">*</sup>
                  <input type="text" class="form-control re_register" name="wpmp_fname" id="wpmp_fname" value="<?php echo $profile_data->name; ?>">
               </div>
               <!-- <div class="form-group">
                  <label for="lastname"><?php _e('Last name', $this->plugin_name); ?></label>
                  <input type="text" class="form-control re_register" name="wpmp_lname" id="wpmp_lname" value="<?php echo $current_user->last_name; ?>">
               </div> -->
               
               <?php $all_class = array('six','seven','eight','nine','ten') ?>
               <div class="form-group">
                  <label for="class"><?php _e('Class', $this->plugin_name); ?></label>
                  <select class="form-control" name="wpmp_class" id="wpmp_class">
                      <option value=" ">Select class</option>
                      
                     <?php foreach ($all_class as $one_class) { ?>
                        
                        <option <?php echo ($profile_data->class == $one_class)  ? "selected" : ""; ?> value="<?= $one_class ?>"><?= $one_class ?></option>
                     
                     <?php } ?>

                  </select>
              </div>

               <div class="form-group">
                  <label for="school"><?php _e('School', $this->plugin_name); ?></label>
                  <input type="text" class="form-control" name="wpmp_school" id="wpmp_school" value="<?php echo $profile_data->school; ?>" autocomplete="off">
               </div>
               
               <div class="form-group">
                  <label for="email"><?php _e('Email', $this->plugin_name); ?></label>
                  <sup class="wpmp-required-asterisk">*</sup>
                  <input type="text" class="form-control re_register" name="wpmp_email" id="wpmp_email" value="<?php echo $current_user->user_email; ?>">
               </div>
               
                <div class="form-group date_r">
                    <label for="date of birth"><?php _e('Date of Birth', $this->plugin_name); ?></label>
                    <div class="input-group date" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true" style="width: 100%">
                        <input type="text" class="form-control" name="wpmp_date" id="wpmp_date" placeholder="Date of Birth" autocomplete="off" value="<?php echo $profile_data->dob; ?>">
                        <div class="input-group-addon">
                            <span class="fa fa-fw fa-calendar"></span>
                        </div>
                    </div>
                </div> 
              
               <div class="form-group">
                  <label for="profile_pic"><?php _e('Profile Image', $this->plugin_name); ?></label>
                  <sup class="wpmp-required-asterisk">*</sup>
                  <input type="file" class="form-control re_register" name="wpmp_profile_pic" id="wpmp_profile_pic">
               </div>
               <?php
                  // this prevent automated script for unwanted spam
                  if (function_exists('wp_nonce_field'))
                      wp_nonce_field('wpmp_profile_action', 'wpmp_profile_nonce');
                  
                  ?>
               <button type="submit" class="btn btn-primary re_submit"><?php _e("Update") ?></button>
            </form>
         </div>
      </div>   
   </div>
   <!---/user_bg_img-->
</div>
</div>

<script type="text/javascript">
   function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += '<input type="hidden" value="' + arr[i] + '">';
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var schools = ["A.G. Church School","ABC International School","Abdul kadir mollah international school","Academia","Adamjee Cantonment Public School and Collage","Adam's Garden International School","Adroit International School","Agrani School and College, Dhaka","Ali Hussain Girls' High School","Aloron International School & College","American International School of Dhaka","Angelica International School","Anwara Begum Muslim Girls' High School And College","Apple Tree International School ","Arambagh Girls' High School and College","Arcadia English Medium School","Armanitola Government High School","Australian international school dhaka","Averroes International School","B A F SHAHEEN COLLEGE KURMITOLA","B N COLLEGE, DHAKA","B.A.F Shaheen College, Pahar Kanchanpur (PKP)","B.C.I.C School and College","Bacha English Medium School","Badshah Faisal Institute","BAF Shaheen English Medium (SEMS)","BAF Shaheen School & College","Banani Bidyaniketan School & College","Bangladesh Grammar School","BANGLADESH IDEAL SCHOOL AND COLLEGE","Bangladesh Int School","Bangladesh International School & College","Bangladesh International Tutorial","Bangladesh International Tutorial Campus 1","Banophool Adibashi Green Heart College","Baptist Mission Integrated School ","Baridhara Scholars Institution","Barnamala Adarsha High School & College","BEPZA Public School & College","BIAM Model School and College","Bir Shreshtha Noor Mohammad Public College","Birshreshtha Munshi Abdur Rouf Public College","BN School Dhaka","BPATC School and College","British Columbia School","Cambrian School Campus ","Canadian International School, Dhaka","Cantonment bof english school","Cardiff international school dhaka","Cherry Blossoms International School","Chittagong Grammar School Dhaka","City Model School","Civil Aviation School And College","College of Development Alternative [CODA]","Cordova International School & College","Cordova Int'l School & College","Cosmo School and College","Daffodil International School Uttara","Darland International School","Dhaka Cantonment Girls' Public School & College","Dhaka Grammar School & College","Dhaka Residential Model College","Dhaka shiksha board laboratory school & college","Dhanmondi Government Boys' High School","Dhanmondi Govt. Girls' High School","Dhanmondi Tutorial","Don Bosco School & College","DPS STS School, Uttara","Drexel International School","East-West International School & College","Ebenezer International School","Eminence International School & College","Engineering University School & College","Europian Standard, Dhanmondi","Faizur Rahaman Ideal Institue","Faizur Rahman Ideal Institute","Feroza bashar ideal college","Gateway International School","Gazipur Cantonment College","Glory School & College","Golgotha English Medium School (GEMS)","Government Laboratory High School","Government Science College Attached High School","Grace International School","Green Dale International School","Green Gems International School","Gulshan International School","Gulshan Int'l School","Heed International School ","Holy Cross Girls High School","Holycross Girls High School","Hope International School","Hurdco International School","Insight International School, Dhaka","Int Turkish Hope School","International Hope School Bangladesh","International School BANGLADESH","International School Dhaka","Islami Bank International School & College","Ispahani Girls School And College","ISPAHINY GIRLS SCHOOL AND COLLEGE","JAAGO Foundation","Juvenile English Medium School","Juvenile School","Kadamtala Purba Bashabo School & College","Kakoli High School & College","Kallyanpur Girls School And College","Khilgaon Girls School and College","Khilgaon Ideal School","Khilgaon Laboratory School and College","Kisholoy Girls School and College","Kurmitola High School & College","Lake head Grammer School","LALMATIA GIRLS HIGH SCHOOL","Lalmatia Housing ","Lalmatia Housing Society School and College","London Grace International School, Dhaka, Bangladesh","LORDS (An English Medium School)","MA HAAD School","Manarat Dhaka International School and College","Mangrove School","Maple Leaf International School","Marie Curie School","Master Mind","MasterMind School ","Methodist English Medium School","Milestone Bangla Version","MILESTONE SCHOOL (English Medium)","Mirpur Bangla High School and College","Mirpur Cantonment Public School & College","Mirpur Cantonment Public School and College","Mirpur english version school","Mirpur Girls' Ideal Laboratory Institute","Mohakhali Ideal high school","Mohammadpur Model School & College","Mohammadpur Preparatory High School","Mohammadpur Preparatory School & College","Monipur High School ","Monipur High School & College ","Motijheel Govt. Boy's High School","Motijheel Govt. GirlsHigh School","Motijheel Ideal High School","Motijheel Model High School","Muslim Modern Academy","National Bank Public School & College","Navy Anchorage School & College Dhaka","Nawabagon Pilot Uchcha Madyamic Balika Bidyalaya","New redland school ","Nirjhor Cantonment Public School & College","Northern international school","Novelty School & College","Oasis English School","Onnesha International School & College","Oxford Int'l School","Park International School and College","Park International School and College, Dhaka","Pen Field School","Playpen School","Pledge Harbor international School","Premier School Dhaka","Prime Bank English Medium School","Progress English Medium School","Queens School and College","Raihan School & College","Rajarbagh Police Line Uchcha Madyamic Bidyalaya","Rajarbagh Police Lines School & College","Rajdhani High School","Rajendrapur Cantonment Public School and College","Rajuk uttara high School","S.F.X Greenherald Int'l School","Saint Gregory","Saint Judes International School","Savar Cantonment Public School and College","Scholars' School & College","Scholastica ","Scholastica Campus 1","School of Development Alternative","SchoolEdge","Sea Breeze International School","Shaheed Bir Uttam Lt. Anwar Girls' College","Shaheed Police Smrity School (Mirpur-14)","Shaheed Romijuddin Cantonment College","Shamsul Hoque Khan School & College","SHER E BANGLA HIGHER SECONDARY SCHOOL","Shere Bangla Govt Boys (Agargaon)","Shiddeshwari Girls' High School","Siddheswari Boys Higher Secondary School","Singapore International School","Singapore School Kinderland","Sir John Wilson School","SOS Harmen Gmerion College ","SOS HERMANN GMEINER COLLEGE DHAKA","South Breeze School","South Brezz","South point School","St Francis Xavier's Green Herald International School","St. Francis Xavier's Girls High School","St. Gregory's High School & College","St. Joseph Higher Secondary School","St.Peter's School of London","Stride international school","Summerfield International School","Sunbeams Dhanmondi","Sunbeams School","Sunnydale","Sunnydale School","Sunrise KG & High school","Sydney International School","Tejgaon Government Girls' High School","Tejgaon Government High School","The Aga Khan School, Dhaka","The Ark Int'l School","The British School","The New School Dhaka","Udayan Higher Secondary Schoo","University Laboratory School","Uttara High School and College","Viqarunnisa Noon School","Viqarunnisa Noon School and College","Vision Global School","West Dhanmondi International School","Western School","Willes Little Flower School","Winsome School & College","Wordbridge School","Yale international school","YWCA Higher Secondary Girls’ School","Zerabo Cantonment Public School & College","B A F Shaheen College Kurmitola","Bangladesh International School & College ","Bangladesh International School & College, Nirjhor","Birshreshtha Munshi Abdur Rouf Public College","Cantonemnt BOF English School","Dhaka Cantonment Girls' Public School & College","Gazipur Cantonment College","Savar Cantonment Public School & College","Shaheed Ramiz Uddin Cantonment College","Zerabo Cantonment Public School & College","BAF Shaheen College PaharKanchanPur (PKP)","Baridhara Scholars' International School and College (BSISC)","Rajendrapur Cantonment Public School & College","Ghatail Cantonment Public School & College","Cantonment Public School and College Momenshahi","A. L. Khan High School","Agrabad Government Colony High School","Al Hidaayah International School","Al Noor KG And High School","Alekjan Memorial College","American School Chattogram","Aparnacharan City Corporation Girls' High School","Asma Khatun City Corporation Girls' High School","Bagmoniram Abdur Rashid City Corporation Boys’ High School","Bakalia High School","Bangladesh Elementary School","Bangladesh Mahila Samiti Girls' High School & College","Bay View School","Bepza Public School And College","CDA Public School & College ","Chattogram Municipal Model School & College","Chittagong Collegiate School","Chittagong Government High School","Chittagong Grammar School","Chittagong International School","Chittagong Model School and College","Chittagong Municipal Model High School","Chottogram Port Authority High School","Cider International School","Comilla housing estate school and college","Comilla Zilla School","Crans-Montana International School","CTG Idel School & Collage","Cygnus International School & Cygnus Language Academy","Daffodil International School","Darul Irfan Academy ","Dewpoint School ","Dr. Khastagir Government Girls' School","Ethnica School","European Grammar School ","Garib-E-Newaz High School","GEMS English Medium School","Government Muslim High School","Green Hill English School","Greenland School & College","Gunners' English School","Hatey Khari High School & College ","Imperial School & College","Imperial School & College ","Ispahani Public School & College","J.M. Senior School & College","Jamalkhan Kusum Kumari City Corporation Girls' High School","Kazim Ali High School","Kernel National School ","Khulshi Cherry Grammar School","Leaders' School and College Chattogram","Little Jewels School","Mastermind International School","Merit Bangladesh School & College ","Nasirabad Government Girls High School","Oxford International School & College, Chittagong","Pinnacle Chartered School & College","Pologround High School","Premier English School Chittagong","Presidency Int School & Collage","Queen Mary School & College","Redint School & Collage","Saint Placid's High School","School of Science Business & Humanities","Shah Amanat City Model School & College","Shaheed SPM Shamsul Haque Public School","Silver Bell school","Sir Maurice Brown International School (SMBIS)","South Point School & Collage","St. Mary's School","St. Scholastica's Girls' High School","Standard School & College ","Summerfields School And College","Sunshine Grammar School","The Dux An English Medium School","Western International School and College","William Carey ","Green Hill English School","Gunners' english school","Halishahar Cantonment Public School & College ","BAF Shaheen College, Chittagong","Bandarban Cantonment Public School & College","Cantonment English School & College","Chakaria cantonment english school","Chittagong Cantonment Public College","Khagrachari Cantonment Public School & College","Lakers Public School & College","Navy Anchorage School and College Chittagong","BN School & College, Chittagong","Ramu Cantonment English School","Mynamati International School","Bangladesh Navy School and College Kaptai","Agrani School and College","Armed Police Battalion School and College","Baghopara shaheed danesh uddin School and College","Barshi Bhanga B.a.b.m. High School & College","BIAM Model School and College","Bogra Coronation Institution and College","Bohumkhi Girls High School","Border Guard Public School & College","Cambridge Pre Cadet School And College","Chehel Gazi Shikksha Niketan High School and College","Collegiate Girl's High School& College","Government Laboratory High School Rajshahi","Govt. PN Girl's High School","Katila Shoboj Shango School & College","Khademul Islam Girls School & College","Lions School And College","Luxmipur Girls High School","Millennium Scholastic School & College","Mondumala Girl's High School And College","Muhammadpur Tikapara GOVT Primary School","Nishindara Fakir Uddin School & College","Paramount School & College","Police Lines School and College","Rajshahi B.B Hindu Acadamy","Rajshahi Cantonment Board School & College","Rajshahi Adarsha High School","Rajshahi Bohumukhi Girls' High School","Rajshahi Collegiate School & College","Rajshahi Govt Model School & College","Rajshahi Govt. Girls High School Helenabad Rajshshi","Rajshahi Shikkha Board Govt. Model School And College","Rajshahi University School","Rcci Public School And College","Riverview Coll. School Rajshahi","Shimul Memorial North South School","Seroil Govt. High School","Shahid Nazmul Haque Girls' High School.","Shahid Nader Ali Girls School & College","Sirajganj Police Lines School & College","SOS Hermann Gmeiner College Bogura","Sappers' angelic millennium school","Parbatipur Cantonment Public school and College","Quadirabad Cantonment Public School","Rajshahi Cantonment Public School And College","Bogra Cantonment Public School & College","BAF Shaheen College,Jessore","Abdul Gafur Islami Ideal High School and College","Al Azam School & College","Al-Azam High School and College","Ar Raiyan International School","Amborkhana Girls' High School & College","Anandaniketan School","Bhatrai High School And College","Bidyanikaton","Blue Bird School & College","Border Guard Public School & College","Britannica English Medium School","British Bangladesh Int'l School","British Bangladesh International School & College","Cambridge Grammer School & College","City School & College","Classic International School & College","Dhakadakshin Multilateral High School and College","Dipshikha Precadet","Forest Hill School","Govt. Agragami Girls High School","Holy Child School","Jahir Tahir Memorial High School","Kazi Jalal Uddin Girls' High School","Kishori Mohan Girls High School","Mirzajangal Girls High School","Moinunnessa Girls' High School","Muhibur Rahman Academy","New Nation School & College","Osmani Medical High School","Parua Anwara High School & College","PDB High School","Pioneer School & College","SAARC International School","Sawdhersree High School & College","Scholarshome","Shahjalal Jamia Islamia School & College","Shimantik Ideal School & College","Starlight Academy And College","Stemays School","Sunny Hill International School & College","Sylhet Government Model School & College","Sylhet Govt. Pilot High School Sylhet","Sylhet Grammer School","Sylhet Ideal School & College","Sylhet International School and College","Sylhet Residential School & College","The Aided High School","The Buds' Residential Model School & College","The Sylhet Khajanchi Bari International School & College","Westpoint School","Jalalabad Cantonment English School (JCES)","Jalalabad Cantonment Public School and College","BAF Shaheen College Shamshernagar","BN School & College","Baruna Bazar P.D.C. Collegiate School","Batbunia Collegiate School","Bhaturia High School and College","Chhatiantala Girl's High School","Enlightened Life School Khulna","Govt. Coronation Girls School","Ideal Public School and College","Islamabad Collegiate High School","Jashore Shikkha Board Model School And College","Khulna Collectorate Public School & College","Khulna Collegiat Girls School ","Khulna Engineering University School","Khulna Model School and College","Khulna Public College","Khulna Zilla School","Lakshanpur School And College","Lakshimikhola Higher Secondary School","Lions School and College ","Maulana Bhashani bidyapith girls school and college","Military Collegate School (MCSK) ","Nasir Uddin Biswas Higher Secondary Girl's School","Nebir English Medium School","Police Line School and College","R.k.b.k Harish Chandra Collegeate School ","Raipur School and College","Rosedale International School khulna","S O S Harmar Meinar High School","Saint Joseph's High School","Shahid Suhrawardy High School","Shipyard School and college","Shipyard School and College","Sk. Akijuddin Higher Secondery School And College","South Herald English School","South Summit International School","South Valley International School","Southern English School & College","Sristy Central School and College","T & T Adarsha High School khulna","Navy Anchorage School And College","Jahanabad Cantonment Public School","Jahanabad english school","Jessore English School and College (JES)","Daud Public School & College","BN School & College Mongla","BN School and College, Khulna","BIAM Model School and College","Bir Uttom Shaheed Samad School and College","Border Guard Public School and College","British Standard School","Carmical Collegiate High School & College","Carmichael collegiate School and College","Collegiate girl's high sSchool & College","Futkibari high School and college","Ghughudanga high School and College","International Grammer School-IGS","KIK UCEP Rangpur City Corporation School, Rangpur","Lions School And College","Medical College School","Nalanda International School","Nashipur high School and College","North West International School","Police Lines School and College","Rangpur Govt. Girls School","Rangpur Grammer School","Rangpur High School","Rangpur Public School and College","Rangpur Zilla School","Rcci public School and College","Residential model School and College","Shahan International School","Shishu niketon School and College","The Millinum Stars School ","Wins School & Collage","Rangpur Cantonment Public School & College","Saidpur Cantonment Public School & College","Millennium Scholastic School & College","Millennium stars school and college ","Lalmonirhat Cantonment Public School & College","A.R.S Girls Secondary School","Adventist International Mission School barisal","Bapist Missonary Boys High School","Barisal Govt Girls High School","Barisal Zilla School","Barishal Govt. Model School & College","BM School","Fazlulhuq Res. School & College","Kashipur High School","Manik Mia High School","United Secondary School","S.C.G.M. High School","Mumtaj Mojedunnesa Girls High School","Barisal Residential School & College","Halima Khatun Secondary Girls School","Jagadish Saraswat Girls' School & College","Jahanara Israil School & College","Jogadish Shashoto Girls High School","Oxford mission high school","Sabera khatun Girls Secondary School","Udayan High School"];

/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("wpmp_school"), schools);
</script>