
<!-- Include Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@if($popup)

    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex justify-content-between mb-3">
                <div class="align-self-center">
                   
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalSend" tabindex="-1" aria-labelledby="exampleModalSendLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h6 class="modal-title m-0" id="exampleModalDefaultSend"></h6>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Dynamic fields from popup table -->
                                    <div class="mb-2">
                                        <label for="toaddress">Title</label>
                                        <div class="input-group">
                                            <span class="input-group-text" id="QUcode"><i class="fas fa-qrcode"></i></span>
                                            <input type="text" class="form-control" value="{{ $popup->title }}" placeholder="Can you scan" aria-label="Scancode" readonly>
                                        </div>
                                    </div>

                                    <div class="mb-2">
                                        <label for="Description">Description</label>
                                        <textarea class="form-control" rows="3" aria-label="With textarea" readonly>{{ $popup->message }}</textarea>
                                    </div>

                                    <!-- Display image if exists -->
                                    @if($popup->image)
                                        <div class="mb-2">
                                            
                                            <img src="{{ asset('storage/' . $popup->image) }}" alt="Popup Image" class="img-fluid">
                                        </div>
                                    @endif
                                </div><!--end modal-body-->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-de-danger btn-sm" data-bs-dismiss="modal">Close</button>
                                   
                                </div><!--end modal-footer-->
                            </div><!--end modal-content-->
                        </div><!--end modal-dialog-->
                    </div><!--end modal-->
                </div><!--end /div-->
            </div><!--end /div-->
        </div><!--end col-->
    </div><!--end row-->

   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript">
            // Automatically open the modal on page load
            $(document).ready(function() {
                $('#exampleModalSend').modal('show');
            });
        </script>
    @endif

<br>
	 
				<!--start page wrapper -->
		<div class="page-wrapper">
			<div class="page-content">
				<div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
				@php
					$ttl = [];
				@endphp

				@foreach($incomes as $income)
					@php
						$slug = $income->wallet_column;
						$color = $income->color;
						$icons = $income->icons;
						$bg_color = $income->icons_bg;
						
						$walletBalance = !empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug : 0;
						$ttl[] = $walletBalance;
					@endphp
                   <div class="col">
					 <div class="card radius-10 border-start border-0 border-4 border-{{$color}}">
						<div class="card-body">
							<div class="d-flex align-items-center">
								<div>
									<p class="mb-0 text-secondary">{{ $income->name }}</p>
									<h4 class="my-1 text-{{$color}}">{{ $currency }}&nbsp;{{ $walletBalance }}</h4>
									<p class="mb-0 font-13">{{ $currency }}&nbsp;{{$todayIncome}} Today income</p>
								</div>
								<div class="widgets-icons-2 rounded-circle {{$bg_color}} text-white ms-auto"><i class='bx bxs-{{$icons}}'></i>
								</div>
							</div>
						</div>
					 </div>
				   </div>
				   @endforeach
				 
				
				</div><!--end row-->

				<div class="row">
                   <div class="col-12 col-lg-8 d-flex">
                      <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Income & Withdrawal  Overview</h6>
								</div>
								<div class="dropdown ms-auto">
									<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									</a>
									<!-- <ul class="dropdown-menu">
										<li><a class="dropdown-item" href="javascript:;">Action</a>
										</li>
										<li><a class="dropdown-item" href="javascript:;">Another action</a>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="javascript:;">Something else here</a>
										</li>
									</ul> -->
								</div>
							</div>
						</div>
						  <div class="card-body">
							<div class="d-flex align-items-center ms-auto font-13 gap-2 mb-3">
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #14abef"></i>Income</span>
								<span class="border px-1 rounded cursor-pointer"><i class="bx bxs-circle me-1" style="color: #ffc107"></i>Withdrawal</span>
							</div>
							<div class="chart-container-1">
								<canvas id="chart11"></canvas>
							  </div>
						  </div>
						  <div class="row row-cols-1 row-cols-md-3 row-cols-xl-3 g-0 row-group text-center border-top">

						  <div class="col">
							  <div class="p-3">
								<h5 class="mb-0">{{$currency}} {{$data['totalOrderamt']}}</h5>
								<small class="mb-0">My Package <span> <i class="bx bx-up-arrow-alt align-middle"></i></span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">{{$currency}} {{$totalIncome}}</h5>
								<small class="mb-0">Total Income <span> <i class="bx bx-up-arrow-alt align-middle"></i> </span></small>
							  </div>
							</div>
							<div class="col">
							  <div class="p-3">
								<h5 class="mb-0">{{$currency}} {{$totalWithdrawal}}</h5>
								<small class="mb-0">Total Withdrawal <span> <i class="bx bx-up-arrow-alt align-middle"></i></span></small>
							  </div>
							</div>
							
							
						  </div>
					  </div>
				   </div>
				   <div class="col-12 col-lg-4 d-flex">
                       <div class="card radius-10 w-100">
						<div class="card-header">
							<div class="d-flex align-items-center">
								<div>
									<h6 class="mb-0">Team Section</h6>
								</div>
								<div class="dropdown ms-auto">
									<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
									</a>
									<!-- <ul class="dropdown-menu">
										<li><a class="dropdown-item" href="javascript:;">Action</a>
										</li>
										<li><a class="dropdown-item" href="javascript:;">Another action</a>
										</li>
										<li>
											<hr class="dropdown-divider">
										</li>
										<li><a class="dropdown-item" href="javascript:;">Something else here</a>
										</li>
									</ul> -->
								</div>
							</div>
						</div>
						   <div class="card-body">
							<div class="chart-container-2">
								<canvas id="chart21"></canvas>
							  </div>
						   </div>
						   <ul class="list-group list-group-flush">

						   @foreach($team as $section)
							@php
								$slug = $section->wallet_column; 
								$icon = '';
								$bg_cl = $section->icons_bg;
                                $walletBalance = !empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug : 0;
							@endphp

							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center border-top">{{ $section->name }} <span class="badge bg-{{$bg_cl}} rounded-pill">{{ $walletBalance }}</span>
							</li>
							@endforeach


							<!-- <li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">T-Shirts <span class="badge bg-danger rounded-pill">10</span>
							</li>
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Shoes <span class="badge bg-primary rounded-pill">65</span>
							</li>
							<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Lingerie <span class="badge bg-warning text-dark rounded-pill">14</span>
							</li> -->
						</ul>
					   </div>
				   </div>
				</div><!--end row-->

				 <div class="card radius-10">
					<div class="card-header">
						<div class="d-flex align-items-center">
							<div>
								<h6 class="mb-0">Recent Transactions</h6>
							</div>
							<div class="dropdown ms-auto">
								<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
								</a>
								<!-- <ul class="dropdown-menu">
									<li><a class="dropdown-item" href="javascript:;">Action</a>
									</li>
									<li><a class="dropdown-item" href="javascript:;">Another action</a>
									</li>
									<li>
										<hr class="dropdown-divider">
									</li>
									<li><a class="dropdown-item" href="javascript:;">Something else here</a>
									</li>
								</ul> -->
							</div>
						</div>
					</div>
                         <div class="card-body">
						 <div class="table-responsive">
						   <table class="table align-middle mb-0">
							<thead class="table-light">
							 <tr>
							   <th>Date</th>
							   <th>Amount</th>
							   <th>Txn Type</th>
							   <th>Remark</th>
							   <th>Credit/Debit</th>
							</tr>
							 </thead>
							 <tbody>
							 @foreach($alltransactions as $txdata)
							 <tr>
							  <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">{{$txdata->date}}</span></td>
							  <td>{{$currency}} {{$txdata->amount}}</span></td>
							  <td>{{$txdata->tx_type}}</td>
							  <td>{{$txdata->remark ?? 'NA'}}</td>
							  <td><span class="badge bg-gradient-quepal text-white shadow-sm w-100">{{$txdata->debit_credit ?? 'NA'}}</span></td>
							  </tr>
							 @endforeach
							</tbody>
						  </table>
						  </div>
						 </div>
					</div>


					<div class="row">
						<div class="col-12 col-lg-8 col-xl-8 d-flex">
						  <div class="card radius-10 w-100">
							<div class="card-header bg-transparent">
								<div class="d-flex align-items-center">
									<div>
										<h6 class="mb-0">Referral Link</h6>
									</div>
									<div class="dropdown ms-auto">
										<a class="dropdown-toggle dropdown-toggle-nocaret" href="#" data-bs-toggle="dropdown"><i class='bx bx-dots-horizontal-rounded font-22 text-option'></i>
										</a>
										<!-- <ul class="dropdown-menu">
											<li><a class="dropdown-item" href="javascript:;">Action</a>
											</li>
											<li><a class="dropdown-item" href="javascript:;">Another action</a>
											</li>
											<li>
												<hr class="dropdown-divider">
											</li>
											<li><a class="dropdown-item" href="javascript:;">Something else here</a>
											</li>
										</ul> -->
									</div>
								</div>
							   </div>
							 <div class="card-body">
								<div class="row">
								  <div class="col-lg-12 col-xl-12 border-end">
								
								<h3 class="text-center">Your Referral Link</h3>
								<div class="input-group">
									<input type="text" id="referralLink" class="form-control" 
										value="{{url('/register')}}?code={{$user->username}}" readonly>
										<button class="btn btn-outline-secondary" id="copyButton" onclick="copyLink()">Copy</button>
                                    
								</div>
								<div class="d-flex justify-content-between mt-3">
									<a class="btn btn-success btn-custom col-4" 
									href="https://wa.me/?text=Check%20out%20this%20referral%20link:%20{{url('/register')}}?code={{$user->username}}" 
									target="_blank">
									Share on WhatsApp
									</a>
									<a class="btn btn-primary btn-custom col-4" 
									href="{{url('/register')}}?code={{$user->username}}" target="_blank">
									Open Link
									</a>
								</div>
								
								  </div>
								  
								</div>
							 </div>
						   </div>
						</div>
			        
						
						<div class="col-12 col-lg-5 col-xl-4 d-flex">


						    @foreach($usersWallets as $walletdata)
							@php
                            $slug1 = $walletdata->wallet_column; 

							$icon =$walletdata->icons;
							$bg_cl = $section->icons_bg;
							$walletBalance1 = !empty($wallet_balance) && isset($wallet_balance->slug1) ? $wallet_balance->slug1 : 0;
							@endphp
						     <div class="card-body">
							  <div class="card radius-10 border shadow-none">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">{{ $walletdata->name }}</p>
											<h4 class="my-1">{{$currency}} {{ $walletBalance1 }}</h4>
											<!-- <p class="mb-0 font-13">+6.2% from last week</p> -->
										</div>
										<div class="widgets-icons-2 bg-gradient-cosmic text-white ms-auto"><i class='bx bxs-{{$icon}}'></i>
										</div>
									</div>
								</div>
							 </div>
							 @endforeach


							 <!-- <div class="card radius-10 border shadow-none">
								<div class="card-body">
									<div class="d-flex align-items-center">
										<div>
											<p class="mb-0 text-secondary">Comments</p>
											<h4 class="my-1">25.6K</h4>
											<p class="mb-0 font-13">+3.7% from last week</p>
										</div>
										<div class="widgets-icons-2 bg-gradient-ibiza text-white ms-auto"><i class='bx bxs-comment-detail'></i>
										</div>
									</div>
								</div>
							 </div> -->
							

							</div>
			   
						</div>
					 </div><!--end row-->

			

			</div>
		</div>
		<!--end page wrapper -->


  
  @php
    $labels = [];
    $data = [];
    foreach($team as $section) {
        $slug = $section->wallet_column;
        $walletBalance = !empty($wallet_balance) && isset($wallet_balance->$slug) ? $wallet_balance->$slug : 0;

        // Collect labels and data dynamically
        $labels[] = $section->name;  // Assuming 'name' is the label
        $data[] = $walletBalance;
    }
@endphp

<script>
    var ctx = document.getElementById("chart21").getContext('2d');

    var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke1.addColorStop(0, '#fc4a1a');
    gradientStroke1.addColorStop(1, '#f7b733');

    var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke2.addColorStop(0, '#4776e6');
    gradientStroke2.addColorStop(1, '#8e54e9');

    var gradientStroke3 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke3.addColorStop(0, '#ee0979');
    gradientStroke3.addColorStop(1, '#ff6a00');

    var gradientStroke4 = ctx.createLinearGradient(0, 0, 0, 300);
    gradientStroke4.addColorStop(0, '#42e695');
    gradientStroke4.addColorStop(1, '#3bb2b8');

    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: @json($labels),  // Dynamic labels from PHP
            datasets: [{
                backgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3,
                    gradientStroke4
                ],
                hoverBackgroundColor: [
                    gradientStroke1,
                    gradientStroke2,
                    gradientStroke3,
                    gradientStroke4
                ],
                data: @json($data),  // Dynamic data from PHP
                borderWidth: [1, 1, 1, 1]
            }]
        },
        options: {
            maintainAspectRatio: false,
            cutout: 82,
            plugins: {
                legend: {
                    display: false,
                }
            }
        }
    });






	var ctx = document.getElementById("chart11").getContext('2d');
   
   var gradientStroke1 = ctx.createLinearGradient(0, 0, 0, 300);
   gradientStroke1.addColorStop(0, '#6078ea');  
   gradientStroke1.addColorStop(1, '#17c5ea'); 

   var gradientStroke2 = ctx.createLinearGradient(0, 0, 0, 300);
   gradientStroke2.addColorStop(0, '#ff8359');
   gradientStroke2.addColorStop(1, '#ffdf40');

   var myChart = new Chart(ctx, {
	   type: 'bar',
	   data: {
		   labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'], // Use dynamic month names if needed
		   datasets: [{
			   label: 'Income',
			   data: @json($incomeData),  // Dynamically passed income data
			   borderColor: gradientStroke1,
			   backgroundColor: gradientStroke1,
			   hoverBackgroundColor: gradientStroke1,
			   pointRadius: 0,
			   fill: false,
			   borderRadius: 20,
			   borderWidth: 0
		   }, {
			   label: 'Withdrawal',
			   data: @json($withdrawalData),  // Dynamically passed withdrawal data
			   borderColor: gradientStroke2,
			   backgroundColor: gradientStroke2,
			   hoverBackgroundColor: gradientStroke2,
			   pointRadius: 0,
			   fill: false,
			   borderRadius: 20,
			   borderWidth: 0
		   }]
	   },
	   options: {
		   maintainAspectRatio: false,
		   barPercentage: 0.5,
		   categoryPercentage: 0.8,
		   plugins: {
			   legend: {
				   display: false,
			   }
		   },
		   scales: {
			   y: {
				   beginAtZero: true
			   }
		   }
	   }
   });



function copyLink() {
	const referralInput = document.getElementById("referralLink");
	referralInput.select();
	referralInput.setSelectionRange(0, 99999); 
	navigator.clipboard.writeText(referralInput.value).then(() => {
		alert("Referral link copied to clipboard!");
	});
}

</script>


