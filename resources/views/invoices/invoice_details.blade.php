@extends('layouts.master')
@section('title')
	Invoice Details
@endsection
@section('css')
  <!---Internal  Prism css-->
  <link href="{{ URL::asset('assets/plugins/prism/prism.css') }}" rel="stylesheet">
  <!---Internal Input tags css-->
  <link href="{{ URL::asset('assets/plugins/inputtags/inputtags.css') }}" rel="stylesheet">
  <!--- Custom-scroll -->
  <link href="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.css') }}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoice Details</span>
						</div>
					</div>
					
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
                    <div class="col-xl-12">
						<!-- div -->
						<div class="card mg-b-20" id="tabs-style2">
							<div class="card-body">
								
								<div class="text-wrap">
									<div class="example">
										<div class="panel panel-primary tabs-style-2">
											<div class=" tab-menu-heading">
												<div class="tabs-menu1">
													<!-- Tabs -->
													<ul class="nav panel-tabs main-nav-line">
														<li><a href="#tab4" class="nav-link active" data-toggle="tab">Invoice details</a></li>
														<li><a href="#tab5" class="nav-link" data-toggle="tab">Payment status</a></li>
													</ul>
												</div>
											</div>
											<div class="panel-body tabs-menu-body main-content-body-right border">
												<div class="tab-content">
													<div class="tab-pane active" id="tab4">
														<div class="table-responsive mt-15">

                                                            <table class="table table-striped" style="text-align:center">
                                                                <tbody>
                                                                    <tr>
                                                                        <th scope="row">Invoice number</th>
                                                                        <th scope="row">Invoice date</th>
                                                                        <th scope="row">Due date</th>
                                                                        <th scope="row">Section</th>
                                                                        <th scope="row">Product</th>
                                                                        <th scope="row">Amount Collection</th>
                                                                        <th scope="row">Commission</th>
                                                                        
                                                                    </tr>
            
                                                                    <tr>
                                                                        <td>{{ $invoices->invoice_number }}</td>
                                                                        <td>{{ $invoices->invoice_Date }}</td>
                                                                        <td>{{ $invoices->Due_date }}</td>
                                                                        <td>{{ $invoices->Section->section_name }}</td>
                                                                        <td>{{ $invoices->product }}</td>
                                                                        <td>{{ $invoices->Amount_collection }}</td>
                                                                        <td>{{ $invoices->Amount_Commission }}</td>
                                                                        
                                                                        
                                                                        
                                                                        
                                                                    </tr>
            
            
                                                                    <tr>
                                                                        <th scope="row">Discount</th>
                                                                        <th scope="row">Rate Vat</th>
                                                                        <th scope="row">Value Vat</th>
                                                                        <th scope="row">Total</th>
                                                                        <th scope="row">Currunt status</th>
                                                                        <th scope="row">Notes</th>

                                                                       
                                                                    </tr>
            
                                                                    <tr>
                                                                        <td>{{ $invoices->Discount }}</td>
                                                                        <td>{{ $invoices->Rate_VAT }}</td>
                                                                        <td>{{ $invoices->Value_VAT }}</td>
                                                                        <td>{{ $invoices->Total }}</td>
            
                                                                        @if ($invoices->Value_Status == 1)
                                                                            <td><span
                                                                                    class="badge badge-pill badge-success">{{ $invoices->Status }}</span>
                                                                            </td>
                                                                        @elseif($invoices->Value_Status ==2)
                                                                            <td><span
                                                                                    class="badge badge-pill badge-danger">{{ $invoices->Status }}</span>
                                                                            </td>
                                                                        @else
                                                                            <td><span
                                                                                    class="badge badge-pill badge-warning">{{ $invoices->Status }}</span>
                                                                            </td>
                                                                        @endif
                                                                        <td>{{ $invoices->note }}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
            
                                                        </div>
													</div>
													<div class="tab-pane" id="tab5">
                                                        <div class="table-responsive mt-15">
                                                            <table class="table center-aligned-table mb-0 table-hover"
                                                                style="text-align:center">
                                                                <thead>
                                                                    <tr class="text-dark">
                                                                        <th>#</th>
                                                                        <th>Invoice number</th>
                                                                        <th>Product</th>
                                                                        <th>Section</th>
                                                                        <th>Payment status</th>
                                                                        <th>Payment date </th>
                                                                        <th>Notes</th>
                                                                        <th>Created at </th>
                                                                        <th>User</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $i = 0; ?>
                                                                    @foreach ($details as $detail)
                                                                        <?php $i++; ?>
                                                                        <tr>
                                                                            <td>{{ $i }}</td>
                                                                            <td>{{ $detail->invoice_number }}</td>
                                                                            <td>{{ $detail->product }}</td>
                                                                            <td>{{ $invoices->Section->section_name }}</td>
                                                                            @if ($detail->Value_Status == 1)
                                                                                <td><span
                                                                                        class="badge badge-pill badge-success">{{ $detail->Status }}</span>
                                                                                </td>
                                                                            @elseif($detail->Value_Status ==2)
                                                                                <td><span
                                                                                        class="badge badge-pill badge-danger">{{ $detail->Status }}</span>
                                                                                </td>
                                                                            @else
                                                                                <td><span
                                                                                        class="badge badge-pill badge-warning">{{ $detail->Status }}</span>
                                                                                </td>
                                                                            @endif
                                                                            <td>{{ $detail->Payment_Date }}</td>
                                                                            <td>{{ $detail->note }}</td>
                                                                            <td>{{ $detail->created_at }}</td>
                                                                            <td>{{ $detail->user }}</td>
                                                                        </tr>
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
            
            
                                                        </div>
													</div>
												</div>
											</div>
										</div>
									</div>
				</div>
				<!-- row closed -->
			</div>
			<!-- Container closed -->
		</div>
		<!-- main-content closed -->
@endsection
@section('js')
  <!--Internal  Datepicker js -->
  <script src="{{ URL::asset('assets/plugins/jquery-ui/ui/widgets/datepicker.js') }}"></script>
  <!-- Internal Select2 js-->
  <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js') }}"></script>
  <!-- Internal Jquery.mCustomScrollbar js-->
  <script src="{{ URL::asset('assets/plugins/custom-scroll/jquery.mCustomScrollbar.concat.min.js') }}"></script>
  <!-- Internal Input tags js-->
  <script src="{{ URL::asset('assets/plugins/inputtags/inputtags.js') }}"></script>
  <!--- Tabs JS-->
  <script src="{{ URL::asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js') }}"></script>
  <script src="{{ URL::asset('assets/js/tabs.js') }}"></script>
  <!--Internal  Clipboard js-->
  <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js') }}"></script>
  <script src="{{ URL::asset('assets/plugins/clipboard/clipboard.js') }}"></script>
  <!-- Internal Prism js-->
  <script src="{{ URL::asset('assets/plugins/prism/prism.js') }}"></script>
@endsection