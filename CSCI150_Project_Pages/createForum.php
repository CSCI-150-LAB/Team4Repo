<?php
   require ("./header.php");
?>
<body>
    <h1>Create A Forum</h1>
    <form action="./createforumdata.php" method="post" target="_blank" enctype="multipart/form-data">
        <div>
	        <p>Select Class</p>
	        <label for="itemselection"> </label>
	        <select id="itemselection" name="itemselection" required>
                    <option selected="" value="null">Tag:</option>
                    <option value="ACCT">Accountancy (ACCT)</option>
                    <option value="AFRS">Africana Studies Program (AFRS)</option>
                    <option value="AGBS">Agricultural Business (AGBS)</option>
                    <option value="AGED">Agricultural Education (AGED)</option>
                    <option value="AGRI">Agriculture-Graduate or Interdisciplinary (AGRI)</option>
                    <option value="AH">Arts &amp; Humanities - Interdisciplinary (AH)</option>
                    <option value="AIS">American Indian Studies (AIS)</option>
                    <option value="ANTH">Anthropology (ANTH)</option>
                    <option value="ARAB">Arabic (ARAB)</option>
                    <option value="ARM">Armenian (ARM)</option>
                    <option value="ARMS">Armenian Studies (ARMS)</option>
                    <option value="ART">Art (ART)</option>
                    <option value="ARTDS">Art and Design (ARTDS)</option>
                    <option value="ARTH">Art History (ARTH)</option>
                    <option value="ASAM">Asian American Studies (ASAM)</option>
                    <option value="ASCI">Animal Sciences (ASCI)</option>
                    <option value="ASP">Aerospace Studies (ASP)</option>
                    <option value="AT">Athletic Training (AT)</option>
                    <option value="ATHL">Athletics (ATHL)</option>
                    <option value="BA">Business Administration (BA)</option>
                    <option value="BIOL">Biology (BIOL)</option>
                    <option value="BIOTC">Biotechnology (BIOTC)</option>
                    <option value="CE">Civil Engineering (CE)</option>
                    <option value="CFS">Child and Family Science (CFS)</option>
                    <option value="CGSCI">Cognitive Science (CGSCI)</option>
                    <option value="CHEM">Chemistry (CHEM)</option>
                    <option value="CHIN">Chinese (CHIN)</option>
                    <option value="CI">Curriculum and Instruction (CI)</option>
                    <option value="CLAS">Chicano and Latin American Studies (CLAS)</option>
                    <option value="CM">Construction Management (CM)</option>
                    <option value="COMM">Communication (COMM)</option>
                    <option value="COMS">Community Service (COMS)</option>
                    <option value="COUN">Counselor Education (COUN)</option>
                    <option value="CRIM">Criminology (CRIM)</option>
                    <option value="CRP">City and Regional Planning (CRP)</option>
                    <option value="CSB">Craig School of Business - Business Administration (CSB)</option>
                    <option value="CSCI">Computer Science (CSCI)</option>
                    <option value="CSDS">Communicative Sciences and Deaf Studies (CSDS)</option>
                    <option value="CSM">College of Science and Mathematics (CSM)</option>
                    <option value="CST">CalState TEACH (CST)</option>
                    <option value="CULG">Food Culinary Science (CULG)</option>
                    <option value="DANCE">Dance-Theatre Arts (DANCE)</option>
                    <option value="DRAMA">Drama-Theatre Arts (DRAMA)</option>
                    <option value="DS">Decision Sciences (DS)</option>
                    <option value="EAD">Educational Administration (EAD)</option>
                    <option value="ECE">Electrical and Computer Engineering (ECE)</option>
                    <option value="ECON">Economics (ECON)</option>
                    <option value="EDL">Educational Leadership (EDL)</option>
                    <option value="EES">Earth &amp; Environmental Sciences (EES)</option>
                    <option value="EHD">Education and Human Development (EHD)</option>
                    <option value="ENGL">English (ENGL)</option>
                    <option value="ENGR">Engineering (ENGR)</option>
                    <option value="ENOL">Enology (ENOL)</option>
                    <option value="ENTR">Entrepreneurship (ENTR)</option>
                    <option value="ERE">Educational Research &amp; Evaluation (ERE)</option>
                    <option value="ESE">Early Start English (ESE)</option>
                    <option value="ESL">English as a Second Language (ESL)</option>
                    <option value="ESM">Early Start Mathematics (ESM)</option>
                    <option value="FBS">Forensic Behavioral Sciences (FBS)</option>
                    <option value="FCS">Family and Consumer Sciences (FCS)</option>
                    <option value="FIN">Finance (FIN)</option>
                    <option value="FL">Foreign Language (FL)</option>
                    <option value="FM">Fashion Merchandising (FM)</option>
                    <option value="FN">Food and Nutrition (FN)</option>
                    <option value="FREN">French (FREN)</option>
                    <option value="FSC">Food Science (FSC)</option>
                    <option value="FSM">Food Systems Management (FSM)</option>
                    <option value="GD">Graphic Design (GD)</option>
                    <option value="GEOG">Geography (GEOG)</option>
                    <option value="GERM">German (GERM)</option>
                    <option value="GERON">Gerontology (GERON)</option>
                    <option value="GME">Geomatics Engineering (GME)</option>
                    <option value="GRK">Greek (GRK)</option>
                    <option value="HEAL">Higher Education Administration and Leadership (HEAL)</option>
                    <option value="HEBR">Hebrew (HEBR)</option>
                    <option value="HEC">Home Economics Education (HEC)</option>
                    <option value="HHS">Health and Human Services (HHS)</option>
                    <option value="HIST">History (HIST)</option>
                    <option value="HMONG">Hmong (HMONG)</option>
                    <option value="HONOR">Smittcamp Honors College (HONOR)</option>
                    <option value="HRM">Human Resource Management (HRM)</option>
                    <option value="HUM">Humanities (HUM)</option>
                    <option value="IAS">Interdisciplinary Arts Studies (IAS)</option>
                    <option value="ID">Interior Design (ID)</option>
                    <option value="INTD">Interdisciplinary Capstone (INTD)</option>
                    <option value="IS">Information Systems (IS)</option>
                    <option value="ISA">International Studies Abroad (ISA)</option>
                    <option value="IT">Industrial Technology (IT)</option>
                    <option value="ITAL">Italian (ITAL)</option>
                    <option value="JAPN">Japanese (JAPN)</option>
                    <option value="JS">Jewish Studies (JS)</option>
                    <option value="KAC">Kinesiology Activity (KAC)</option>
                    <option value="KINES">Kinesiology (KINES)</option>
                    <option value="LATIN">Latin (LATIN)</option>
                    <option value="LEE">Literacy and Early Education (LEE)</option>
                    <option value="LING">Linguistics (LING)</option>
                    <option value="LS">Liberal Studies (LS)</option>
                    <option value="MATH">Mathematics (MATH)</option>
                    <option value="MBA">Master of Business Administration (MBA)</option>
                    <option value="MCJ">Media, Communications and Journalism (MCJ)</option>
                    <option value="ME">Mechanical Engineering (ME)</option>
                    <option value="MEAG">Mechanized Agriculture (MEAG)</option>
                    <option value="MES">Middle East Studies (MES)</option>
                    <option value="MGT">Management (MGT)</option>
                    <option value="MKTG">Marketing (MKTG)</option>
                    <option value="MPA">Master of Public Administration (MPA)</option>
                    <option value="MS">Military Science (MS)</option>
                    <option value="MSA">Master of Science in Accountancy (MSA)</option>
                    <option value="MUSIC">Music (MUSIC)</option>
                    <option value="NSCI">Natural Science (NSCI)</option>
                    <option value="NURS">Nursing (NURS)</option>
                    <option value="NUTR">Nutrition (NUTR)</option>
                    <option value="PAX">Peace and Conflict Studies (PAX)</option>
                    <option value="PERS">Persian (PERS)</option>
                    <option value="PH">Public Health (PH)</option>
                    <option value="PHIL">Philosophy (PHIL)</option>
                    <option value="PHTH">Physical Therapy (PHTH)</option>
                    <option value="PHYS">Physics (PHYS)</option>
                    <option value="PLANT">Plant Science (PLANT)</option>
                    <option value="PLSI">Political Science (PLSI)</option>
                    <option value="PORT">Portuguese (PORT)</option>
                    <option value="PSCI">Physical Science (PSCI)</option>
                    <option value="PSYCH">Psychology (PSYCH)</option>
                    <option value="RA">Recreation Administration (RA)</option>
                    <option value="REC">Recreation Administration (REC)</option>
                    <option value="REHAB">Rehabilitation Counseling (REHAB)</option>
                    <option value="SOC">Sociology (SOC)</option>
                    <option value="SPAN">Spanish (SPAN)</option>
                    <option value="SPED">Special Education (SPED)</option>
                    <option value="SSCI">Social Science (SSCI)</option>
                    <option value="SWRK">Social Work (SWRK)</option>
                    <option value="UNIV">University (UNIV)</option>
                    <option value="VEN">Viticulture and Enology (VEN)</option>
                    <option value="VIT">Viticulture (VIT)</option>
                    <option value="WS">Women's Studies (WS)</option>
            </select>
        </div>

        <div>
            <input type="text" id="sub" name="sub"placeholder ="Subject" required maxlength="50">
        </div>
 
        <div>
            <label></label>
            <textarea id="myTextArea" name="myTextArea" required maxlength="1000"rows="30" cols="60" placeholder="Write post..." spellcheck = "true" style="border:4px solid #1E9AFF;"></textarea>
        </div>

        <div>
		    <label>Select image file:</label>
		    <input type="file" name="image" accept="image/*" required>
	    </div>
        <br><br>
        <input type="submit" value="post" name ="submit">
    </form>
</body>
