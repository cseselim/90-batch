jQuery(document).ready(function() {
    
    var dataTable = applicant_list('no');
    
    function applicant_list(search_action, start_date='', end_date=''){
        var dataTable = jQuery('#example').DataTable({

        ajax:{
         type:'POST',
         url : ajaxurl,
         data : {action: "all_applicant_students",search_action: search_action, start_date: start_date, end_date: end_date},
        },
        columns: [
            { data: 'srl' },
            { data: 'student_name' },
            { data: 'index_no' },
            /*{ data: 'father_name' },*/
            // { data: 'category' },
            /*{ data: 'mother_name' },
            { data: 'contact_no' },
            { data: 'class' },
            { data: 'shift' },*/
            { data: 'action' }
        ],
    	 select: true,
    	 dom: 'Blfrtip',
    	 lengthMenu: [ [10, 25, 50, 100],
    	 ['10 User', '25 User', '50 User', '100 User'] ],
    	language: {
            "url": "datatables/italian.lang",
            "sLengthMenu": "Resigter user list _MENU_ ",
            search: "_INPUT_",
            searchPlaceholder: "Search applicant",
            "info": "Showing _PAGE_ to _PAGE_ of _PAGES_ user",
        },
        buttons: {
            buttons: [
                { 
                    extend: 'csv',
                    text: 'CSV',
                    title : 'Resigter User List',
                    exportOptions : {
                        modifier : {
                            // DataTables core
                            order : 'index', // 'current', 'applied',
                            //'index', 'original'
                            page : 'all', // 'all', 'current'
                            search : 'none' // 'none', 'applied', 'removed'
                        },
                        columns: [ 0,1,2,3,4,5,6,7,8]
                    }
                },
                { 
                    extend: 'excel',
                    text: 'Excel',
                    title : 'Resigter User List',
                    exportOptions : {
                        modifier : {
                            // DataTables core
                            order : 'index', // 'current', 'applied',
                            //'index', 'original'
                            page : 'all', // 'all', 'current'
                            search : 'none' // 'none', 'applied', 'removed'
                        },
                        columns: [ 0,1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    title : 'Resigter User List',
                    exportOptions : {
                        modifier : {
                            // DataTables core
                            order : 'index', // 'current', 'applied',
                            //'index', 'original'
                            page : 'all', // 'all', 'current'
                            search : 'none' // 'none', 'applied', 'removed'
                        },
                        columns: [ 0,1,2,3,5,6,7,8]
                    },
                    customize: function(doc) {
                         doc.styles.title = {
                           fontSize: '22',
                           alignment: 'center',
                         }
                        /*doc.styles.tableHeader = {
                            backgroundColor:'black',
                            fontSize:10,
                            margin: [0,15,0,0],
                         }*/
                         /*
                         doc.styles.tableBodyEven = {
                           alignment: 'left',
                           margin: [0,10,0,0],
                           text: 'Borders:1',
                         }
                         doc.styles.tableBodyOdd = {
                           alignment: 'left',
                           margin: [0,10,0,0],
                         }
                        doc.styles['td:nth-child(2)'] = { 
                           width: '100px',
                           'max-width': '100px'
                         }*/
                       }  
                },
            ]
        }
         
        });
    }
    
    jQuery('#search_by_date').click(function(){
      var start_date = jQuery('#start_date').val();
      var end_date = jQuery('#end_date').val();
      if(start_date != '' && end_date !='')
      {
       jQuery('#example').DataTable().destroy();
        applicant_list('yes', start_date, end_date);
      }
      else
      {
       alert("Both Date is Required");
      }
    });

    jQuery('#class').on('change',function(){
        var searchVal = jQuery(this).val()
        jQuery('#example').DataTable().columns( 7 ).search( searchVal ).draw();
    })
    /*jQuery('#version').on('change',function(){
        var searchVal = jQuery(this).val()
        jQuery('#example').DataTable().columns( 7 ).search( searchVal ).draw();
    })*/

    jQuery(document).on('click', '.approves', function(){
        var student_id = jQuery(this).attr('id');
        var confirms = confirm("Are you want to approve this student?");
       if (confirms) {
        jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {action: "students_approve",student_id: student_id},
        success: function(response) {
            jQuery('#example').DataTable().destroy();
            applicant_list('no');
        }
      }) 
    }
    });

    approve_students('no');
    function approve_students(search_action, start_date='', end_date=''){
        var approve_students_table = jQuery('#approve_students').DataTable({

            ajax:{
             type:'POST',
             url : ajaxurl,
             data : {action: "all_approve_students",search_action: search_action, start_date: start_date, end_date: end_date},
            },
            columns: [
                { data: 'srl' },
                { data: 'student_name' },
                { data: 'index_no' },
                /*{ data: 'father_name' },*/
                // { data: 'category' },
                /*{ data: 'mother_name' },
                { data: 'contact_no' },
                { data: 'class' },
                { data: 'shift' },*/
                { data: 'action' }
            ],
             select: true,
             dom: 'Blfrtip',
             lengthMenu: [ [10, 25, 50, 100],
             ['10 User', '25 User', '50 User', '100 User'] ],
            language: {
                "url": "datatables/italian.lang",
                "sLengthMenu": "User list _MENU_ ",
                search: "_INPUT_",
                searchPlaceholder: "Search User",
                "info": "Showing _PAGE_ to _PAGE_ of _PAGES_ User",
            },
            buttons: {
                buttons: [
                    { 
                        extend: 'csv',
                        text: 'csv',
                        title : 'Resigter User List',
                        exportOptions : {
                            modifier : {
                                // DataTables core
                                order : 'index', // 'current', 'applied',
                                //'index', 'original'
                                page : 'all', // 'all', 'current'
                                search : 'none' // 'none', 'applied', 'removed'
                            },
                            columns: [ 0,1,2,3,4,5,6,7,8]
                        }
                    },
                    { 
                        extend: 'excel',
                        text: 'Excel',
                        title : 'Resigter User List',
                        exportOptions : {
                            modifier : {
                                // DataTables core
                                order : 'index', // 'current', 'applied',
                                //'index', 'original'
                                page : 'all', // 'all', 'current'
                                search : 'none' // 'none', 'applied', 'removed'
                            },
                            columns: [ 0,1,2,3,4,5,6,7,8]
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title : 'Resigter User List',
                        exportOptions : {
                            modifier : {
                                // DataTables core
                                order : 'index', // 'current', 'applied',
                                //'index', 'original'
                                page : 'all', // 'all', 'current'
                                search : 'none' // 'none', 'applied', 'removed'
                            },
                            columns: [ 0,1,2,3,5,6,7,8]
                        },
                        customize: function(doc) {
                             doc.styles.title = {
                               fontSize: '22',
                               alignment: 'center',
                             }
                             doc.styles.tableHeader = {
                                bold:true,
                                fontSize:11,
                                color:'black',
                                alignment:'left',
                                margin: [0,15,0,0],
                             }
                             doc.styles.tableBodyEven = {
                               alignment: 'left',
                               margin: [0,10,0,0],
                              text: 'Borders:1',
                             }
                             doc.styles.tableBodyOdd = {
                               alignment: 'left',
                               margin: [0,10,0,0],
                             }
                            doc.styles['td:nth-child(2)'] = { 
                               width: '100px',
                               'max-width': '100px'
                             }
                           }  
                    },
                ]
            }
             
        });
    }
    
    jQuery('#approve_stu_search_by_date').click(function(){
      var start_date = jQuery('#start_date').val();
      var end_date = jQuery('#end_date').val();
      if(start_date != '' && end_date !='')
      {
       jQuery('#approve_students').DataTable().destroy();
        approve_students('yes', start_date, end_date);
      }
      else
      {
       alert("Both Date is Required");
      }
    });

    jQuery('.class').on('change',function(){
        var searchVal = jQuery(this).val()
        jQuery('#approve_students').DataTable().columns( 6 ).search( searchVal ).draw();
    })
    jQuery('.version').on('change',function(){
        var searchVal = jQuery(this).val()
        jQuery('#approve_students').DataTable().columns( 7 ).search( searchVal ).draw();
    })

     jQuery(document).on('click', '.unapproves', function(){
        var student_id = jQuery(this).attr('id');
        var confirms = confirm("Are you want to unapprove this student?"); 
       if (confirms) {
        jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {action: "unapprove_students",student_id: student_id},
        success: function(response) {
            jQuery('#approve_students').DataTable().destroy();
            approve_students('no');
        }
      }) 
    }
    });
    
    jQuery('#start_date1,#end_date1').click(function(){
        jQuery('.datepicker').addClass("start_date1")
    });
    jQuery('#start_date1').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom",
    });
    jQuery('#end_date1').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom",
    });
    
    jQuery('#start_date,#end_date').click(function(){
        jQuery('.datepicker').addClass("start_date")
    });
    jQuery('#start_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom",
    });
    jQuery('#end_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true,
        orientation: "bottom",
    });


    var dataTable = admit_list();
    
    function admit_list(search_action, start_date='', end_date=''){
        var all_applicant_tbl = jQuery('#all-applicant-list').DataTable({

        ajax:{
         type:'POST',
         url : ajaxurl,
         data : {action: "all_memories"},
        },
        columns: [
            { data: 'srl' },
            { data: 'name' },
            { data: 'student_name' },
            { data: 'm_text' },
            { data: 'action' }
        ],
       select: true,
       dom: 'Blfrtip',
       lengthMenu: [ [10, 25, 50, 100],
       ['10 Memories', '25 Memories', '50 Memories', '100 Memories'] ],
      language: {
            "url": "datatables/italian.lang",
            "sLengthMenu": "Memories list _MENU_ ",
            search: "_INPUT_",
            searchPlaceholder: "Search Memories",
            "info": "Showing _PAGE_ to _PAGE_ of _PAGES_ memories",
        },
        buttons: {
            buttons: [
                { 
                    extend: 'csv',
                    text: 'CSV',
                    title : 'Memories List',
                    exportOptions : {
                        modifier : {
                            // DataTables core
                            order : 'index', // 'current', 'applied',
                            //'index', 'original'
                            page : 'all', // 'all', 'current'
                            search : 'none' // 'none', 'applied', 'removed'
                        },
                        columns: [ 0,1,2,3,4,5,6,7,8]
                    }
                },
                { 
                    extend: 'excel',
                    text: 'Excel',
                    title : 'Memories List',
                    exportOptions : {
                        modifier : {
                            // DataTables core
                            order : 'index', // 'current', 'applied',
                            //'index', 'original'
                            page : 'all', // 'all', 'current'
                            search : 'none' // 'none', 'applied', 'removed'
                        },
                        columns: [ 0,1,2,3,4,5,6,7,8]
                    }
                },
                {
                    extend: 'pdf',
                    text: 'PDF',
                    title : 'Memories List',
                    exportOptions : {
                        modifier : {
                            // DataTables core
                            order : 'index', // 'current', 'applied',
                            //'index', 'original'
                            page : 'all', // 'all', 'current'
                            search : 'none' // 'none', 'applied', 'removed'
                        },
                        columns: [ 0,1,2,3,5,6,7,8]
                    },
                    customize: function(doc) {
                         doc.styles.title = {
                           fontSize: '22',
                           alignment: 'center',
                         }
                        /*doc.styles.tableHeader = {
                            backgroundColor:'black',
                            fontSize:10,
                            margin: [0,15,0,0],
                         }*/
                         /*
                         doc.styles.tableBodyEven = {
                           alignment: 'left',
                           margin: [0,10,0,0],
                           text: 'Borders:1',
                         }
                         doc.styles.tableBodyOdd = {
                           alignment: 'left',
                           margin: [0,10,0,0],
                         }
                        doc.styles['td:nth-child(2)'] = { 
                           width: '100px',
                           'max-width': '100px'
                         }*/
                       }  
                },
            ]
        }
         
        });
    }

    jQuery('#student_list_search').click(function(){
      var start_date = jQuery('#start_date').val();
      var end_date = jQuery('#end_date').val();
      if(start_date != '' && end_date !='')
      {
       jQuery('#all-applicant-list').DataTable().destroy();
        admit_list('yes', start_date, end_date);
      }
      else
      {
       alert("Both Date is Required");
      }
    });

    jQuery('.student_class').on('change',function(){
        var searchVal = jQuery(this).val()
        jQuery('#all-applicant-list').DataTable().columns( 7 ).search( searchVal ).draw();
    })



    jQuery(document).on('click', '.m_approves', function(){
        var student_id = jQuery(this).attr('id');
        var confirms = confirm("Are you want to approve this memories?");
       if (confirms) {
        jQuery.ajax({
        type: 'POST',
        url : ajaxurl,
        data : {action: "memories_approve",student_id: student_id},
        success: function(response) {
            jQuery('#all-applicant-list').DataTable().destroy();
            admit_list();
        }
      }) 
    }
    });


});