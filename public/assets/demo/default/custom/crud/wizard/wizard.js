var WizardDemo=function() {
    $("#m_wizard");
    var e,
    r,
    i=$("#m_form");
    return {
        init:function() {
            var n;
            $("#m_wizard"),
            i=$("#m_form"),
            (r=new mWizard("m_wizard", {
                startStep: 1
            }
            )).on("beforeNext", function(r) {
                !0!==e.form()&&r.stop()
            }
            ),
            r.on("change", function(e) {
                mUtil.scrollTop()
            }
            ),
            e=i.validate( {
                ignore:":hidden", rules: {
                    title: {
                        required: !0
                    }
                    , description: {
                        required: !0
                    }
                    , time: {
                        required: !0
                    }
                    , "account_communication[]": {
                        required: !0
                    }
                    , billing_card_name: {
                        required: !0
                    }
                    , billing_card_number: {
                        required: !0, creditcard: !0
                    }
                    , billing_card_exp_month: {
                        required: !0
                    }
                    , billing_card_exp_year: {
                        required: !0
                    }
                    , billing_card_cvv: {
                        required: !0, minlength: 2, maxlength: 3
                    }
                }
                , messages: {
                    "tags[]": {
                        required: "You must select at least one communication option"
                    }
                    , "category[]": {
                        required: "You must select at least one communication option"
                    }
                    , accept: {
                        required: "You must accept the Terms and Conditions agreement!"
                    }
                }
                , invalidHandler:function(e, r) {
                    mUtil.scrollTop(), swal( {
                        title: "", text: "There are some errors in your submission. Please correct them.", type: "error", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                    }
                    )
                }
                , submitHandler:function(e) {}
            }
            ),
            (n=$('.promotion_submit')).on("click", function(r) {
                r.preventDefault(), 
                // e.form()&&(mApp.progress(n), 
                $.ajax( {
                    type: "POST",
                    headers: 
                    {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: '/post-promotion',
                    data: $("#m_form").serialize(),
                    success: function (response) {
                        // console.log(response);
                        document.getElementById("m_form").reset();
                        // mApp.unprogress(n), swal( {
                        //             title: "", text: "The application has been successfully submitted!", type: "success", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                        // })
                    },
                    error: function (response){
                        response.responseJSON.messages.forEach(function (msg) {
                            console.log(msg);
                            // mApp.unprogress(n), swal( {
                            //     title: "", text: "The application is not successfully submitted!", type: "danger", confirmButtonClass: "btn btn-secondary m-btn m-btn--wide"
                            // })
                        });
                    }
                })
            })
        }
    }
}

();
jQuery(document).ready(function() {
    WizardDemo.init()
}

);