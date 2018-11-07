<?php
/* Please do NOT include the opening php tag, except of course if you're starting with a blank file

To hide or Show an Entire Question (Conditional Logic) follow these steps:

1.  Build Questions In EE4 Registration Forms.
2.  Add to Question Group.
3.  For event in question open the form (Go thru registration so you see the form live)
4.  Identify the Logic question - (The Question that will Determine if the next question will show)
5.  In Google Chrome Browser Right Click right on the Question and hit INSPECT
6.  Look for the CSS CLASS of the Select Box, Check Box, etc. It will be in the form: ee_reg_qstn-XX-YY  where XX is the Group, and YY is the Question ID (USE THE CSS Class "." NOT ID "#"
7.  In this example the *Dropdown* question div class is .ee_reg_qstn-14
8.  The next step is to identify the DIV CLASS (The entire Div you want to hide) in the form.  
9.  In Google Chrome Browser Right Click on the Question to hide and hit INSPECT
10.  In this example the DIV CLASS is .ee-reg-qstn.ee-reg-qstn-13-input-dv.ee-select-input-dv    (USE THE CSS CLASS "." not ID "#"
11.  The value to evaluate is the #ee_reg_qstn-XX-YY value in this example it was "Yes"
 
*/

function ee_custom_show_question_conditionally() {
    wp_add_inline_script('ee_form_section_validation','jQuery( document ).ready(function($) {
            var text = $(".ee-reg-qstn.ee-reg-qstn-13-input-dv.ee-select-input-dv");
            $(text).hide();
            $(".ee-reg-qstn-14").change(function() {
			//Uncomment Below to Test value of Question so you can put in the IF statement "Yes" in this example
           // var test=$(this).val();
			//Uncomment Below to Show the Value to the browser
            //alert(test);
                $(this).val() == "Yes" ?  $(text).show() : $(text).hide();
            });
        });'
    );
}
add_action('wp_enqueue_scripts','ee_custom_show_question_conditionally', 11);
