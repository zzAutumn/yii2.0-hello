<?php
/**
 * Created by PhpStorm.
 * User: yezi
 * Date: 2018/3/26
 * Time: 上午8:57
 */
use yii\helpers\Html;
?>
<?= Html::cssFile('@web/css/mirna/aboutPage.css') ?>
<script>
    function showMe(divDisplay) {
        if(document.getElementById(divDisplay).style.display !== "block")
        {
            document.getElementById('tab1').style.display = "none";
            document.getElementById(divDisplay).style.display = "block";
        }
        else
        {
            document.getElementById(divDisplay).style.display = "none";
        }

    }
</script>


<div class="content">
    <ul class="nav nav-tabs" id="tabs" data-tabs="tabs">
        <li role="presentation" class="active"><a href="#tab1" data-toggle="tab">About PmiRExAt</a></li>
        <li role="presentation"><a data-toggle="tab"  onclick="showMe('tab2')">Release Information</a></li>
        <li role="presentation"><a data-toggle="tab" onclick="showMe('tab3')">About Development Team</a></li>
        <li role="presentation"><a data-toggle="tab" onclick="showMe('tab4')">Related news</a></li>
    </ul>
</div>

<div class="my-tab-contents">
    <div class="tab-pane active" id="tab1">
        <p>
            PmiRExAt is a new online web resource that provides the most comprehensive comparative view yet of plant microRNAs (miRNAs) expression in multiple tissues, developmental stages of wheat, rice and maize. Meta-analysis of the publicly available small RNA datasets showed significant expression patterns of several miRNAs. This web resource and service can be used by plant science community to study expression patterns of miRNAs. PmiRExAt can be accessed at http://pmirexat.nabi.res.in .

            This project was implemented using latest open source Web 2.0 technologies to enhance the user experience at the web portal and supports access from different types of devices. It is developed using Java EE 6 standard and uses Bootstrap front end framework to support various screen sizes.

            MySQL database is used at backend. PmiRExAt uses power of Ajax to asynchronously call server and to provide results on the same page without page refreshing. PmiRExAt uses Highcharts API to generate heatmap and Morpheus API for clustering .
        </p>
    </div>
    <div class="tab-pane" id="tab2">
        1/10/2014 : Framework Implementation Completed.
        4/12/2014 : Beta version 1.0 released http://pmirexat.nabi.res.in
        05/01/2015 : Tissue preferential expression search added
        10/01/2015 : MicroRNA expression across species added
        19/01/2015 : Custom search functionality added
        03/02/2015 : Expression count matrix of wheat new miRNA added in miRBase (Release 21) versus 21 wheat datasets.
        21/02/2015: Dataset: novel miRNA reported in recent publications (10), PNRD and miRBase.
        21/02/2015: Feature: Tissue preferential expression search using Shannon Entropy calculations.
        12/04/2015: Version 1.1 released.
        15/04/2015: Feature: User uploaded new dataset profiling.
        04/12/2015: Pre-computed matrix of Arabidopsis are available for data mining and its customized search integration on interface is in process.
        21/12/2015: Feature: "Differential Expression" on the basis of edgeR calculation have been added under "Browse" and "Search" tab.
    </div>
    <div class="tab-pane" id="tab3">
        Anoop Kishor Singh Gurjar1, Abhijeet Singh Panwar2, Rajinder Gupta1 ,Shrikant S. Mantri1
        1.	National Agri Food Biotechnology Institute (NABI), Mohali, INDIA.
        2.	Centre for Development of Advance Computing (C-DAC), Pune, INDIA.
    </div>
    <div class="tab-pane" id="tab4">
        We experienced unexpected power outage today (23rd September, 2015) during 3 AM to 12 PM, due to which PmiRExAt Services were disrupted. Sorry for the inconvenience caused while accessing PmiREXAt database. Now all services have been resumed. Please write to ict@nabi.res.in or shrikant@nabi.res.in if you still face any access issues.
    </div>
</div>




