<x-mainlayout title="Blog Page">
	<div class="hero">
		<div class="container">
			<div class="row justify-content-between">
				<div class="col-lg-5">
					<div class="intro-excerpt">
						<h1>Blog</h1>
						<p class="mb-4">Donec vitae odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
							vulputate velit imperdiet dolor tempor tristique.</p>
						<p><a href="" class="btn btn-secondary me-2">Shop Now</a><a href="#"
								class="btn btn-white-outline">Explore</a></p>
					</div>
				</div>
				<div class="col-lg-7">
					<div class="hero-img-wrap">
						<img src="{{ asset('images/couch.png') }}" class="img-fluid">
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Hero Section -->



	<!-- Start Blog Section -->
	<div class="blog-section">
		<div class="container d-flex justify-content-center ">
      <div class="card" style="width: 30vw;">
      <img src="{{ $blog->thumbnail }}" class="card-img-top" alt="...">
  <div class="card-body">
    <h1>{{ $blog->title }}</h1>
    <div>
      {!! $blog->content !!}
    </div>
    <p class="card-text">
      Description:  {{ $blog->description }}</p>
      <div> <span class="danger">Created By: </span> {{ $blog->created_by }} </div>
      <div class="d-flex justify-content-between align-items-center"> {{ date('d M Y', strtotime($blog->created_at)) }} </div>
  </div>
  
</div>
		</div>
	</div>
	<!-- End Blog Section -->



	<!-- Start Testimonial Slider -->
	<div class="testimonial-section before-footer-section">
		<div class="container">
			<div class="row">
				<div class="col-lg-7 mx-auto text-center">
					<h2 class="section-title">Testimonials</h2>
				</div>
			</div>

			<div class="row justify-content-center">
				<div class="col-lg-12">
					<div class="testimonial-slider-wrap text-center">

						<div id="testimonial-nav">
							<span class="prev" data-controls="prev"><span class="fa fa-chevron-left"></span></span>
							<span class="next" data-controls="next"><span class="fa fa-chevron-right"></span></span>
						</div>

						<div class="testimonial-slider">

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
													odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
													vulputate velit imperdiet dolor tempor tristique. Pellentesque
													habitant morbi tristique senectus et netus et malesuada fames ac
													turpis egestas. Integer convallis volutpat dui quis
													scelerisque.&rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="{{ asset('images/person-1.png') }}" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Maria Jones</h3>
												<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
													odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
													vulputate velit imperdiet dolor tempor tristique. Pellentesque
													habitant morbi tristique senectus et netus et malesuada fames ac
													turpis egestas. Integer convallis volutpat dui quis
													scelerisque.&rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="{{ asset('images/person-1.png') }}" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Maria Jones</h3>
												<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

							<div class="item">
								<div class="row justify-content-center">
									<div class="col-lg-8 mx-auto">

										<div class="testimonial-block text-center">
											<blockquote class="mb-5">
												<p>&ldquo;Donec facilisis quam ut purus rutrum lobortis. Donec vitae
													odio quis nisl dapibus malesuada. Nullam ac aliquet velit. Aliquam
													vulputate velit imperdiet dolor tempor tristique. Pellentesque
													habitant morbi tristique senectus et netus et malesuada fames ac
													turpis egestas. Integer convallis volutpat dui quis
													scelerisque.&rdquo;</p>
											</blockquote>

											<div class="author-info">
												<div class="author-pic">
													<img src="{{ asset('images/person-1.png') }}" alt="Maria Jones" class="img-fluid">
												</div>
												<h3 class="font-weight-bold">Maria Jones</h3>
												<span class="position d-block mb-3">CEO, Co-Founder, XYZ Inc.</span>
											</div>
										</div>

									</div>
								</div>
							</div>
							<!-- END item -->

						</div>

					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Testimonial Slider -->
</x-mainlayout>
