<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<!-- memories Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel" style="margin: 0px;">Add Memories</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="applicant_form" enctype="multipart/form-data" autocomplete="off">
          <div id="wpmp-reg-loader-info" class="wpmp-loader" style="text-align: center;margin-bottom: 17px; display: none;">
                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/ajax-loader.gif"/>
                    <span>Please wait ...</span>
                </div>
                <div id="wpmp-register-alert" class="alert alert-danger" role="alert" style="display:none;"></div>
                <div id="wpmp-mail-alert" class="alert alert-danger" role="alert" style="display:none;">
          </div>

          <div class="form-group row">
            <div class="col-md-12">
              <label for="inputSName" class="col-form-label" style="font-size: 15px;">name<span>*</span></label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Name">
            </div>
          </div><!--field-->

          <div class="form-group row">
            <div class="col-md-12">
              <label for="inputSName" class="col-form-label" style="font-size: 15px;">Memories<span>*</span></label>
              <textarea name="text" id="text" rows="2" style="height:66px"></textarea>
            </div>
          </div><!--field-->

          <div class="form-group row">
            <div class="col-md-12">
              <label for="inputSName" class="col-form-label" style="font-size: 15px;">School Name<span>*</span></label>
              <input type="text" class="form-control" id="school_name" name="school_name" placeholder="Name">
            </div>
          </div><!--field-->

          <div class="form-group row">
            <div class="col-md-12">
              <label for="inputSName" class="col-form-label" style="font-size: 15px;">Image<span>*</span></label>
              <input type="file" class="form-control" id="image" name="image">
            </div>
          </div><!--field-->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" value="Add Memories">Add Memories</button>
          </div>
      </form>
      </div>
    </div>
  </div>
</div>


			<footer id="site-footer" role="contentinfo" class="header-footer-group" style="background-color: #1D1F27;border-top: 1px solid #ddd;padding: 24px 0px;">

				<div class="section-inner">

					<div class="footer-credits">

						<p class="footer-copyright">&copy;
							<?php
							echo date_i18n(
								/* translators: Copyright date format, see https://www.php.net/manual/datetime.format.php */
								_x( 'Y', 'copyright date format', 'twentytwenty' )
							);
							?>
							<a style="color:#fff"; href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
						</p><!-- .footer-copyright -->

						<p class="powered-by-wordpress">
							<a style="color:#fff" href="<?php echo esc_url( __( 'https://classtune.com/', 'twentytwenty' ) ); ?>">
								<?php _e( 'Powered by CLASSTUNE', 'twentytwenty' ); ?>
							</a>
						</p><!-- .powered-by-wordpress -->

					</div><!-- .footer-credits -->

					<a class="to-the-top" href="#site-content">
						<span class="to-the-top-long" style="color: #fff;">
							<?php
							/* translators: %s: HTML character for up arrow. */
							printf( __( 'To the top %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-long -->
						<span class="to-the-top-short">
							<?php
							/* translators: %s: HTML character for up arrow. */
							printf( __( 'Up %s', 'twentytwenty' ), '<span class="arrow" aria-hidden="true">&uarr;</span>' );
							?>
						</span><!-- .to-the-top-short -->
					</a><!-- .to-the-top -->

				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/inc/assets/js/jquery-3.2.1.min.js"></script>

	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/inc/assets/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/inc/assets/js/formValidation.min.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/inc/assets/js/formfieldvalidation.js"></script>
	<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/inc/assets/js/bootstrap.formvalidation.min.js"></script>

		<script type="text/javascript">
			jQuery(document).ready(function () {
			    window.onscroll = function () {
			        scrollFunction()
			    };

			    function scrollFunction() {
			        if (document.body.scrollTop > 8 || document.documentElement.scrollTop > 8) {
			            jQuery('.header-titles img').css('width', '35%');
			            jQuery('#site-header').removeClass('bg-light');
			            jQuery('#site-header').addClass('header_scroll');
			        } else {
			            jQuery('.header-titles img').css('width', '');
			            jQuery('#site-header').removeClass('header_scroll');
			        }
			    }
			})
			</script>

		<script type="text/javascript">
jQuery(document).ready(function() {
		        

jQuery('#memories_form').formValidation({

      feedbackIcons: {
        valid: 'glyphicon glyphicon-ok',
        invalid: 'glyphicon glyphicon-remove',
        validating: 'glyphicon glyphicon-refresh'
      },
      fields: {
        name: {
          validators: {
            notEmpty: {
              message: "Name is required"
            },
          }
        },
        text: {
          validators: {
            notEmpty: {
              message: "Memories is required"
            },
          }
        },
        school_name: {
          validators: {
            notEmpty: {
              message: "School name is required"
            },
          }
        },
        image: {
          validators: {
            notEmpty: {
              message: "Image is required"
            },
            file: {
                extension: 'jpeg,jpg,png',
                type: 'image/jpeg,image/png',
                maxSize: 600000,   // 3MB
                message: 'File size must be less than 500kb and file type will be jpg / jpeg /png'
            }
          }
        },
      }
    })
    .on('success.form.bv', function(e) {
    	e.preventDefault();
    	alert('ok');
      // $('#wpmp-register-alert').hide();
      //   $('#wpmp-mail-alert').hide();
      //   // You can get the form instance
      //   var $memories_form = $(e.target);
      //   // and the FormValidation instance
      //   var fv = $memories_form.data('formValidation');
      //   var formData = new FormData();
      //   // get all input and select item in a form
      //   $('#memories_form input[type=text],#memories_form textarea,#memories_form date,#memories_form input[type=file]').each(function(i,item){
      //       if(item.type == 'file'){
      //           formData.append(item.name,item.files[0]);
      //       }else {
      //           formData.append(item.name,item.value);
      //       }
      //   })
      //   formData.append('action','add_memories');
      //   $('#wpmp-reg-loader-info').show();
      //   $.ajax({
      //       type:'POST',
      //       url: "<?php echo admin_url('admin-ajax.php'); ?>",
      //       data: formData,
      //       contentType: false,
      //       processData: false,
      //       success: function(data) {
      //       console.log(data);
      //       $('#wpmp-reg-loader-info').hide();
      //       // check login status
      //       // if (true == data.reg_status) {
      //       //     $('#wpmp-register-alert').removeClass('alert-danger');
      //       //     $('#wpmp-register-alert').addClass('alert-success');
      //       //     $('#wpmp-register-alert').show();
      //       //     $('#wpmp-register-alert').html(data.success);
      //       //     $('#applicant_form')[0].reset();
      //       //     window.location.href = '<?= home_url() ?>/applicant-profile';

      //       // } else {
      //       //     $('#wpmp-register-alert').addClass('alert-danger');
      //       //     $('#wpmp-register-alert').show();
      //       //     $('#wpmp-register-alert').html(data.error);

      //       // }
      //   },
      //   error: function(errors) {
      //       console.log(errors);
      //   }
      //   })
      //   // Prevent form submission
    });


		    })
		</script>


<script type="text/javascript">
(function($) {
    'use strict';
    
 $(document).ready(function() {
    const af = $('#applicant_form').formValidation({
        message: 'This value is not valid',
        /*icon: {
            required: 'glyphicon glyphicon-asterisk',
            valid: 'glyphicon glyphicon-ok',
            invalid: 'glyphicon glyphicon-remove',
            validating: 'glyphicon glyphicon-refresh'
        },*/
        fields: {
            name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            text: {
                validators: {
                    notEmpty: {
                        message: 'Memories is required'
                    }
                }
            },
            school_name: {
                validators: {
                    notEmpty: {
                        message: 'Name is required'
                    }
                }
            },
            image: {
                validators: {
                    notEmpty: {
                        message: 'Profile image is required'
                    },
                    file: {
                        extension: 'jpeg,jpg,png',
                        type: 'image/jpeg,image/png',
                        maxSize: 600000,   // 3MB
                        message: 'File size must be less than 500kb and file type will be jpg / jpeg /png'
                    }
                }
            },

        }
    }).on('success.form.fv', function(e) {
        $('#wpmp-register-alert').hide();
        $('#wpmp-mail-alert').hide();
        // You can get the form instance
        var $applicant_form = $(e.target);
        // and the FormValidation instance
        var fv = $applicant_form.data('formValidation');
        var formData = new FormData();
        // get all input and select item in a form
        $('#applicant_form input[type=text],#applicant_form textarea,#applicant_form input[type=file]').each(function(i,item){
            if(item.type == 'file'){
                formData.append(item.name,item.files[0]);
            }else {
                formData.append(item.name,item.value);
            }
        })
        formData.append('action','add_memories');
        $('#wpmp-reg-loader-info').show();
        $.ajax({
            type:'POST',
            url: "<?php echo admin_url('admin-ajax.php'); ?>",
            data: formData,
            contentType: false,
            processData: false,
            success: function(data) {
            console.log(data);
            $('#wpmp-reg-loader-info').hide();
            // check login status
            if (true == data.reg_status) {
                $('#wpmp-register-alert').removeClass('alert-danger');
                $('#wpmp-register-alert').addClass('alert-success');
                $('#wpmp-register-alert').show();
                $('#wpmp-register-alert').html(data.success);
                $('#applicant_form')[0].reset();

            } else {
                $('#wpmp-register-alert').addClass('alert-danger');
                $('#wpmp-register-alert').show();
                $('#wpmp-register-alert').html(data.error);

            }
        },
        error: function(errors) {
            console.log(errors);
        }
        })
        // Prevent form submission
        e.preventDefault();
    })

 });

})(jQuery);

</script>


		<?php wp_footer(); ?>
	</body>
</html>
