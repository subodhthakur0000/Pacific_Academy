<!-- footer -->
		<div class="container-fluid footer">
			<div class="row">
				<div class="col-md-6">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-6 home-footer-mission">
								<h4>Our Mission and Vision</h4>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
									consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
									cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
									proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
								</p>
							</div>

							<div class="col-md-6 home-footer-mission">
								<h4>Contacts</h4>
								<p><a href="tel:01-4781352"><i class="fas fa-phone"></i>01-4781352</a></p>

								<p><a href=""><i class="fas fa-home"></i>Shankhamul marg,Kathmandu 44600</a></p>

								<p><a href="mail-to:pacific.ac1993@gmail.com"><i class="fas fa-envelope"></i>pacific.ac1993@gmail.com</a></p>

							</div>
						</div>

					</div>
				</div>

				<div class="col-md-6 pad-0">
				<div class="footer-map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.0997739042564!2d85.33122631465557!3d27.68331098280186!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19bfee42f241%3A0x1dec82c6abfb77d8!2sPACIFIC+ACADEMY!5e0!3m2!1sen!2snp!4v1526901810661" width="100%" height="350" frameborder="0" style="border:0" allowfullscreen></iframe>
				</div>
				</div>
			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-md-6 footer-copyright">
					<p>copyright, &copy; 2018, pacific academy</p>
				</div>
				<div class="col-md-6 footer-designed">
					<p>Designed and Developed by: <a href="">Creatu Developers</a></p>
				</div>
			</div>
		</div>


		</body>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

	<script type="text/javascript" src="js/bootstrap.min.js"></script>

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/8.11.8/sweetalert2.min.js"></script>
  <script>
    @if(Session::has('success'))
        Swal.fire({
            position: 'top-end',
            type: 'success',
            title: '{{ Session::get('success') }}',
            showConfirmButton: false,
            timer: 1500
          })
    @endif
  </script>

	</html>