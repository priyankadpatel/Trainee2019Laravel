
@extends('layouts.app')

@section('content')


<div class="container-contact100">
		<div class="wrap-contact100">




                                <form method="post" action="{{url('contact-us')}}" class="contact100-form validate-form">
                                                {{ csrf_field() }}
                        
				<span class="contact100-form-title">
                                                Contact Us 
				</span>

                                @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                 <button type="button" class="close" data-dismiss="alert">×</button>
                                 <ul>
                                  @foreach ($errors->all() as $error)
                                   <li>{{ $error }}</li>
                                  @endforeach
                                 </ul>
                                </div>
                               @endif
                               @if ($message = Session::get('success'))
                               <div class="alert alert-success alert-block">
                                <button type="button" class="close" data-dismiss="alert">×</button>
                                       <strong>{{ $message }}</strong>
                               </div>
                               @endif
				<label class="label-input100" for="first-name">Tell us your name *</label>
				<div class="wrap-input100  validate-input" data-validate="Type first name">
					<input id="first-name" class="input100" type="text" name="name" placeholder="First name">
					<span class="focus-input100"></span>
				</div>
				

				<label class="label-input100" for="email">Enter your email *</label>
				<div class="wrap-input100 validate-input" data-validate = "Valid email is required: ex@abc.xyz">
					<input id="email" class="input100" type="text" name="email" placeholder="Eg. example@email.com">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="subject">Enter subject</label>
				<div class="wrap-input100">
					<input id="first-name" class="input100" type="text" name="subject" placeholder="Eg. Laravel.....">
					<span class="focus-input100"></span>
				</div>

				<label class="label-input100" for="message">Message *</label>
				<div class="wrap-input100 validate-input" data-validate = "Message is required">
					<textarea id="message" class="input100" name="message" placeholder="Write us a message"></textarea>
					<span class="focus-input100"></span>
				</div>

				<div class="container-contact100-form-btn">
					<button class="contact100-form-btn">
						Send Message
					</button>
				</div>
			</form>

			<div class="contact100-more flex-col-c-m" style="background-image: url('images/bg-01.jpg');">
				<div class="flex-w size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-map-marker"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Address
						</span>

						<span class="txt2">
                                                                6803 Dickens Islands Apt. 567, PortMliew, TX 149420145
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-phone-handset"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							Lets Talk
						</span>

						<span class="txt3">
                                                                (0131) 804 1808 , (0161) 181 3777
                                                                (0117) 696 3454
						</span>
					</div>
				</div>

				<div class="dis-flex size1 p-b-47">
					<div class="txt1 p-r-25">
						<span class="lnr lnr-envelope"></span>
					</div>

					<div class="flex-col size2">
						<span class="txt1 p-b-20">
							General Support
						</span>

						<span class="txt3">
                                                                huel.simone@hotmail.com
                                                                dbergnaum@gmail.com
						</span>
					</div>
				</div>
			</div>
		</div>


	
	</div>

	<div class="mapouter"><div class="gmap_canvas"><iframe width="100%" height="400" id="gmap_canvas" src="https://maps.google.com/maps?q=byteparity&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://www.embedgooglemap.org"></a></div><style>.mapouter{position:relative;text-align:right;height:462px;width:1022px;}.gmap_canvas {overflow:hidden;background:none!important;height:462px;width:1022px;}</style></div>
	
	<div id="dropDownSelect1"></div>


	

@endsection


