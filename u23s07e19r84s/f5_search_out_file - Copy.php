<?php

?>

<section class="w3-row">
    <!-- Left Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>

    <!-- Content Area -->
    <div class="w3-col l4">
        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray"> 
            <p>&nbsp;</p>  
            <h4 align="center">
                SEARCH OUT FILE
            </h4> 
            <script type="text/javascript" src="../js/search_out_file.js"></script>          
            <form class="w3-container" action="index.php" method="post" name="ffs">
                <select class="w3-select" name="searchCriterion">
                  <option value="" disabled selected>File Search Criterion</option>
                  <option value="fileNo">By File Number</option>
                  <option value="title">By Title</option>                                                                   
                </select>                
                <input class="w3-input" type="text" placeholder="File Search Keyword(s)" name="keyword" required="required" autocomplete="off" onkeyup='search_likely_files(document.forms["ffs"]["searchCriterion"].value, this.value)' onchange='search_likely_files(document.forms["ffs"]["searchCriterion"].value, this.value)'>
            </form> 
            <p>&nbsp;</p>          
        </div>

        <div class="w3-margin w3-border w3-round-large w3-border-orange w3-text-dark-gray" id="likelyFiles"> 
            <p>&nbsp;</p>                      
        </div>
    </div>

    <!-- Right Spacer -->
    <div class="w3-col l4">
        &nbsp;
    </div>
</section>
<section class="w3-row w3-padding w3-hide-large">&nbsp;</section>
<p>&nbsp;</p>