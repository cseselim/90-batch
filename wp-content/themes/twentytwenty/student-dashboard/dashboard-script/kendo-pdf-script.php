<script>
    kendo.pdf.defineFont({
        "Roboto"             : "<?php bloginfo('template_directory'); ?>/inc/assets/roboto/Roboto-Thin.ttf",
        "Roboto"             : "<?php bloginfo('template_directory'); ?>/inc/assets/roboto/Roboto-Regular.ttf",
        /*"Roboto"             : "<?php bloginfo('template_directory'); ?>/inc/assets/roboto/Roboto-Medium.ttf",*/
    });

    function ExportPdf(admit_id){ 
    kendo.drawing
        .drawDOM("#"+admit_id+"", 
        { 
            forcePageBreak: ".page-break", 
            paperSize: "A4",
            margin: { top: "1.4cm", left: "1cm", right: "1cm", bottom: "2cm" },
            scale: 0.8,
            height: 500, 
            template: $("#page-template").html(),
            keepTogether: ".prevent-split"
        })
            .then(function(group){
            kendo.drawing.pdf.saveAs(group, "admit-card.pdf");
            $('.ad_down').hide();
        });
    }
$(document).ready(function() {
    jQuery(document).on('click','#download', function(){
        $('.ad_down').show();
        var admit_id = $(this).attr('value');
        ExportPdf(admit_id);
    });
});

function ExportPdf_two(admit_id){ 
    kendo.drawing
        .drawDOM("#"+admit_id+"", 
        { 
            forcePageBreak: ".page-break", 
            paperSize: "A4",
            margin: { top: "1.4cm", left: "1cm", right: "1cm", bottom: "2cm" },
            scale: 0.8,
            height: 500, 
            template: $("#page-template").html(),
            keepTogether: ".prevent-split"
        })
            .then(function(group){
            kendo.drawing.pdf.saveAs(group, "admit-card.pdf");
            $('.ad_down').hide();
        });
    }
$(document).ready(function() {
    jQuery(document).on('click','#form_download', function(){
        $('.ad_down').show();
        var admit_id = $(this).attr('value');
        ExportPdf_two(admit_id);
    });
});

function ExportPdf_three(admit_id){ 
    kendo.drawing
        .drawDOM("#"+admit_id+"", 
        { 
            forcePageBreak: ".page-break", 
            paperSize: "A4",
            margin: { top: "1.4cm", left: "1cm", right: "1cm", bottom: "2cm" },
            scale: 0.8,
            height: 500, 
            template: $("#page-template").html(),
            keepTogether: ".prevent-split"
        })
            .then(function(group){
            kendo.drawing.pdf.saveAs(group, "admit-card.pdf");
            $('.ad_down').hide();
        });
    }
$(document).ready(function() {
    jQuery(document).on('click','#download-all-admit', function(){
        $('.ad_down').show();
        var admit_id = "5065";
        ExportPdf_three(admit_id);
    });
});
</script>