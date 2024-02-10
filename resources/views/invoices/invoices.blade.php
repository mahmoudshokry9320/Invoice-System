@extends('layouts.master')
@section('title')
	Invoices
@endsection
@section('css')
<!-- Internal Data table css -->
<link href="{{URL::asset('assets/plugins/datatable/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/buttons.bootstrap4.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.bootstrap4.min.css')}}" rel="stylesheet" />
<link href="{{URL::asset('assets/plugins/datatable/css/jquery.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/datatable/css/responsive.dataTables.min.css')}}" rel="stylesheet">
<link href="{{URL::asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet">
@endsection
@section('page-header')
				<!-- breadcrumb -->
				<div class="breadcrumb-header justify-content-between">
					<div class="my-auto">
						<div class="d-flex">
							<h4 class="content-title mb-0 my-auto">Invoices</h4><span class="text-muted mt-1 tx-13 mr-2 mb-0">/ Invoices</span>
						</div>
					</div>
				</div>
				<!-- breadcrumb -->
@endsection
@section('content')
				<!-- row -->
				<div class="row">
					
					
	
						<!--div-->
						<div class="col-xl-12">
							<div class="card mg-b-20">
								<div class="card-body">
									<div class="card-header pb-0">
											<a href="invoices/create" class="modal-effect btn btn-sm btn-primary" style="color:white"><i
													class="fas fa-plus"></i>&nbsp; Add invoice </a>
										
					
					
									</div>
									<div class="table-responsive">
										<table id="example1" class="table key-buttons text-md-nowrap">
											<thead>
												<tr>
													<th class="border-bottom-0">#</th>
													<th class="border-bottom-0">Invoice num</th>
													<th class="border-bottom-0">Invoice date</th>
													<th class="border-bottom-0">Due date</th>
													<th class="border-bottom-0">Product</th>
													<th class="border-bottom-0">Section</th>
													<th class="border-bottom-0">Rate vat</th>
													<th class="border-bottom-0">Value vat</th>
													<th class="border-bottom-0">Discount</th>
													<th class="border-bottom-0">Total</th>
													<th class="border-bottom-0">Status</th>
													<th class="border-bottom-0">Notes</th>
													<th class="border-bottom-0">Process</th>
												</tr>
											</thead>
											<tbody>
												@php $i = 0; @endphp
												@foreach ($invoices as $invoice)
												@php $i++; @endphp
												
												<tr>
													<td>{{$i}}</td>
													<td>{{$invoice->invoice_number}}</td>
													<td>{{$invoice->invoice_Date}}</td>
													<td>{{$invoice->Due_date}}</td>
													<td>{{$invoice->product}}</td>
													<td><a
														href="{{ url('InvoicesDetails') }}/{{ $invoice->id }}">{{ $invoice->section->section_name }}</a>
												   </td>
													<td>{{$invoice->Rate_VAT}}%</td>
													<td>{{$invoice->Value_VAT}}</td>
													<td>{{$invoice->Discount}}</td>
													<td>{{$invoice->Total}}</td>
													<td>
														@if ($invoice->Value_Status == 1)
														<span class="text-success">{{ $invoice->Status }}</span>
													@elseif($invoice->Value_Status == 2)
														<span class="text-danger">{{ $invoice->Status }}</span>
													@else
														<span class="text-warning">{{ $invoice->Status }}</span>
													@endif
													</td>
													<td>{{$invoice->note}}</td>
													<td>
														<div class="dropdown">
															<button aria-expanded="false" aria-haspopup="true"
																class="btn ripple btn-primary btn-sm" data-toggle="dropdown"
																type="button">Process<i class="fas fa-caret-down ml-1"></i></button>
																
															<div class="dropdown-menu tx-13">
																	<a class="dropdown-item"
																		href=" {{ url('invoice_edit') }}/{{ $invoice->id }}">Edit invoice
																		</a>

																	<a class="dropdown-item"
																		 method="post" href="{{route('invoices.destroy', ['invoice' => $invoice])}}">Delete
																			@csrf 
																			@method('delete')
																	    </a>
																		
																@can('تغير حالة الدفع')
																	<a class="dropdown-item"
																		href="{{ URL::route('Status_show', [$invoice->id]) }}"><i
																			class=" text-success fas
																				fa-money-bill"></i>&nbsp;&nbsp;Change payment statu
																		</a>
																@endcan	
													</td>
												</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
						<!--/div-->
	
						
						
				</div>
				<!-- row closed -->
			
			<!-- Container closed -->
		
		<!-- main-content closed -->
@endsection
@section('js')
<!-- Internal Data tables -->
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.dataTables.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jquery.dataTables.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.bootstrap4.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/jszip.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/pdfmake.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/vfs_fonts.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.html5.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.print.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/buttons.colVis.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/dataTables.responsive.min.js')}}"></script>
<script src="{{URL::asset('assets/plugins/datatable/js/responsive.bootstrap4.min.js')}}"></script>
<!--Internal  Datatable js -->
<script src="{{URL::asset('assets/js/table-data.js')}}"></script>
@endsection