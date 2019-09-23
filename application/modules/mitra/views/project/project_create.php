<section class="input-validation">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">Inputs Validation</h4>
					<a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
					<div class="heading-elements">
						<ul class="list-inline mb-0">
							<li><a data-action="collapse"><i class="ft-minus"></i></a></li>
							<li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
							<li><a data-action="expand"><i class="ft-maximize"></i></a></li>
							<li><a data-action="close"><i class="ft-x"></i></a></li>
						</ul>
					</div>
				</div>
				<div class="card-content collapse show validation-wrapper">
					<div class="card-body">
						<p class="validation-code">Add <code>novalidate</code> attribute to form tag.</p>
						<form class="form-horizontal">
							<div class="row">
								<div class="col-lg-6 col-md-12">
									<div class="form-group">
										<h5>Basic Text Input <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" name="text" class="form-control" required data-validation-required-message="This field is required">
										</div>
										<p class="validation-code">Add <code>required</code> attribute to field for required validation.</p>
									</div>
									<div class="form-group">
										<h5>Email Field <span class="required">*</span></h5>
										<div class="controls">
											<input type="email" name="email" class="form-control" required data-validation-required-message="This field is required">
										</div>
									</div>
									<div class="form-group">
										<h5>Repeat Email Field <span class="required">*</span></h5>
										<div class="controls">
											<input type="email" name="email2" data-validation-match-match="email"  class="form-control" required>
											<p class="validation-code">Add <code>data-validation-match-match</code> attribute with the field name as value to match with it.</p>
										</div>
									</div>
									<div class="form-group">
										<h5>Password Input Field <span class="required">*</span></h5>
										<div class="controls">
											<input type="password" name="password" class="form-control" required data-validation-required-message="This field is required">
										</div>
									</div>
									<div class="form-group">
										<h5>Repeat Password Input Field <span class="required">*</span></h5>
										<div class="controls">
											<input type="password" name="password2" data-validation-match-match="password"  class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<h5>Input with Right Icon <span class="required">*</span></h5>
										<div class="controls position-relative has-icon-right">
											<input type="text" class="form-control" placeholder="Addon To Right" data-validation-required-message="This field is required">
											<div class="form-control-position">
												<i class="fa fa-code-fork"></i>
											</div>
										</div>
									</div>
									<div class="form-group">
										<h5>Input addon with Right Icon <span class="required">*</span></h5>
										<div class="controls">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Addon To Right" data-validation-required-message="This field is required">
												<div class="input-group-append">
													<span class="input-group-text" id="basic-addon5"><i class="fa fa-suitcase"></i></span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<h5>Maximum Character Length <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" name="maxChar" class="form-control" required data-validation-required-message="This field is required" maxlength="10">
										</div>
										<p class="validation-code">Add <code>maxlength</code> attribute for maximum number of characters to accept. Also use <code>data-validation-maxlength-message</code> attribute for maxlength failure message</p>
									</div>
									<div class="form-group">
										<h5>Minimum Character Length <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" name="minChar" class="form-control" required data-validation-required-message="This field is required" minlength="6">
											<p class="validation-code">Add <code>minlength</code> attribute for minimum number of characters to accept. Also use <code>data-validation-minlength-message</code> attribute for minlength failure message</p>
										</div>
									</div>
									<div class="form-group">
										<h5>Only Numbers <span class="required">*</span></h5>
										<div class="controls">
											<div class="input-group">
												<div class="input-group-prepend">
													<span class="input-group-text">$</span>
												</div>
												<input type="number" name="onlyNum" class="form-control" required data-validation-required-message="This field is required">
												<div class="input-group-append">
													<span class="input-group-text">.00</span>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<h5>Maximum Number <span class="required">*</span></h5>
										<small><i>Must be lower than 25</i></small>
										<div class="controls">
											<input type="text" name="maxNum" class="form-control" required data-validation-required-message="This field is required">
										</div>
										<p class="validation-code">Add <code>max</code> attribute for maximum  number to accept. Also use <code>data-validation-max-message</code> attribute for max failure message</p>
									</div>
									<div class="form-group">
										<h5>Minimum Number <span class="required">*</span></h5>
										<small><i>Must be higher than 10</i></small>
										<div class="controls">
											<input type="text" name="minNum" class="form-control" required data-validation-required-message="This field is required">
										</div>
										<p class="validation-code">Add <code>min</code> attribute for minimum  number to accept. Also use <code>data-validation-min-message</code> attribute for min failure message</p>
									</div>
								</div>
								<div class="col-lg-6 col-md-12">
									<div class="form-group">
										<h5>File Input Field <span class="required">*</span></h5>
										<div class="controls">
											<input type="file" name="file" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<h5>Custom Required Message <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" name="textRange" class="form-control" required data-validation-required-message="This is custom message" placeholder="Custom Message">
											<p class="validation-code">Add <code>data-validation-required-message</code> attribute for Custom required failure message</p>
										</div>
									</div>
									<div class="form-group">
										<h5>Text Input Range <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" name="text" class="form-control" required data-validation-required-message="This field is required" minlength="10" maxlength="20" placeholder="Enter number between 10 &amp; 20">
										</div>
									</div>
									<div class="form-group">
										<h5>Input with Button <span class="required">*</span></h5>
										<div class="controls">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Button on right" required>
												<div class="input-group-append">
													<button class="btn btn-warning" type="button">
														<i class="fa fa-pencil"></i>
													</button>
												</div>
											</div>
										</div>
									</div>
									<div class="form-group">
										<h5>Touchspin</h5>
										<div class="controls">
											<div class="input-group">
												<input type="text" class="form-control touchspin" required />
											</div>
										</div>
									</div>
									<div class="form-group">
										<h5>No Characters, Only Numbers <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" name="noChar" class="form-control" required data-validation-containsnumber-regex="(\d)+" data-validation-containsnumber-message="No Characters Allowed, Only Numbers">
										</div>
									</div>
									<div class="form-group">
										<h5>Pattern <span class="required">*</span> <small><i>Must start with 'a' and end with 'z'</i></small></h5>
										<div class="controls">
											<input type="text" name="pattern" pattern="a.*z" data-validation-pattern-message="Must start with 'a' and end with 'z'" class="form-control" required>
											<p class="validation-code">Add <code>pattern</code> attribute to set input pattern. Also use <code>data-validation-pattern-message</code> attribute for pattern failure message</p>
										</div>
									</div>
									<div class="form-group">
										<h5>Enter URL <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" class="form-control" placeholder="Add URL" data-validation-regex-regex="((http[s]?|ftp[s]?):\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*" data-validation-regex-message="Only Valid URL's">
											<p class="validation-code">Add <code>data-validation-regex-regex</code> attribute for regular expression. Also use <code>data-validation-regex-message</code> attribute for regex failure message</p>
										</div>
									</div>
									<div class="form-group">
										<h5>Enter Email Address <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" class="form-control" placeholder="Email Address" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Email">
										</div>
									</div>
									<div class="form-group">
										<h5>Enter Date <span class="required">*</span></h5>
										<div class="controls">
											<input type="text" class="form-control" placeholder="MM/DD/YYYY" data-validation-regex-regex="([a-z0-9_\.-]+)@([\da-z\.-]+)\.([a-z\.]{2,6})" data-validation-regex-message="Enter Valid Date">
										</div>
									</div>
									<div class="form-group">
										<h5>Basic Select <span class="required">*</span></h5>
										<div class="controls">
											<select name="select" id="select" required class="form-control">
												<option value="">Select Your City</option>
												<option value="1">Amsterdam</option>
												<option value="2">Antwerp</option>
												<option value="3">Athens</option>
												<option value="4">Barcelona</option>
												<option value="5">Berlin</option>
												<option value="6">Birmingham</option>
												<option value="7">Bradford</option>
												<option value="8">Bremen</option>
												<option value="9">Brussels</option>
												<option value="10">Bucharest</option>
												<option value="11">Budapest</option>
												<option value="12">Cologne</option>
												<option value="13">Copenhagen</option>
												<option value="14">Dortmund</option>
												<option value="15">Dresden</option>
												<option value="16">Dublin</option>
											</select>
										</div>
									</div>
									<div class="form-group">
										<h5>Basic Textarea <span class="required">*</span></h5>
										<div class="controls">
											<textarea name="textarea" id="textarea" class="form-control" required placeholder="Basic Textarea"></textarea>
										</div>
									</div>
									<div class="text-right">
										<button type="submit" class="btn btn-success">Submit <i class="fa fa-thumbs-o-up position-right"></i></button>
										<button type="reset" class="btn btn-danger">Reset <i class="fa fa-refresh position-right"></i></button>
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>