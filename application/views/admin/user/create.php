<section class="content">
	<div class="container-fluid">
		<div class="block-header">
			<h2>
				<?php echo $headline?>
			</h2>
		</div>
		<div class="row clearfix">
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="card">
					<div class="header">
						<h2>
							INPUT
							<small>Different sizes and widths</small>
						</h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">

						<h2 class="card-inside-title">Basic Input</h2>
						<div class="row clearfix">
							<?php echo validation_errors()?>
							<?php echo form_open($form_action);?>
							<?php foreach ($form_data as $key => $value): ?>
								<div class="col-sm-12">
									<div class="form-group form-float">
										<div class="form-line">
											<?php
												if($value['type']!='submit'){
													$label =  $value['placeholder'];
													unset($value['placeholder']);
													echo "<label class='form-label'>$label</label>";
												}
												echo form_input($value);
											?>
										</div>
									</div>
								</div>
							<?php endforeach; ?>

								<div class="col-sm-12 ">
										<button type="clear" class="btn float-left btn-warning waves-effect">Clear</button>
										<button type="submit" class="btn float-left btn-primary waves-effect">Simpan</button>
								</div>
							<?php echo form_close();?>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
				<div class="card">
					<div class="header">
						<h2>
							INPUT
							<small>Different sizes and widths</small>
						</h2>
						<ul class="header-dropdown m-r--5">
							<li class="dropdown">
								<a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
									<i class="material-icons">more_vert</i>
								</a>
								<ul class="dropdown-menu pull-right">
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Another action</a></li>
									<li><a href="javascript:void(0);" class=" waves-effect waves-block">Something else here</a></li>
								</ul>
							</li>
						</ul>
					</div>
					<div class="body">

						<h2 class="card-inside-title">Basic Input</h2>
						<div class="row clearfix">
							<div class="col-sm-12">
								<div class="form-group form-float">
									<div class="form-line">
										<input type="text" class="form-control">
										<label class="form-label">Username</label>
									</div>
								</div>
							</div>
							<div class="col-sm-12">
								<div class="form-group form-float">
									<div class="form-line">
										<input type="password" class="form-control">
										<label class="form-label">Password</label>
									</div>
								</div>
							</div>
							<div class="col-md-6">
                  <label class="form-label">Select</label>
                  <select class="form-control show-tick">
                      <option>Mustard</option>
                      <option>Ketchup</option>
                      <option>Relish</option>
                  </select>

              </div>
							<div class="col-md-6">
                  <p>
                      <b>Select Search</b>
                  </p>
                  <select class="form-control show-tick" data-live-search="true">
                      <option>Hot Dog, Fries and a Soda</option>
                      <option>Burger, Shake and a Smile</option>
                      <option>Sugar, Spice and all things nice</option>
                  </select>
              </div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

</section>
